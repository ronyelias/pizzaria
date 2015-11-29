<?php
	$this->assign('title','Pizzaria Meveana | Pedidos');
	$this->assign('nav','pedidos');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/pedidos.js").wait(function(){
		$(document).ready(function(){
			page.init();
		});
		
		// hack for IE9 which may respond inconsistently with document.ready
		setTimeout(function(){
			if (!page.isInitialized) page.init();
		},1000);
	});
</script>

<div class="container">

<h1>
	<i class="icon-th-list"></i> Pedidos
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="pedidoCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Id">Id<% if (page.orderBy == 'Id') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Datacriacao">Datacriacao<% if (page.orderBy == 'Datacriacao') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Observacao">Observacao<% if (page.orderBy == 'Observacao') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Dataentrega">Dataentrega<% if (page.orderBy == 'Dataentrega') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Valorfrete">Valorfrete<% if (page.orderBy == 'Valorfrete') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_Valordesconto">Valordesconto<% if (page.orderBy == 'Valordesconto') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Valortotal">Valortotal<% if (page.orderBy == 'Valortotal') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Statuspedido">Statuspedido<% if (page.orderBy == 'Statuspedido') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Formapagamento">Formapagamento<% if (page.orderBy == 'Formapagamento') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Vendedor">Vendedor<% if (page.orderBy == 'Vendedor') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Cliente">Cliente<% if (page.orderBy == 'Cliente') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Enderecoentrega">Enderecoentrega<% if (page.orderBy == 'Enderecoentrega') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Itempedido">Itempedido<% if (page.orderBy == 'Itempedido') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('id')) %>">
				<td><%= _.escape(item.get('id') || '') %></td>
				<td><%if (item.get('datacriacao')) { %><%= _date(app.parseDate(item.get('datacriacao'))).format('MMM D, YYYY') %><% } else { %>NULL<% } %></td>
				<td><%= _.escape(item.get('observacao') || '') %></td>
				<td><%if (item.get('dataentrega')) { %><%= _date(app.parseDate(item.get('dataentrega'))).format('MMM D, YYYY') %><% } else { %>NULL<% } %></td>
				<td><%= _.escape(item.get('valorfrete') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('valordesconto') || '') %></td>
				<td><%= _.escape(item.get('valortotal') || '') %></td>
				<td><%= _.escape(item.get('statuspedido') || '') %></td>
				<td><%= _.escape(item.get('formapagamento') || '') %></td>
				<td><%= _.escape(item.get('vendedor') || '') %></td>
				<td><%= _.escape(item.get('cliente') || '') %></td>
				<td><%= _.escape(item.get('enderecoentrega') || '') %></td>
				<td><%= _.escape(item.get('itempedido') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="pedidoModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idInputContainer" class="control-group">
					<label class="control-label" for="id">Id</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="id"><%= _.escape(item.get('id') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="datacriacaoInputContainer" class="control-group">
					<label class="control-label" for="datacriacao">Datacriacao</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="datacriacao" type="text" value="<%= _date(app.parseDate(item.get('datacriacao'))).format('YYYY-MM-DD') %>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="observacaoInputContainer" class="control-group">
					<label class="control-label" for="observacao">Observacao</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="observacao" placeholder="Observacao" value="<%= _.escape(item.get('observacao') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="dataentregaInputContainer" class="control-group">
					<label class="control-label" for="dataentrega">Dataentrega</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="dataentrega" type="text" value="<%= _date(app.parseDate(item.get('dataentrega'))).format('YYYY-MM-DD') %>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="valorfreteInputContainer" class="control-group">
					<label class="control-label" for="valorfrete">Valorfrete</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="valorfrete" placeholder="Valorfrete" value="<%= _.escape(item.get('valorfrete') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="valordescontoInputContainer" class="control-group">
					<label class="control-label" for="valordesconto">Valordesconto</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="valordesconto" placeholder="Valordesconto" value="<%= _.escape(item.get('valordesconto') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="valortotalInputContainer" class="control-group">
					<label class="control-label" for="valortotal">Valortotal</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="valortotal" placeholder="Valortotal" value="<%= _.escape(item.get('valortotal') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="statuspedidoInputContainer" class="control-group">
					<label class="control-label" for="statuspedido">Statuspedido</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="statuspedido" placeholder="Statuspedido" value="<%= _.escape(item.get('statuspedido') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="formapagamentoInputContainer" class="control-group">
					<label class="control-label" for="formapagamento">Formapagamento</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="formapagamento" placeholder="Formapagamento" value="<%= _.escape(item.get('formapagamento') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="vendedorInputContainer" class="control-group">
					<label class="control-label" for="vendedor">Vendedor</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="vendedor" placeholder="Vendedor" value="<%= _.escape(item.get('vendedor') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="clienteInputContainer" class="control-group">
					<label class="control-label" for="cliente">Cliente</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="cliente" placeholder="Cliente" value="<%= _.escape(item.get('cliente') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="enderecoentregaInputContainer" class="control-group">
					<label class="control-label" for="enderecoentrega">Enderecoentrega</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="enderecoentrega" placeholder="Enderecoentrega" value="<%= _.escape(item.get('enderecoentrega') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="itempedidoInputContainer" class="control-group">
					<label class="control-label" for="itempedido">Itempedido</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="itempedido" placeholder="Itempedido" value="<%= _.escape(item.get('itempedido') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deletePedidoButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deletePedidoButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Pedido</button>
						<span id="confirmDeletePedidoContainer" class="hide">
							<button id="cancelDeletePedidoButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeletePedidoButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="pedidoDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Pedido
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="pedidoModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="savePedidoButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="pedidoCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newPedidoButton" class="btn btn-primary">Add Pedido</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
