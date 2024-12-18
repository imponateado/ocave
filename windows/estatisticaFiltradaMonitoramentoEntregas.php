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

			<h3>Estatística geral</h3>
			<h6>"Dados do gráfico geral"</h6>

            <?php require '../functions/startAndEndDate.php'  ?>

			<?php require '../functions/getRotaListHTML.php'  ?>

			<button type="button" class="btn btn-primary" onclick="triggerFilter()">Pronto</button>

			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Problemas detectados</th>
						<th scope="col">Valor</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">Cobrança indevida</th>
						<td id="cobrancaIndevida">
							<div class="loader"></div>
						</td>
					</tr>
					<tr>
						<th scope="row">Valor incorreto</th>
						<td id="valorIncorreto">
							<div class="loader"></div>
						</td>
					</tr>
					<tr>
						<th scope="row">Pedido incompleto</th>
						<td id="pedidoIncompleto">
							<div class="loader"></div>
						</td>
					</tr>
					<tr>
						<th scope="row">Pedido não entregue</th>
						<td id="pedidoNaoEntregue">
							<div class="loader"></div>
						</td>
					</tr>
					<tr>
						<th scope="row">Erro engenharia</th>
						<td id="erroEngenharia">
							<div class="loader"></div>
						</td>
					</tr>
					<tr>
						<th scope="row">Atendimento</th>
						<td id="atendimento">
							<div class="loader"></div>
						</td>
					</tr>
					<tr>
						<th scope="row">Avarias</th>
						<td id="avarias">
							<div class="loader"></div>
						</td>
					</tr>
					<tr>
						<th scope="row">Arranhados</th>
						<td id="arranhados">
							<div class="loader"></div>
						</td>
					</tr>
					<tr>
						<th scope="row">Atraso entrega</th>
						<td id="atrasoEntrega">
							<div class="loader"></div>
						</td>
					</tr>
					<tr>
						<th scope="row">Vendedor</th>
						<td id="vendedor">
							<div class="loader"></div>
						</td>
					</tr>
					<tr>
						<th scope="row">Representante</th>
						<td id="representante">
							<div class="loader"></div>
						</td>
					</tr>
					<tr>
						<th scope="row">Motorista</th>
						<td id="motorista">
							<div class="loader"></div>
						</td>
					</tr>
					<tr>
						<th scope="row">Carregador</th>
						<td id="carregador">
							<div class="loader"></div>
						</td>
					</tr>
					<tr>
						<th scope="row">Com reclamação</th>
						<td id="comReclamacao">
							<div class="loader"></div>
						</td>
					</tr>
					<tr>
						<th scope="row">Entregas OK</th>
						<td id="semReclamacao">
							<div class="loader"></div>
						</td>
					</tr>
						<tr>
						<th scope="row">Total de ligações não atendidas</th>
						<td id="naoAtendidas">
							<div class="loader"></div>
						</td>
					</tr>
					<tr>
						<th scope="row">Total de ligações atendidas</th>
						<td id="atendidas">
							<div class="loader"></div>
						</td>
					</tr>
					<tr>
						<th scope="row">Total de ligações</th>
						<td id="totalLigacoes">
							<div class="loader"></div>
						</td>
					</tr>
				</tbody>
			</table>

		</div>
	</div>

	<?php require '../functions/scripts.php'; ?>

	<script>
		window.onload = function() {

			//busca estatística geral e põe nos placeholders
			var url = `${baseUrl}/entrega/stats`
			fetch(url)
				.then(response => response.json())
				.then(data => {
					const {
						cobrancaIndevida,
						valorIncorreto,
						pedidoIncompleto,
						pedidoNaoEntregue,
						erroEngenharia,
						atendimento,
						avarias,
						arranhados,
						atrasoEntrega,
						vendedor,
						representante,
						motorista,
						carregador,
						comReclamacao,
						semReclamacao,
						naoAtendidas,
						atendidas,
						totalLigacoes
					} = data;

					document.getElementById('cobrancaIndevida').textContent = data.cobrancaIndevida;
					document.getElementById('valorIncorreto').textContent = data.valorIncorreto;
					document.getElementById('pedidoIncompleto').textContent = data.pedidoIncompleto;
					document.getElementById('pedidoNaoEntregue').textContent = data.pedidoNaoEntregue;
					document.getElementById('erroEngenharia').textContent = data.erroEngenharia;
					document.getElementById('atendimento').textContent = data.atendimento;
					document.getElementById('avarias').textContent = data.avarias;
					document.getElementById('arranhados').textContent = data.arranhados;
					document.getElementById('atrasoEntrega').textContent = data.atrasoEntrega;
					document.getElementById('vendedor').textContent = data.vendedor;
					document.getElementById('representante').textContent = data.representante;
					document.getElementById('motorista').textContent = data.motorista;
					document.getElementById('carregador').textContent = data.carregador;
					document.getElementById('comReclamacao').textContent = data.comReclamacao;
					document.getElementById('semReclamacao').textContent = data.semReclamacao;
					document.getElementById('naoAtendidas').textContent = data.naoAtendidas;
					document.getElementById('atendidas').textContent = data.atendidas;
					document.getElementById('totalLigacoes').textContent = data.totalLigacoes;
				}).catch(error => {
					console.error('Ocorreu um erro: ', error);
				});

			//volta com todas as rotas

			<?php require '../functions/getRotaListHTMLscript.php'  ?>

		}

		//filtra as estatísticas
		function triggerFilter() {
			//muda tudo pra um placeholder
			document.getElementById('cobrancaIndevida').innerHTML = "<div class='loader'></div>";
			document.getElementById('valorIncorreto').innerHTML = "<div class='loader'></div>";
			document.getElementById('pedidoIncompleto').innerHTML = "<div class='loader'></div>";
			document.getElementById('pedidoNaoEntregue').innerHTML = "<div class='loader'></div>";
			document.getElementById('erroEngenharia').innerHTML = "<div class='loader'></div>";
			document.getElementById('atendimento').innerHTML = "<div class='loader'></div>";
			document.getElementById('avarias').innerHTML = "<div class='loader'></div>";
			document.getElementById('arranhados').innerHTML = "<div class='loader'></div>";
			document.getElementById('atrasoEntrega').innerHTML = "<div class='loader'></div>";
			document.getElementById('vendedor').innerHTML = "<div class='loader'></div>";
			document.getElementById('representante').innerHTML = "<div class='loader'></div>";
			document.getElementById('motorista').innerHTML = "<div class='loader'></div>";
			document.getElementById('carregador').innerHTML = "<div class='loader'></div>";
			document.getElementById('comReclamacao').innerHTML = "<div class='loader'></div>";
			document.getElementById('semReclamacao').innerHTML = "<div class='loader'></div>";
			document.getElementById('naoAtendidas').innerHTML = "<div class='loader'></div>";
			document.getElementById('atendidas').innerHTML = "<div class='loader'></div>";
			document.getElementById('totalLigacoes').innerHTML = "<div class='loader'></div>";

			// pega as variáveis guardadas nos inputs
			const startDate = document.getElementById('startDate').value;
			const endDate = document.getElementById('endDate').value;
			const rota = document.getElementById('rotas').value;

			//faz uma requisição http pro backend buscando a lista completa de ligações

			var url = `${baseUrl}/entrega/stats?startDate=${startDate}&endDate=${endDate}&rota=${rota}`;
			fetch(url)
			.then(response => {
				if (!response.ok) {
					throw new Error('Network response was not ok');
				}
				return response.json();
			})
			.then(data => {
				document.getElementById('cobrancaIndevida').textContent = data.cobrancaIndevida;
				document.getElementById('valorIncorreto').textContent = data.valorIncorreto;
				document.getElementById('pedidoIncompleto').textContent = data.pedidoIncompleto;
				document.getElementById('pedidoNaoEntregue').textContent = data.pedidoNaoEntregue;
				document.getElementById('erroEngenharia').textContent = data.erroEngenharia;
				document.getElementById('atendimento').textContent = data.atendimento;
				document.getElementById('avarias').textContent = data.avarias;
				document.getElementById('arranhados').textContent = data.arranhados;
				document.getElementById('atrasoEntrega').textContent = data.atrasoEntrega;
				document.getElementById('vendedor').textContent = data.vendedor;
				document.getElementById('representante').textContent = data.representante;
				document.getElementById('motorista').textContent = data.motorista;
				document.getElementById('carregador').textContent = data.carregador;
				document.getElementById('comReclamacao').textContent = data.comReclamacao;
				document.getElementById('semReclamacao').textContent = data.semReclamacao;
				document.getElementById('naoAtendidas').textContent = data.semContatoTrue;
				document.getElementById('atendidas').textContent = data.semContatoFalse;
				document.getElementById('totalLigacoes').textContent = data.total;
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
			linear-gradient(90deg, #0001 33%, #0005 50%, #0001 66%) #f2f2f2;
		background-size: 300% 100%;
		animation: l1 1s infinite linear;
	}

	@keyframes l1 {
		0% {
			background-position: right
		}
	}
</style>