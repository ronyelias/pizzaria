<?php
	$this->assign('title','Pizzaria Meveana | Enderecos');
	$this->assign('nav','enderecos');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/enderecos.js").wait(function(){
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
	<i class="icon-th-list"></i> Enderecos
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="enderecoCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Id">Id<% if (page.orderBy == 'Id') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Logradouro">Logradouro<% if (page.orderBy == 'Logradouro') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Numero">Numero<% if (page.orderBy == 'Numero') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Complemento">Complemento<% if (page.orderBy == 'Complemento') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Cidade">Cidade<% if (page.orderBy == 'Cidade') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_Uf">Uf<% if (page.orderBy == 'Uf') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Cep">Cep<% if (page.orderBy == 'Cep') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Cliente">Cliente<% if (page.orderBy == 'Cliente') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('id')) %>">
				<td><%= _.escape(item.get('id') || '') %></td>
				<td><%= _.escape(item.get('logradouro') || '') %></td>
				<td><%= _.escape(item.get('numero') || '') %></td>
				<td><%= _.escape(item.get('complemento') || '') %></td>
				<td><%= _.escape(item.get('cidade') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('uf') || '') %></td>
				<td><%= _.escape(item.get('cep') || '') %></td>
				<td><%= _.escape(item.get('cliente') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="enderecoModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idInputContainer" class="control-group">
					<label class="control-label" for="id">Id</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="id"><%= _.escape(item.get('id') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="logradouroInputContainer" class="control-group">
					<label class="control-label" for="logradouro">Logradouro</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="logradouro" placeholder="Logradouro" value="<%= _.escape(item.get('logradouro') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="numeroInputContainer" class="control-group">
					<label class="control-label" for="numero">Numero</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="numero" placeholder="Numero" value="<%= _.escape(item.get('numero') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="complementoInputContainer" class="control-group">
					<label class="control-label" for="complemento">Complemento</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="complemento" placeholder="Complemento" value="<%= _.escape(item.get('complemento') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="cidadeInputContainer" class="control-group">
					<label class="control-label" for="cidade">Cidade</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="cidade" placeholder="Cidade" value="<%= _.escape(item.get('cidade') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="ufInputContainer" class="control-group">
					<label class="control-label" for="uf">Uf</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="uf" placeholder="Uf" value="<%= _.escape(item.get('uf') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="cepInputContainer" class="control-group">
					<label class="control-label" for="cep">Cep</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="cep" placeholder="Cep" value="<%= _.escape(item.get('cep') || '') %>">
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
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteEnderecoButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteEnderecoButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Endereco</button>
						<span id="confirmDeleteEnderecoContainer" class="hide">
							<button id="cancelDeleteEnderecoButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteEnderecoButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="enderecoDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Endereco
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="enderecoModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveEnderecoButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="enderecoCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newEnderecoButton" class="btn btn-primary">Add Endereco</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
