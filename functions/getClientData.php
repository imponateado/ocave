<div class="card" aria-hidden="true">
  <div class="card-body">
    <h5 class="card-title">
      <span class="col-6" id="businessName">placeholder nome fantasia empresa</span>
    </h5>
    <p class="card-text">
      <span class="col-7" id="cityName">placeholder cidade</span>
      <span class="col-4" id="phoneNumber">placeholder telefone</span>
      <span class="col-4" id="lastBought">placeholder data da última compra</span>
      <span class="col-6" id="totalBoughtValue">placeholder valor comprado total</span>
    </p>
  </div>
</div>

<script>
  function getClientCode() {
    const clientCode = document.getElementById('clientCode').value;
    let baseUrl = window.location.protocol + '//' + window.location.hostname;
    if (window.location.port) {
      baseUrl += ':' + window.location.port;
    }
    let url = `${baseUrl}/ocave/backend/getClientCode.php?codigo=${clientCode}`
    fetch(url)
    .then(response => response.json())
    .then(data => {
      const { nome, cidade, telefone, dataUltimaCompra, valorCompradoTotal } = data;

      document.getElementById('businessName').textContent = data.nome;
      document.getElementById('cityName').textContent = data.cidade;
      document.getElementById('phoneNumber').textContent = data.telefone;
      document.getElementById('lastBought').textContent = data.dataUltimaCompra;
      document.getElementById('totalBoughtValue').textContent = data.valorCompradoTotal;
    }).catch(error => {
      console.error('Ocorreu um erro: ', error);
    });
  }
</script>