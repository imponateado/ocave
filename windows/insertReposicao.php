<!doctype html>
<html lang="pt-br">
<?php require '../functions/head.php'; ?>

<body>
  <div class="wrapper d-flex align-items-stretch">
    <?php require '../functions/navbar.php'; ?>
    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
      <div class="border rounded m-3 p-3">
        <!-- código de reposição -->
        <div class="border rounded p-3">
          <span><strong>código de reposição</strong></span>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="codigoReposicao" id="15" checked>
            <label class="form-check-label" for="15">
              15
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="codigoReposicao" id="16">
            <label class="form-check-label" for="16">
              16
            </label>
          </div>
        </div>

        <!-- número do pedido -->
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Número do pedido</span>
          </div>
          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"
            id="numeroDoPedido">
        </div>

        <!-- departamento -->
        <?php require '../functions/deps.php'; ?>

        <!-- problema -->
        <?php require '../functions/issues.php' ?>

        <!-- quantidade/largura/altura -->
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Quantidade</span>
          </div>
          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Altura</span>
          </div>
          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Largura</span>
          </div>
          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
        </div>

        <!-- tipo -->
        <?php require '../functions/type.php' ?>

        <!-- configuração -->
        <?php require '../functions/setting.php' ?>

        <!-- espessura -->
        <?php require '../functions/thickness.php' ?>

        <!-- cor -->
        <?php require '../functions/colour.php' ?>

        <!-- alguma coisa -->
        <?php require '../functions/padraoEngenharia.php'; ?>

        <!-- status do pagamento -->

        <div class="border rounded p-3">
          <div><strong>status do pagamento</strong></div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="statusPagamento" id="pago" checked>
            <label class="form-check-label" for="pago">
              Pago
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="statusPagamento" id="naoPago">
            <label class="form-check-label" for="naoPago">
              Não pago
            </label>
          </div>
        </div>

        <!-- observação -->
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Observação</span>
          </div>
          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"
            id="obs">
        </div>

        <!-- botão gerar texto -->
        <button class="btn btn-primary">Gerar texto</button>

        <!-- botão finalizado -->
        <button class="btn btn-primary">Concluir e enviar para o webglass</button>

        <!-- caixa de texto para copiar -->
        <div class="form-group">
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
            placeholder="Texto gerado vai aqui para posteriormente ser copiado, se achar pertinente, verifique"></textarea>
        </div>
      </div>
    </div>
  </div>

  <?php require '../functions/scripts.php'; ?>
</body>

</html>