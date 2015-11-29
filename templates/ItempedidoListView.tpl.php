<?php
	$this->assign('title','Pizzaria Meveana | Itempedidos');
	$this->assign('nav','itempedidos');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/itempedidos.js").wait(function(){
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
	<i class="icon-th-list"></i> Itempedidos
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="itempedidoCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Id">Id<% if (page.orderBy == 'Id') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Quantidade">Quantidade<% if (page.orderBy == 'Quantidade') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Valorunitario">Valorunitario<% if (page.orderBy == 'Valorunitario') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Produto">Produto<% if (page.orderBy == 'Produto') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Pedido">Pedido<% if (page.orderBy == 'Pedido') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('id')) %>">
				<td><%= _.escape(item.get('id') || '') %></td>
				<td><%= _.escape(item.get('quantidade') || '') %></td>
				<td><%= _.escape(item.get('valorunitario') || '') %></td>
				<td><%= _.escape(item.get('produto') || '') %></td>
				<td><%= _.escape(item.get('pedido') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="itempedidoModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idInputContainer" class="control-group">
					<label class="control-label" for="id">Id</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="id"><%= _.escape(item.get('id') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="quantidadeInputContainer" class="control-group">
					<label class="control-label" for="quantidade">Quantidade</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="quantidade" placeholder="Quantidade" value="<%= _.escape(item.get('quantidade') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="valorunitarioInputContainer" class="control-group">
					<label class="control-label" for="valorunitario">Valorunitario</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="valorunitario" placeholder="Valorunitario" value="<%= _.escape(item.get('valorunitario') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="produtoInputContainer" class="control-group">
					<label class="control-label" for="produto">Produto</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="produto" placeholder="Produto" value="<%= _.escape(item.get('produto') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="pedidoInputContainer" class="control-group">
					<label class="control-label" for="pedido">Pedido</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="pedido" placeholder="Pedido" value="<%= _.escape(item.get('pedido') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteItempedidoButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteItempedidoButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Itempedido</button>
						<span id="confirmDeleteItempedidoContainer" class="hide">
							<button id="cancelDeleteItempedidoButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteItempedidoButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="itempedidoDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Itempedido
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="itempedidoModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveItempedidoButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="itempedidoCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newItempedidoButton" class="btn btn-primary">Add Itempedido</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
