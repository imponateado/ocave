<div class="card" aria-hidden="true" id="customerRecord">
  Aguardando usuário digitar um código!
</div>

<script>
  function getClientCode() {
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

      var hstTable = '<table class="table"><thead class="thead-dark"><tr><td>Nome cliente</td><td>Cidade</td><td>Telefone</td><td>Data da última compra</td><td>Valor já comprado</td><td>Dias desde a última compra</td></tr></div><tbody class="tbody-dark">';

      hstTable += `
        <tr>
          <td>${data.nome}</td>
          <td>${data.cidade}</td>
          <td>${data.telefone}</td>
          <td>${data.dataUltimaCompra}</td>
          <td>${data.valorCompradoTotal}</td>
          <td style="text-align: center;">${data.diasDesdeUltimaCompra}</td>
        </tr>
      </tbody></table>
      `

      document.getElementById('customerRecord').innerHTML = hstTable;
    }).catch(error => {
      console.error('Ocorreu um erro: ', error);
    });

    if(document.getElementById('historicoVendaLigacao')) {
      let url = `${baseUrl}/ocave/backend/getHistoricoLigacaoVendedor.php?codigo=${clientCode}`;
      fetch(url)
      .then(response => response.json())
      .then( data => {
        let hstTable = '<table class="table"><thead class="thead-dark"><tr><th scope="col">Vendedor</th><th scope="col">Data</th><th scope="col">Obs Cliente</th><th scope="col">Cliente não atendeu?</th><th scope="col">Fantasma</th><th scope="col">Cliente muito insatisfeito?</th><th scope="col">Preços</th><th scope="col">Fornecedor</th><th scope="col">Referência</th><th scope="col">Ação</th><th scope="col">Contato</th><th scope="col">Obs Vendedor</th></tr></thead><tbody>';

        data.slice(-3).forEach(item => {
          hstTable += `
          <tr>
            <td scope="row">${item.vendedor ? item.vendedor : '🚫'}</td>          
            <td>${item.data}</td>
            <td>${item.obsCliente ? item.obsCliente : '🚫'}</td>          
            <td>${item.clienteNaoAtendeu == "1" ? '🟥' : '⬜'}</td>
            <td>${item.fantasma == "1" ? '🟥' : '⬜'}</td>          
            <td>${item.representante == "1" ? '🟥' : '⬜'}</td>          
            <td>${item.preco ? item.preco : '🚫'}</td>          
            <td>${item.fornecedor ? item.fornecedor : '🚫'}</td>          
            <td>${item.referencia ? item.referencia : '🚫'}</td>          
            <td>${item.acao ? item.acao : '🚫'}</td>          
            <td>${item.contato ? item.contato : '🚫'}</td>          
            <td>${item.obsVendedor ? item.obsVendedor : '🚫'}</td>
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