<!doctype html>
<html lang="en">

<?php require '../functions/head.php'; ?>

<body>

  <div class="wrapper d-flex align-items-stretch">
    <?php require '../functions/navbar.php'; ?>
    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
      <?php require '../functions/getClientCode.php'; ?>
      <div class="card" aria-hidden="true">
        <div class="card-body">
          <h5 class="card-title placeholder-glow">
            <span class="col-6">Tecno vidros</span>
          </h5>
          <p class="card-text placeholder-glow">
            <span class="col-7">61588</span>
            <span class="col-4">Cristalina</span>
            <span class="col-4">(61) 99851-7292</span>
            <span class="col-1"></span>
          </p>
        </div>
      </div>

      <div>
        <?php require '../functions/getData.php'; ?>
      </div>

      <div class="card" aria-hidden="true">
        <div class="card-body">
          <h5 class="card-title placeholder-glow">
            <span class="col-6">Dados</span>
          </h5>
          <p class="card-text placeholder-glow">
            <span class="col-7">
              <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Contato</span>
                </div>
                <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
              </div>
            </span>
            <span class="col-4">
              <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Observação</span>
                </div>
                <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
              </div>
            </span>
            <?php require '../functions/listaReclamacaoSetorizado.php' ?>
            <span class="col-6">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label btn btn-danger" for="flexCheckDefault">
                  Alerta
                </label>
              </div>
            </span>
            <span class="col-8">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  <h6>Preço</h6>
                </label>
              </div>
              <div>
                <h6>Padrão</h6>
                <div class="input-group input-group-sm mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Incolor</span>
                  </div>
                  <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                </div>
                <div class="input-group input-group-sm mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Fumê</span>
                  </div>
                  <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                </div>
              </div>
              <div>
                <h6>Engenharia</h6>
                <div class="input-group input-group-sm mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Incolor</span>
                  </div>
                  <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                </div>
                <div class="input-group input-group-sm mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Fumê</span>
                  </div>
                  <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                </div>
              </div>
            </span>
          </p>
        </div>
        <button type="button" class="btn btn-success">Gravar</button>
      </div>
    </div>
  </div>
  </div>
  <?php require '../functions/scripts.php'; ?>

</body>

</html>