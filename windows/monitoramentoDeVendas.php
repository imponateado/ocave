<!doctype html>
<html lang="pt-br">
<?php
require '../functions/head.php';
?>

<body>
	<div class="wrapper d-flex align-items-stretch">
		<?php
		require '../functions/navbar.php';
		?>
		<!-- Page Content  -->
		<div id="content" class="p-4 p-md-5 pt-5">
			<?php require '../functions/getClientCode.php' ?>
			<?php require '../functions/getClientData.php' ?>
			<div id="historicoVendaLigacao"></div>
			<div class="insertHstVendaLig">
				<div class="card" aria-hidden="true">
					<div class="card-body">
						<p class="card-text">
							<!-- --------------- -->
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="inputGroup-sizing-default">Vendedor</span>
									</div>
									<input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="vendedor">
								</div>
							<!-- --------------- -->
							<!-- --------------- -->
														<div class="form-check">
									<input class="form-check-input" type="checkbox" id="clienteNaoAtendeu">
									<label class="form-check-label btn btn-danger" for="clienteNaoAtendeu">Cliente não atendeu?</label>
								</div>
							<!-- --------------- -->
							<!-- --------------- -->
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="fantasma">
									<label class="form-check-label btn btn-danger" for="fantasma">Cliente fantasma</label>
								</div>
							<!-- --------------- -->
							<!-- --------------- -->
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="representante">
									<label class="form-check-label btn btn-danger" for="representante">Representante</label>
								</div>
							<!-- --------------- -->
							<br>
							<!-- --------------- -->
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text">Preços</span>
									</div>
									<div class="input-group-prepend">
										<span class="input-group-text" id="inputGroup-sizing-default">pronta-entrega incolor -></span>
									</div>
									<input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="prontaEntregaIncolor">
									<div class="input-group-prepend">
										<span class="input-group-text" id="inputGroup-sizing-default">pronta-entrega fumê -></span>
									</div>
									<input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="prontaEntregaFume">
									<div class="input-group-prepend">
										<span class="input-group-text" id="inputGroup-sizing-default">engenharia incolor -></span>
									</div>
									<input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="engenhariaIncolor">
									<div class="input-group-prepend">
										<span class="input-group-text" id="inputGroup-sizing-default">engenharia fumê -></span>
									</div>
									<input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="engenhariaFume">
								</div>
							<!-- --------------- -->
							<!-- --------------- -->
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="inputGroup-sizing-default">Fornecedor</span>
									</div>
									<input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="fornecedor">
								</div>
							<!-- --------------- -->
							<!-- --------------- -->
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="inputGroup-sizing-default">Referência de localização</span>
									</div>
									<input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="referencia">
								</div>
							<!-- --------------- -->
							<!-- --------------- -->
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="inputGroup-sizing-default">Ação</span>
									</div>
									<input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="acao">
								</div>
							<!-- --------------- -->
							<!-- --------------- -->
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="inputGroup-sizing-default">Observação do cliente</span>
									</div>
									<input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="obsCliente">
								</div>
							<!-- --------------- -->
							<!-- --------------- -->
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="inputGroup-sizing-default">Contato</span>
									</div>
									<input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="contato">
								</div>
							<!-- --------------- -->
							<!-- --------------- -->
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text" id="inputGroup-sizing-default">Observação do vendedor</span>
									</div>
									<input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="obsVendedor">
								</div>
							<!-- --------------- -->
							<!-- --------------- --><button class="btn btn-success" onclick="insertData()">Pronto</button><!-- --------------- -->
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
	require '../functions/scripts.php';
	?>

	<script>
		function insertData() {
			const clientCode = document.getElementById('clientCode').value;
			const vendedor = document.getElementById('vendedor').value;
			const clienteNaoAtendeu = document.getElementById('clienteNaoAtendeu').checked ? "1" : "0";
			const fantasma = document.getElementById('fantasma').checked ? "1" : "0";
			const representante = document.getElementById('representante').checked ? "1" : "0";
			const preco = document.getElementById('prontaEntregaIncolor').value + " " + document.getElementById('prontaEntregaFume').value + " " + document.getElementById('engenhariaIncolor').value + " " + document.getElementById('engenhariaFume').value;
			const fornecedor = document.getElementById('fornecedor').value;
			const referencia = document.getElementById('referencia').value;
			const acao = document.getElementById('acao').value;
			const obsCliente = document.getElementById('obsCliente').value;
			const contato = document.getElementById('contato').value;
			const obsVendedor = document.getElementById('obsVendedor').value;

			let baseUrl = window.location.protocol + '//' + window.location.hostname;
				if (window.location.port) {
					baseUrl += ':' + window.location.port;
			}
			let url = `${baseUrl}/ocave/backend/putFormVenda.php?codigo=${clientCode}&vendedor=${vendedor}&clienteNaoAtendeu=${clienteNaoAtendeu}&fantasma=${fantasma}&representante=${representante}&preco=${preco}&fornecedor=${fornecedor}&referencia=${referencia}&acao=${acao}&obsCliente=${obsCliente}&contato=${contato}&obsVendedor=${obsVendedor}`;
			fetch(url)
			.then(response => {
				if (!response.ok) {
					throw new Error('Network response was not ok');
				}
				return response;
			})
			.then(data => {
				window.alert(data);
			})
		}
	</script>
</body>

</html>

<style>
  .loader {
  width: 120px;
  height: 20px;
  background: 
    linear-gradient(90deg,#0001 33%,#0005 50%,#0001 66%)
    #f2f2f2;
  background-size:300% 100%;
  animation: l1 1s infinite linear;
}
@keyframes l1 {
  0% {background-position: right}
}
</style>