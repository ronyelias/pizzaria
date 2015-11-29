<?php
	$this->assign('title','Pizzaria Meveana | Entregadoreses');
	$this->assign('nav','entregadoreses');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/entregadoreses.js").wait(function(){
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
	<i class="icon-th-list"></i> Entregadoreses
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="entregadoresCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Id">Id<% if (page.orderBy == 'Id') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Nome">Nome<% if (page.orderBy == 'Nome') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Docreceita">Docreceita<% if (page.orderBy == 'Docreceita') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Rg">Rg<% if (page.orderBy == 'Rg') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Telefone">Telefone<% if (page.orderBy == 'Telefone') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_Empresa">Empresa<% if (page.orderBy == 'Empresa') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('id')) %>">
				<td><%= _.escape(item.get('id') || '') %></td>
				<td><%= _.escape(item.get('nome') || '') %></td>
				<td><%= _.escape(item.get('docreceita') || '') %></td>
				<td><%= _.escape(item.get('rg') || '') %></td>
				<td><%= _.escape(item.get('telefone') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('empresa') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="entregadoresModelTemplate">
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
				<div id="docreceitaInputContainer" class="control-group">
					<label class="control-label" for="docreceita">Docreceita</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="docreceita" placeholder="Docreceita" value="<%= _.escape(item.get('docreceita') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="rgInputContainer" class="control-group">
					<label class="control-label" for="rg">Rg</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="rg" placeholder="Rg" value="<%= _.escape(item.get('rg') || '') %>">
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
				<div id="empresaInputContainer" class="control-group">
					<label class="control-label" for="empresa">Empresa</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="empresa" placeholder="Empresa" value="<%= _.escape(item.get('empresa') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteEntregadoresButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteEntregadoresButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Entregadores</button>
						<span id="confirmDeleteEntregadoresContainer" class="hide">
							<button id="cancelDeleteEntregadoresButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteEntregadoresButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="entregadoresDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Entregadores
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="entregadoresModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveEntregadoresButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="entregadoresCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newEntregadoresButton" class="btn btn-primary">Add Entregadores</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
