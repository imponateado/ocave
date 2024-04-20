<!doctype html>
<html lang="en">
<?php
require 'head.php';
?>

<body>
	<div class="wrapper d-flex align-items-stretch">
		<?php
		require 'navbar.php';
		?>
		<!-- Page Content  -->
		<div id="content" class="p-4 p-md-5 pt-5">
			
		<input class="form-control" type="text" placeholder="Digite o código do cliente">
      <button type="button" class="btn btn-success">Pronto</button>
            
      <div class="card" aria-hidden="true">
        <div class="card-body">
          <h5 class="card-title placeholder-glow">
            <span class="col-6">Tecno vidros</span>
          </h5>
          <p class="card-text placeholder-glow">
            <span class="col-7">61588</span>
            <span class="col-4">Cristalina</span>
            <span class="col-4">(61) 99851-7292</span>
            <span class="col-6">01/08/2023</span>
            <span class="col-8">R$ 17.983,41</span>
            <span class="col-8">215</span>
          </p>
        </div>
		</div>
	</div>

	<?php
	require 'scripts.php';
	?>
</body>

</html>