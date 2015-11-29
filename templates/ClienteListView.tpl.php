<?php
	$this->assign('title','Pizzaria Meveana | Clientes');
	$this->assign('nav','clientes');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/clientes.js").wait(function(){
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
	<i class="icon-th-list"></i> Clientes
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="clienteCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Id">Id<% if (page.orderBy == 'Id') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Nome">Nome<% if (page.orderBy == 'Nome') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Telefone">Telefone<% if (page.orderBy == 'Telefone') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Email">Email<% if (page.orderBy == 'Email') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Referencia">Referencia<% if (page.orderBy == 'Referencia') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_Tipo">Tipo<% if (page.orderBy == 'Tipo') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Docreceitafederal">Docreceitafederal<% if (page.orderBy == 'Docreceitafederal') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Enderecos">Enderecos<% if (page.orderBy == 'Enderecos') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('id')) %>">
				<td><%= _.escape(item.get('id') || '') %></td>
				<td><%= _.escape(item.get('nome') || '') %></td>
				<td><%= _.escape(item.get('telefone') || '') %></td>
				<td><%= _.escape(item.get('email') || '') %></td>
				<td><%= _.escape(item.get('referencia') || '') %></td>

				<td><%= _.escape(item.get('tipo') || '') %></td>
				<td><%= _.escape(item.get('docreceitafederal') || '') %></td>
				<td><%= _.escape(item.get('enderecos') || '') %></td>

			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="clienteModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idInputContainer" class="control-group">
					<label class="control-label" for="id">Id</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="id"><%= _.escape(item.get('id') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="nomeInputContainer" class="control-group">
					<label class="control-label" for="nome">Nome</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="nome" placeholder="Nome" value="<%= _.escape(item.get('nome') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="telefoneInputContainer" class="control-group">
					<label class="control-label" for="telefone">Telefone</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="telefone" placeholder="Telefone" value="<%= _.escape(item.get('telefone') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="emailInputContainer" class="control-group">
					<label class="control-label" for="email">Email</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="email" placeholder="Email" value="<%= _.escape(item.get('email') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="referenciaInputContainer" class="control-group">
					<label class="control-label" for="referencia">Referencia</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="referencia" placeholder="Referencia" value="<%= _.escape(item.get('referencia') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="tipoInputContainer" class="control-group">
					<label class="control-label" for="tipo">Tipo</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="tipo" placeholder="Tipo" value="<%= _.escape(item.get('tipo') || '') %>">
						<select name="select" id="select">
      <option><%= _.escape(item.get('tipo') || '') %></option>
      <option><%= _.escape(item.get('tipo') || '') %></option>
      <option><%= _.escape(item.get('tipo') || '') %></option>
    </select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="docreceitafederalInputContainer" class="control-group">
					<label class="control-label" for="docreceitafederal">Docreceitafederal</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="docreceitafederal" placeholder="Docreceitafederal" value="<%= _.escape(item.get('docreceitafederal') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="enderecosInputContainer" class="control-group">
					<label class="control-label" for="enderecos">Enderecos</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="enderecos" placeholder="Enderecos" value="<%= _.escape(item.get('enderecos') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteClienteButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteClienteButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Cliente</button>
						<span id="confirmDeleteClienteContainer" class="hide">
							<button id="cancelDeleteClienteButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteClienteButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="clienteDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Cliente
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="clienteModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveClienteButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="clienteCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newClienteButton" class="btn btn-primary">Add Cliente</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
