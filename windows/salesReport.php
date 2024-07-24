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
			<?php require_once '../functions/startAndEndDate.php' ?>

			Vendedor: <input type="text" id="vendedor">

			<?php require_once '../functions/getRotaListHTML.php' ?>

			<button class="btn btn-success" onclick="getSalesReport()">Consultar</button>

			<div id="placeContent"></div>
		</div>
	</div>

	<?php
	require '../functions/scripts.php';
	?>

	<script>

		let baseUrl = window.location.protocol + '//' + window.location.hostname;
		if (window.location.port) {
			baseUrl += ':' + window.location.port;
		}

		<?php require_once '../functions/getRotaListHTMLscript.php' ?>

		function getSalesReport() {
			const startDate = document.getElementById('startDate').value;
			const endDate = document.getElementById('endDate').value;
			const vendedor = document.getElementById('vendedor').value;
			const rotas = document.getElementById('rotas').value;

			let url = `${baseUrl}/ocave/backend/getSalesReport.php?startDate=${startDate}&endDate=${endDate}&vendedor=${vendedor}&rotas=${rotas}`;

			fetch(url)
			.then(res => {
				if (res.ok) {
					res.json();
				}
			})
			.then(dados => {
				console.log(url);
				console.log(dados);
				hstTable = '<table class="table"><thead><tr><td>Código do cliente</td><td>Nome cliente</td><td>Cidade</td><td>Data da ligação</td><td>Vendedor</td><td>Preços ()</td><td>Fornecedor</td><td>Cliente não lucrativo</td><td>Cliente não atendeu</td><td>Rota</td></tr><tr><td>Observação do cliente</td><td>Observação do vendedor</td></tr></thead><tbody>';

				dados.forEach(item => {
					hstTable = `
						<tr>
							<td>${item.codigo}</td>
							<td>${item.codigo}</td>
							<td>${item.codigo}</td>
							<td>${item.data}</td>
							<td>${item.vendedor}</td>
							<td>${item.preco}</td>
							<td>${item.fornecedor}</td>
							<td>${item.fantasma}</td>
							<td>${item.clienteNaoAtendeu}</td>
							<td>${item.IDROTA}</td>
						</tr>
						<tr>
							<td>${item.obsCliente}</td>
							<td>${item.obsVendedor}</td>
						</tr>
					`;
				})

				hstTable += '</tbody></table>';

				document.getElementById('placeContent').innerHTML = hstTable;
			})
			.catch(err => {
				window.alert("Algo deu errado pressione F12 e clique em console para ver qual o problema!");
				console.log(err);
			});
		}
	</script>
</body>

</html>