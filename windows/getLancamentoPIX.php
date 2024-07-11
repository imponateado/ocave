<!doctype html>
<html lang="pt-br">
<?php require '../functions/head.php'; ?>

<body>
  <div class="wrapper d-flex align-items-stretch">
    <?php require '../functions/navbar.php'; ?>
    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default">ID da transação</span>
        </div>
        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"
          id="idtransacao">
      </div>

      <button class="btn btn-success" onclick="getLancamentoPIX()">Consultar</button>
    </div>
  </div>

  <?php require '../functions/scripts.php'; ?>

  <script>
    let baseUrl = window.location.protocol + '//' + window.location.hostname;
    if (window.location.port) {
      baseUrl += ':' + window.location.port;
    }

    function getLancamentoPIX() {
      const idtransacao = document.getElementById('idtransacao').value;

      let url = `${baseUrl}/ocave/backend/getLancamentoPIX.php?idtransacao=${idtransacao}`;

      console.log(url);
    }
  </script>
</body>

</html>