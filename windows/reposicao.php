<!doctype html>
<html lang="en">
<?php require '../functions/head.php'; ?>

<body>
  <div class="wrapper d-flex align-items-stretch">
    <?php require '../functions/navbar.php'; ?>
    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
      <div class="card" aria-hidden="true">
        <div class="card-body">
          <p class="card-text">
            <span class="col-1">
              <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Código do cliente</span>
                </div>
                <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm"
                  id="codCliente">

                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Número do pedido</span>
                </div>
                <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm"
                  id="numPed">
              </div>
              <!-- New Select for Department -->
              <div class="input-group mb-3">
                <select class="custom-select" id="sector">
                  <option selected>Escolha um departamento</option>
                  <option value="vendedor">Vendedor</option>
                  <option value="recepcao">Recepção</option>
                  <option value="gerenciaVendas">Gerência de Vendas</option>
                  <option value="gerenciaPCP">Gerência de PCP</option>
                  <option value="otimizacao">Otimização</option <option value="conferencia">Conferência</option>
                  <option value="projecao">Projeção</option>
                  <option value="corte">Corte</option>
                  <option value="lapidacao">Lapidação</option>
                  <option value="marcacao">Marcação</option>
                  <option value="temperagem">Temperagem</option>
                  <option value="qualidade">Qualidade</option>
                  <option value="carregamento">Carregamento</option>
                  <option value="expedicaoPE">Expedição Pronta-Entrega</option>
                  <option value="expedicaoEng">Expedição Engenharia</option>
                </select>
              </div>
              <!-- New Select for Issue -->
              <div class="input-group mb-3">
                <select class="custom-select" id="issue">
                  <option selected>Escolha um problema</option>
                  <option value="">Cor</option>
                  <option value="">Espessura</option>
                  <option value="">Pedido incompleto</option>
                  <option value="">Pedido não entregue</option>
                  <option value="">PCP</option>
                  <option value="">Vão</option>
                  <option value="">Medidas</option>
                  <option value="">Arranhados</option>
                  <option value="">Furo</option>
                  <option value="">Não carregado</option>
                  <option value="">Trincado</option>
                  <option value="">Quebrado</option>
                  <option value="">Fixo/Móvel</option>
                  <option value="">Esquadro</option>
                  <option value="">Puxador</option>
                  <option value="">Recorte</option>
                  <option value="">Bolha</option>
                  <option value="">Empenado</option>
                </select>
              </div>
              <!-- Input group for quantity, width, and height -->
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">Quantidade</span>
                </div>
                <input type="text" class="form-control" aria-label="Default"
                  aria-describedby="inputGroup-sizing-default">
                <div class="input-group-prepend">
                  <span class="input-group-text">Largura</span>
                </div>
                <input type="text" class="form-control" aria-label="Default"
                  aria-describedby="inputGroup-sizing-default">
                <div class="input-group-prepend">
                  <span class="input-group-text">Altura</span>
                </div>
                <input type="text" class="form-control" aria-label="Default"
                  aria-describedby="inputGroup-sizing-default">
              </div>
              <!-- Combined Radio Button Groups -->
              <div class="mb-3 d-flex justify-content-between">
                <!-- Tipo: Porta/Janela/Box -->
                <div>
                  <div><strong>Tipo:</strong></div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="typeOptions" id="typePorta" value="Porta">
                    <label class="form-check-label" for="typePorta">Porta</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="typeOptions" id="typeJanela" value="Janela">
                    <label class="form-check-label" for="typeJanela">Janela</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="typeOptions" id="typeBox" value="Box">
                    <label class="form-check-label" for="typeBox">Box</label>
                  </div>
                </div>

                <!-- Configuração: Fixo/Móvel -->
                <div>
                  <div><strong>Configuração:</strong></div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="configurationOptions" id="configFixo"
                      value="Fixo">
                    <label class="form-check-label" for="configFixo">Fixo</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="configurationOptions" id="configMovel"
                      value="Móvel">
                    <label class="form-check-label" for="configMovel">Móvel</label>
                  </div>
                </div>

                <!-- Abertura: Pivotante/De Correr -->
                <div>
                  <div><strong>Abertura:</strong></div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="openingOptions" id="openingPivotante"
                      value="Pivotante">
                    <label class="form-check-label" for="openingPivotante">Pivotante</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="openingOptions" id="openingCorrer"
                      value="De Correr">
                    <label class="form-check-label" for="openingCorrer">De Correr</label>
                  </div>
                </div>
              </div>

              <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm">Observação</span>
                </div>
                <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm"
                  id="observacao">
              </div>
            </span>
            <span class="col-1">
              <button type="button" class="btn btn-success" onclick="insertNewRegister()">Novo cadastro</button>
              <button type of_button="button" class="btn btn-success" onclick="insertNewClient();">Novo cliente</button>
            </span>
          </p>
        </div>
      </div>
    </div>
    <script>
      let baseUrl = window.location.protocol + '//' + window.location.hostname;
      if (window.location.port) {
        baseUrl += ':' + window.location.port;
      }
      let url = `${baseUrl}/path/to/your/api?codCliente=${codCliente}&numPed=${numPed}&sector=${sector}&observacao=${observacao}`;

      function insertNewClient() {
        const codCliente = document.getElementById('codCliente').value;
        const numPed = document.getElementById('numPed').value;
        const sector = document.getElementById('sector').value;
        const observacao = document.getElementById('observacao').value;

        fetch(url)
          .then(response => {
            if (!response.ok) {
              throw new Error('Network response was not ok');
            }
            return response.text();
          })
          .then(data => {
            window.alert(data);
            document.querySelectorAll('input[type="text"], select').forEach(element => element.value = '');
          })
          .catch(function (err) {
            console.log("Fetch error :-S", err);
          });
      }
    </script>
    <?php require '../functions/scripts.php'; ?>
  </div>
</body>

</html>