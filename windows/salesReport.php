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
			Quantidade de ligações/dia: <input type="text" id="ligacoesDia" value="3">
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
			const rota = document.getElementById('rotas').value;

			let url = `${baseUrl}/ocave/backend/filterSalesReport.php?startDate=${startDate}&endDate=${endDate}&vendedor=${vendedor}&rota=${rota}`;

			fetch(url)
				.then(res => {
					if (!res.ok) {
						throw new Error(`HTTP Error status: ${res.status}`);
					}
					return res.json();
				})
				.then(data => {
					console.log(data);
					let newcontent = '<table><thead class="thead-dark"><tr><th scope="col">Código do cliente</th><th scope="col">Data</th><th scope="col">Vendedor</th><th scope="col">Contato</th><th scope="col">Preços</th><th scope="col">Fornecedor</th><th scope="col">Ação</th><th scope="col">Cliente não lucrativo</th><th scope="col">Necessário visita representante</th><th scope="col">Cliente não atendeu</th><th scope="col"></th></tr></thead><tbody>';

					data.forEach(element => {
						newcontent += `
							<tr>
								<td scope="row">${element.codigo}</td>
								<td>${element.data}</td>
								<td>${element.vendedor}</td>
								<td>${element.contato}</td>
								<td>${element.preco}</td>
								<td>${element.fornecedor}</td>
								<td>${element.acao}</td>
								<td>${element.fantasma}</td>
								<td>${element.representante}</td>
								<td>${element.clienteNaoAtendeu}</td>
							</tr>
							<tr>
								<td>Obs Cliente:</td>
								<td>${element.obsCliente}</td>
								<td>Obs Vendedor:</td>
								<td>${element.obsVendedor}</td>
							</tr>
						`;
					});
					
					newcontent += '</tbody></table>';

					document.getElementById('placeContent').innerHTML = newcontent;
				})
				.catch(err => {
					window.alert("Algo deu errado!\nOU\nNão existem linhas na pesquisa que fizeste!");
					console.error(err);
				});
		}

		window.onload = function () {
			getSalesReport();
		};
	</script>
</body>

</html>