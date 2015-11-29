<?php
	$this->assign('title','Pizzaria Meveana | Home');
	$this->assign('nav','home');

	$this->display('_Header.tpl.php');
?>

	<div class="modal hide fade" id="getStartedDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>Bem vindo ao sistema</h3>
		</div>
		<div class="modal-body" style="max-height: 300px">
			<p>&nbsp;</p>
</div>
		<div class="modal-footer">
			<button id="okButton" data-dismiss="modal" class="btn btn-primary"></button>
		</div>
	</div>

	<div class="container">

		<!-- Main hero unit for a primary marketing message or call to action -->
		<div class="hero-unit">
			<h1>&nbsp;</h1>
			<p>&nbsp;</p>
		</div>

		<!-- Example row of columns -->
		<div class="row">
			<div class="span3">
				<h2><i class="icon-cogs"></i></h2>
</div>
			<div class="span3">
				<h2><i class="icon-th"></i></h2>
</div>
			<div class="span3">
				<h2><i class="icon-twitter-sign"></i></h2>
</div>
			<div class="span3">
				<h2><i class="icon-signin"></i></h2>
</div>
		</div>

	</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>