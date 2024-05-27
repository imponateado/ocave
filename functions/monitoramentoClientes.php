<!doctype html>
<html lang="en">

<?php
require 'head.php';
?>

<body>

  <div class="wrapper d-flex align-items-stretch">
    <?php
    require 'navbar.php';
    ?>
    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
      <input class="form-control" type="text" placeholder="Digite o código do cliente">
      <button type="button" class="btn btn-success">Pronto</button>

      <div class="card" aria-hidden="true">
        <div class="card-body">
          <h5 class="card-title placeholder-glow">
            <span class="col-6">Tecno vidros</span>
          </h5>
          <p class="card-text placeholder-glow">
            <span class="col-7">00000</span>
            <span class="col-4">Nome vidraçaria</span>
            <span class="col-4">Num vidraçaria</span>
            <span class="col-1"></span>
          </p>
        </div>
      </div>

      <div>
        <div class="card" aria-hidden="true">
          <div class="card-body">
            <h5 class="card-title placeholder-glow">
              <span class="col-6">Nome fábrica de vidro</span>
            </h5>
            <p class="card-text placeholder-glow">
              <span class="col-1">03/03/2024</span>
              <span class="col-1">Tássia</span>
              <span class="col-1">Gustavo</span>
              <span class="col-1">Preço, Representante, Atraso de entrega</span>
              <span class="col-1"><button class="btn btn-danger"></button> <button class="btn btn-primary">Ação</button></span>
              <span class="col-1">padrão R$110,00, R$ 135,00, eng: R$ 135,00, R$ 150,00</span>
              <span class="col-1">INFORMOU QUE SÓ VAI COMPRAR PRONTA ENTREGA A PARTIR DE 15/01/2023 SÓ VAI
                COMPRAR. VAI ENTRAR DE RECESSO</span>
              <span class="col-1"></span>
            </p>
          </div>
        </div>
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
            <span class="col-4">
              <div>
                <h6>Financeiro</h6>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                  <label class="form-check-label" for="flexCheckDefault">
                    Mandaram boleto sem mercadoria
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                  <label class="form-check-label" for="flexCheckDefault">
                    Limite muito baixo
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                  <label class="form-check-label" for="flexCheckDefault">
                    Estão me cobrando se já paguei
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                  <label class="form-check-label" for="flexCheckDefault">
                    Não trouxeram maquininha
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                  <label class="form-check-label" for="flexCheckDefault">
                    Valor incorreto
                  </label>
                </div>
              </div>
              <div>
                <h6>Produção</h6>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                  <label class="form-check-label" for="flexCheckDefault">
                    Pedido com avarias
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                  <label class="form-check-label" for="flexCheckDefault">
                    Pedido incompleto
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                  <label class="form-check-label" for="flexCheckDefault">
                    Pedido não entregue
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                  <label class="form-check-label" for="flexCheckDefault">
                    Erro engenharia
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                  <label class="form-check-label" for="flexCheckDefault">
                    Atraso na entrega
                  </label>
                </div>
              </div>
              <div>
                <h6>Profissionais</h6>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                  <label class="form-check-label" for="flexCheckDefault">
                    Vendedor
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                  <label class="form-check-label" for="flexCheckDefault">
                    Representante
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                  <label class="form-check-label" for="flexCheckDefault">
                    Motorista
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                  <label class="form-check-label" for="flexCheckDefault">
                    Carregador
                  </label>
                </div>
              </div>
            </span>
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
            <span class="col-8"></span>
            <span class="col-8"></span>
            <span class="col-8"></span>
            <span class="col-8"></span>
          </p>
        </div>
        <button type="button" class="btn btn-success">Gravar</button>
      </div>
    </div>
  </div>
  </div>
  <?php
  require 'scripts.php';
  ?>

</body>

</html>
