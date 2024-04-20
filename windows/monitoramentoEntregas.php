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
          </span>
          <span class="col-1">
            <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">Nome do contato</span>
              </div>
              <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="nomeContato">
            </div>
          </span>
          <span class="col-1">
            <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">Telefone do contato</span>
              </div>
              <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="telefoneContato">
            </div>
          </span>
          <span class="col-1">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="semContato">
            <label class="form-check-label" for="semContato">
              Sem contato com o cliente
            </label>
          </div>
          </span>

          <?php require '../functions/listaReclamacaoSetorizado.php' ?>

          <span class="col-1">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="alerta">
                <label class="form-check-label btn btn-danger" for="alerta">
                  Alerta
                </label>
              </div>
          </span>
          <span class="col-1">
              <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Observação</span>
                </div>
                <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="observacao">
              </div>
          </span>
          <span class="col-1">
              <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Produto que gostaria que entregassemos</span>
                </div>
                <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="produtoGostariaEntregasse">
              </div>
          </span>
          <span class="col-1">
            <button type="button" class="btn btn-success" onclick="insertData();">Gravar</button>
          </span>
        </p>
      </div>
    </div>
	</div>

  <script>
    function insertData() {
      const ordemCarregamento = document.getElementById('ordemCarregamento').value;
      const nomeContato = document.getElementById('nomeContato').value;
      const telefoneContato = document.getElementById('telefoneContato').value;
      const semContato = document.getElementById('semContato').checked;

      let questionarioEntregas = Array.from(document.querySelectorAll('input[name="questionario"]:checked'))
                                      .map(checkbox => checkbox.value)
                                      .join(', ');


      const avaliacaoEmpresa = document.getElementById('avaliacaoEmpresa').value;
      const alerta = document.getElementById('alerta').checked;
      const observacao = document.getElementById('observacao').value;
      const produtoGostariaEntregasse = document.getElementById('produtoGostariaEntregasse').value;

      // if(ordemCarregamento === "" && nomeContato === "" && avaliacaoEmpresa === ""){
      //   alert("Algum dos campos, número da liberação, ou nome do contato, ou avaliação da empresa está (estão) faltando.");
      //   return;
      // }

      let baseUrl = window.location.protocol + '//' + window.location.hostname;
      if (window.location.port) {
        baseUrl += ':' + window.location.port;
      }
      let url = `${baseUrl}/ocave/backend/insertDataDB.php?ordemCarregamento=${ordemCarregamento}&nomeContato=${nomeContato}&telefoneContato=${telefoneContato}&semContato=${semContato}&questionarioEntregas=${questionarioEntregas}&avaliacaoEmpresa=${avaliacaoEmpresa}&alerta=${alerta}&observacao=${observacao}&produtoGostariaEntregasse=${produtoGostariaEntregasse}`;

      fetch(url)
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        return response.text();
      })
      .then(data => {
        window.alert(data);
        document.querySelectorAll('input[type="text"]').forEach(input => input.value = '');
        document.getElementById('clientCode').focus();
        window.scrollTo(0, 0);
      })
      .catch(function(err) {
        console.log("Fetch error :-S", err);
      });
    }
  </script>

	<?php require '../functions/scripts.php';	?>
</body>

</html>