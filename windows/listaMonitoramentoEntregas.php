<!doctype html>
<html lang="pt-br">
<?php require '../functions/head.php'; ?>

<body>
  <div class="wrapper d-flex align-items-stretch">
    <?php require '../functions/navbar.php'; ?>
    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
      <div class="filterItself">
        <?php require '../functions/startAndEndDate.php' ?>

        <?php require '../functions/getRotaListHTML.php' ?>

        Cod. Cliente: <input type="text" name="cliente" id="cliente" placeholder="Digite código do cliente">
        <button type="button" class="btn btn-primary" onclick="triggerFilter()">Pronto</button>
      </div>
      <div id="filteredContent">
        <div class="loader"></div>
      </div>
    </div>
  </div>

  <?php require '../functions/scripts.php'; ?>

  <script>

    function formatarString(questEntr) {
      let comEspacos = questEntr.replace(/([A-Z])/g, ' $1');

      let arrayDeStrings = comEspacos.split(',');

      let arrayFormatado = arrayDeStrings.map(item =>
        item.trim().charAt(0).toUpperCase() + item.trim().slice(1)
      );

      return arrayFormatado.join(', ');
    }

    function triggerFilter() {
      const startDate = document.getElementById('startDate').value;
      const endDate = document.getElementById('endDate').value;
      const rota = document.getElementById('rotas').value;
      const cliente = document.getElementById('cliente').value;

      let url = `${baseUrl}/entrega/get?startDate=${startDate}&endDate=${endDate}&rota=${rota}&cliente=${cliente}`;
      fetch(url)
        .then(response => {
          if (!response.ok) {
            throw new Error('Network response was not ok');
          }
          return response.json();
        })
        .then(data => {
          let tabela = '<table class="table">';
          tabela += ' <thead class = "thead-dark"><tr><th>OC</th><th>Cod</th><th>Rota</th><th>Nome</th><th>semContato</th><th>Questionario De Entregas</th><th>Cliente insatisfeito</th><th>Observacao</th><th>data</th></tr></thead><tbody>';
          Object.values(data).forEach(item => {
            tabela += `<tr>
            <td>${item.ordemCarregamento}</td>
              <td>${item.IDCLIENTE}</td>
              <td>${item.IDROTA}</td>
              <td>${item.nomeContato}</td>
              <td>${item.semContato === 'false' ? "⬜" : "🟩"}</td>
              <td>${formatarString(item.questionarioEntregas)}</td>
              <td>${item.alerta === 'true' ? "🟥" : "⬜"}</td>
              <td>${item.observacao}</td>
              <td>${item.data}</td>
            </tr>`;
          });
          tabela += '</tbody></table>';
          document.getElementById('filteredContent').innerHTML = tabela;
        })
    }

    window.onload = function () {

      triggerFilter();

      <?php require '../functions/getRotaListHTMLscript.php' ?>

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