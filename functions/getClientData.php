<div class="card" aria-hidden="true">
  <div class="card-body">
    <h5 class="card-title">
      <span class="col-6" id="businessName">Nome cliente</span>
    </h5>
    <p class="card-text">
      <span class="col-7" id="cityName">Cidade</span>
      <span class="col-4" id="phoneNumber">Telefone</span>
      <span class="col-4" id="lastBought">Data da última compra</span>
      <span class="col-6" id="totalBoughtValue">Valor já comprado</span>
      <span class="col1" id='dateLastBought'>Dias desde a última compra</span>
    </p>
  </div>
</div>

<script>
  function getClientCode() {

    document.getElementById('businessName').innerHTML = "<div class='loader'></div>";
    document.getElementById('cityName').innerHTML = "<div class='loader'></div>";
    document.getElementById('phoneNumber').innerHTML = "<div class='loader'></div>";
    document.getElementById('lastBought').innerHTML = "<div class='loader'></div>";
    document.getElementById('totalBoughtValue').innerHTML = "<div class='loader'></div>";
    document.getElementById('dateLastBought').innerHTML = "<div class='loader'></div>";

    //---------------------------------------------------------------------
    const clientCode = document.getElementById('clientCode').value;
    let baseUrl = window.location.protocol + '//' + window.location.hostname;
    if (window.location.port) {
      baseUrl += ':' + window.location.port;
    }
    let url = `${baseUrl}/ocave/backend/getClientCode.php?codigo=${clientCode}`;
    fetch(url)
    .then(response => response.json())
    .then(data => {
      const { nome, cidade, telefone, dataUltimaCompra, valorCompradoTotal, diasDesdeUltimaCompra } = data;

      document.getElementById('businessName').textContent = data.nome;
      document.getElementById('cityName').textContent = data.cidade;
      document.getElementById('phoneNumber').textContent = data.telefone;
      document.getElementById('lastBought').textContent = data.dataUltimaCompra;
      document.getElementById('totalBoughtValue').textContent = data.valorCompradoTotal;
      document.getElementById('dateLastBought').textContent = data.diasDesdeUltimaCompra;
    }).catch(error => {
      console.error('Ocorreu um erro: ', error);
    });

    if(document.getElementById('historicoVendaLigacao')) {
      let url = `${baseUrl}/ocave/backend/getHistoricoLigacaoVendedor.php?codigo=${clientCode}`;
      fetch(url)
      .then(response => response.json())
      .then( data => {
        let hstTable = '<table class="table"><thead class="thead-dark"><tr><th scope="col">Código do cliente</th><th scope="col">Data</th><th scope="col">Vendedor</th><th scope="col">Contato</th><th scope="col">Observação do cliente</th><th scope="col">Preço</th><th scope="col">Observação do vendedor</th><th scope="col">Fornecedor</th><th scope="col">Ação</th><th scope="col">Cliente não atendeu?</th><th scope="col">Fantasma</th> </tr></thead><tbody>';

        data.slice(-3).forEach(item => {
          hstTable += `
            <tr>
              <td>${item.codigo}</td>
              <td>${item.data}</td>
              <td>${item.vendedor}</td>
              <td>${item.contato}</td>
              <td>${item.observacaoCliente}</td>
              <td>${item.preco}</td>
              <td>${item.observacaoVendedor}</td>
              <td>${item.fornecedor}</td>
              <td>${item.acao}</td>
              <td>${item.clienteNaoAtende}</td>
              <td>${item.fantasma}</td>
            </tr>
          `;
        });

        hstTable += '</tbody></table>';
        document.getElementById('historicoVendaLigacao').innerHTML = hstTable;
      })
    }
  }
</script>

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