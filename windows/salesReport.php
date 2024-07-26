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
			const rotas = document.getElementById('rotas').value;
			const ligacoesDia = document.getElementById('ligacoesDia').value;

			let url = `${baseUrl}/ocave/backend/filterSalesReport.php?startDate=${startDate}&endDate=${endDate}&vendedor=${vendedor}&rotas=${rotas}&ligacoesDia=${ligacoesDia}`;

			fetch(url)
				.then(res => {
					if (!res.ok) {
						throw new Error(`HTTP Error status: ${res.status}`);
					}
					return res.json();
				})
				.then(dados => {
					document.getElementById('placeContent').innerHTML = '<i class="fa fa-spinner" aria-hidden="true"></i>';
					let newContent = `
					<div class="input-group mb-3 p-1">
						<div class="input-group-prepend">
							<span class="input-group-text" id="inputGroup-sizing-default">Dias úteis</span>
						</div>
						<input type="text" class="form-control" readonly aria-label="Default" aria-describedby="inputGroup-sizing-default" id="diasUteis">

						<div class="input-group-prepend">
							<span class="input-group-text" id="inputGroup-sizing-default">Número total de ligações previstas</span>
						</div>
						<input type="text" class="form-control" readonly aria-label="Default" aria-describedby="inputGroup-sizing-default" id="ligacoesPrevistas">
					</div>
					`;
					console.log(dados);

					newContent += `<div class="input-group mb-3">`;
					dados.vendasPorVendedor.forEach(item => {
						newContent += `
								<div class="input-group-prepend">
									<span class="input-group-text" id="inputGroup-sizing-default">${item.vendedor}</span>
								</div>
								<input type="text" class="form-control ${item.quantidadeVendas > ligacoesDia ? 'btn-success' : 'btn-danger'}" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="${item.quantidadeVendas}">
						`;
					});
					newContent += `</div>`;

					newContent += `
						<table class="table rounded">
							<thead class="thead-dark">
								<th scope="col">Código do cliente</th>
								<th scope="col">Data da ligação</th>
								<th scope="col">Vendedor</th>
								<th scope="col">Contato</th>
								<th scope="col">Preços</th>
								<th scope="col">Fornecedor</th>
								<th scope="col">Ação</th>
								<th scope="col">Cliente improdutivo</th>
								<th scope="col">Visita representante necessário</th>
								<th scope="col">Cliente não atendeu</th>
							</thead>
							<tbody>
						`;

					dados.vendasPorVendedor.forEach(item => {
						newContent += `
						<tr>
							<td scope="row">${item.detalhesVendas[0].codigo}</td>
							<td>${item.detalhesVendas[0].data}</td>
							<td>${item.vendedor}</td>
							<td>${item.detalhesVendas[0].contato}</td>
							<td>${item.detalhesVendas[0].preco}</td>
							<td>${item.detalhesVendas[0].fornecedor}</td>
							<td>${item.detalhesVendas[0].acao}</td>
							<td>${item.detalhesVendas[0].fantasma ? '⬜' : '🟩'}</td>
							<td>${item.detalhesVendas[0].representante ? '🟥' : '⬜'}</td>
							<td>${item.detalhesVendas[0].clienteNaoAtendeu ? '⬜' : '🟩'}</td>
						</tr>
						<tr>
							<td>Observação do cliente:</td>
							<td>${item.detalhesVendas[0].obsCliente}</td>
							<td>Observação do vendedor:</td>
							<td>${item.detalhesVendas[0].obsVendedor}</td>
						</tr>
							`;
					});

					newContent += `</tbody></table>`;
					document.getElementById('placeContent').innerHTML = newContent;
					document.getElementById('diasUteis').value = dados.diasUteis;
					document.getElementById('ligacoesPrevistas').value = dados.ligacoesPrevistas;
				})
				.catch(err => {
					window.alert("Algo deu errado pressione F12 e clique em console para ver qual o problema!");
					console.error(err);
				});
		}
	</script>
</body>

</html>