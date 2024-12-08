<!doctype html>
<html lang="en">
<?php require '../functions/head.php'; ?>

<body>
	<div class="wrapper d-flex align-items-stretch">
		<?php require '../functions/navbar.php'; ?>
		<!-- Page Content  -->
		<div id="content" class="p-4 p-md-5 pt-5">
    <class class="btn btn-danger">ATENÇÃO <br> Todas as ligações deverão ser efetuadas na semana posterior às entregas</class>
      <?php require '../functions/getClientCode.php' ?>
      <?php require '../functions/getClientData.php' ?>
    
    <div class="card" aria-hidden="true">
      <div class="card-body">
        <p class="card-text">
          <span class="col-1">
          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm">ordem de carregamento (OC)</span>
            </div>
            <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="ordemCarregamento">
          </div>
          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm">Nome do contato</span>
            </div>
            <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="nomeContato">
          </div>
          <!-- ----- -->
          <p>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="OK">
              <label class="form-check-label" for="OK">
                <div class="btn btn-success">OK</div>
              </label>
            </div>
          </p>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="semContato">
            <label class="form-check-label" for="semContato">
              <div class="btn btn-danger">Sem contato com o cliente</div>
            </label>
          </div>
          <!-- ----- -->
          <p>
            <button type="button" class="btn btn-success" onclick="insertData();">Gravar</button>
          </p>
          <!-- ----- -->
          </span>

          <?php require '../functions/listaReclamacaoSetorizado.php' ?>

          <span class="col-1">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="alerta">
              <label class="form-check-label btn btn-danger" for="alerta">
                Muito insatisfeito
              </label>
            </div>
          </span>
          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-sm">Observação</span>
            </div>
            <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="observacao">
          </div>
          <span class="col-1">
            <button type="button" class="btn btn-success" onclick="insertData();">Gravar</button>
          </span>
        </p>
      </div>
    </div>
	</div>

  <?php require '../functions/scripts.php';	?>

  <script>
    function insertData() {
      const ordemCarregamento = document.getElementById('ordemCarregamento').value;
      const nomeContato = document.getElementById('nomeContato').value;
      const ok = document.getElementById('OK').checked ? '1' : '0';
      const semContato = document.getElementById('semContato').checked;

      let questionarioEntregas = Array.from(document.querySelectorAll('input[name="questionario"]:checked'))
                                      .map(checkbox => checkbox.value)
                                      .join(', ');


      const alerta = document.getElementById('alerta').checked; //alerta agora significa "Muito insatisfeito"
      const observacao = document.getElementById('observacao').value;
      const cliente = document.getElementById('clientCode').value;

      let url = `${baseUrl}/entrega/insert?ordemCarregamento=${ordemCarregamento}&nomeContato=${nomeContato}&ok=${ok}&semContato=${semContato}&questionarioEntregas=${questionarioEntregas}&alerta=${alerta}&observacao=${observacao}&cliente=${cliente}`;

      fetch(url)
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        return response.json();
      })
      .then(data => {
        window.alert(data.msg);
        document.querySelectorAll('input[type="text"]').forEach(input => input.value = '');
        document.getElementById('clientCode').focus();
        window.scrollTo(0, 0);
      })
      .catch(function(err) {
        console.log("Fetch error :-S", err);
      });
    }
  </script>
</body>

</html>