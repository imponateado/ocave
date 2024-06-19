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
                <!-- código reposição -->
                <div class="border border-2 rounded m-1 p-2">
                  <div><strong>Código de reposição</strong></div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="repoOptions" id="16" value="16">
                    <label class="form-check-label" for="16">16 (Rota)</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="repoOptions" id="15" value="15">
                    <label class="form-check-label" for="15">15 (Balcão)</label>
                  </div>
                </div>

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
                  <option value="cliente">Cliente</option>
                  <option value="vendedor">Vendedor</option>
                  <option value="recepcao">Recepção</option>
                  <option value="gerenciaVendas">Gerência de Vendas</option>
                  <option value="gerenciaPCP">Gerência de PCP</option>
                  <option value="otimizacao">Otimização</option>
                  <option value="conferencia">Conferência</option>
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
                  <option selected value="">Escolha um problema</option>
                  <option value="cor">Cor</option>
                  <option value="espessura">Espessura</option>
                  <option value="pedidoIncompleto">Pedido incompleto</option>
                  <option value="pedidoNaoEntregue">Pedido não entregue</option>
                  <option value="pcp">PCP</option>
                  <option value="vao">Vão</option>
                  <option value="medidas">Medidas</option>
                  <option value="arranhados">Arranhados</option>
                  <option value="furo">Furo</option>
                  <option value="naoCarregado">Não carregado</option>
                  <option value="trincado">Trincado</option>
                  <option value="quebrado">Quebrado</option>
                  <option value="fixoMovel">Fixo/Móvel</option>
                  <option value="esquadro">Esquadro</option>
                  <option value="puxador">Puxador</option>
                  <option value="recorte">Recorte</option>
                  <option value="bolha">Bolha</option>
                  <option value="empenado">Empenado</option>
                </select>
              </div>
              <!-- Input group for quantity, width, and height -->
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">Quantidade</span>
                </div>
                <input type="text" class="form-control" aria-label="Default"
                  aria-describedby="inputGroup-sizing-default" id="qtd">
                <div class="input-group-prepend">
                  <span class="input-group-text">Largura</span>
                </div>
                <input type="text" class="form-control" aria-label="Default"
                  aria-describedby="inputGroup-sizing-default" id="width">
                <div class="input-group-prepend">
                  <span class="input-group-text">Altura</span>
                </div>
                <input type="text" class="form-control" aria-label="Default"
                  aria-describedby="inputGroup-sizing-default" id="height">
              </div>

              <!-- Combined Radio Button Groups -->
              <div class="mb-3 d-flex justify-content-between">
                <!-- Tipo: Porta/Janela/Box/Molde/Outro -->
                <div class="border border-2 rounded m-1 p-2">
                  <div><strong>Tipo:</strong></div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="typeOptions" id="typePorta" value="porta">
                    <label class="form-check-label" for="typePorta">Porta</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="typeOptions" id="typeJanela" value="janela">
                    <label class="form-check-label" for="typeJanela">Janela</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="typeOptions" id="typeBox" value="box">
                    <label class="form-check-label" for="typeBox">Box</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="typeOptions" id="typeMolde" value="molde">
                    <label class="form-check-label" for="typeMolde">Molde</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="typeOptions" id="typeOutro" value="outro">
                    <label class="form-check-label" for="typeOutro">Outro</label>
                  </div>
                </div>

                <!-- Configuração: Fixo/Móvel -->
                <div class="border border-2 rounded m-1 p-2">
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


                <!-- Espessura -->
                <div class="border border-2 rounded m-1 p-2">
                  <div><strong>Espessura:</strong></div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="thicknessOptions" id="4" value="4">
                    <label class="form-check-label" for="4">4</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="thicknessOptions" id="6" value="6">
                    <label class="form-check-label" for="6">6</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="thicknessOptions" id="8" value="8">
                    <label class="form-check-label" for="8">8</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="thicknessOptions" id="10" value="10">
                    <label class="form-check-label" for="10">10</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="thicknessOptions" id="12" value="12">
                    <label class="form-check-label" for="12">12</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="thicknessOptions" id="14" value="14">
                    <label class="form-check-label" for="14">14</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="thicknessOptions" id="15" value="15">
                    <label class="form-check-label" for="15">15</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="thicknessOptions" id="19" value="19">
                    <label class="form-check-label" for="19">19</label>
                  </div>
                </div>

                <!-- Cor -->
                <div class="border border-2 rounded m-1 p-2">
                  <div><strong>Cor:</strong></div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="colourOptions" id="incolor" value="incolor">
                    <label class="form-check-label" for="incolor">Incolor</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="colourOptions" id="fume" value="fume">
                    <label class="form-check-label" for="fume">Fume</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="colourOptions" id="verde" value="verde">
                    <label class="form-check-label" for="verde">Verde</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="colourOptions" id="bronze" value="bronze">
                    <label class="form-check-label" for="bronze">Bronze</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="colourOptions" id="pontilhado"
                      value="pontilhado">
                    <label class="form-check-label" for="pontilhado">Pontilhado</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="colourOptions" id="azul" value="azul">
                    <label class="form-check-label" for="azul">Azul</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="colourOptions" id="reflecta" value="reflecta">
                    <label class="form-check-label" for="reflecta">Reflecta</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="colourOptions" id="silver" value="silver">
                    <label class="form-check-label" for="silver">Silver</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="colourOptions" id="neutral" value="neutral">
                    <label class="form-check-label" for="neutral">Neutral</label>
                  </div>
                </div>
                <!-- Autorização -->
                <div class="border border-2 rounded m-1 p-2">
                  <div><strong>Autorização:</strong></div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="certBy" id="autorizado" value="autorizado">
                    <label class="form-check-label" for="autorizado">Autorizado</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="certBy" id="naoAutorizado" value="naoAutorizado">
                    <label class="form-check-label" for="naoAutorizado">Não autorizado</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="certBy" id="autorizadoSuperior" value="autorizadoSuperior">
                    <label class="form-check-label" for="autorizadoSuperior">Autorizado pelo Wesley</label>
                  </div>
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
          <button type="button" class="btn btn-success" onclick="insertNewRegister()">Adicionar cadastro</button>
          <button type of_button="button" class="btn btn-success" onclick="insertNewClient();">Novo cliente</button>
        </span>
        <span class="col01">
          <textarea id="copyText" style="width:100%; height:100px;"></textarea>
          <button id="generateAndRedirect" class="btn btn-primary" onclick="generateAndRedirect()">Gerar e Redirecionar</button>
        </span>
        </p>
      </div>
    </div>
  </div>
  <script>function generateAndRedirect() {
  const repoOption = document.querySelector('input[name="repoOptions"]:checked')?.value;
  const numPed = document.getElementById('numPed').value;
  const sector = document.getElementById('sector').value;
  const issue = document.getElementById('issue').value;
  const qtd = document.getElementById('qtd').value;
  const width = document.getElementById('width').value;
  const height = document.getElementById('height').value;
  const typeOptions = document.querySelector('input[name="typeOptions"]:checked')?.value;
  const configurationOptions = document.querySelector('input[name="configurationOptions"]:checked')?.value;
  const thickOptions = document.querySelector('input[name="thicknessOptions"]:checked')?.value;
  const colourOptions = document.querySelector('input[name="colourOptions"]:checked')?.value;
  const certBy = document.querySelector('input[name="certBy"]:checked')?.value;
  const observacao = document.getElementById('observacao').value;

  let textToCopy = `Pedido: ${numPed}\nDepartamento: ${sector}\nProblema: ${issue}\nQuantidade: ${qtd}\nLargura: ${width}\nAltura: ${height}\nTipo: ${typeOptions}\nConfiguração: ${configurationOptions}\nEspessura: ${thickOptions}\nCor: ${colourOptions}\nCertificação: ${certBy}\nObservações: ${observacao}`;

  let copyText = document.getElementById('copyText');
  copyText.value = textToCopy;
  copyText.select();
  document.execCommand('copy');

  alert('Texto copiado! Cole no próximo site.');
  
  // Redirecionando o usuário
  window.open(`https://192.168.20.10:20085/Cadastros/CadSugestaoCliente.aspx?idPedido=${numPed}`, '_blank');
}

    let baseUrl = window.location.protocol + '//' + window.location.hostname;
    if (window.location.port) {
      baseUrl += ':' + window.location.port;
    }
    function clearFields(excludeRepoAndNumPed = false) {
  // Não limpa se a flag excludeRepoAndNumPed é verdadeira
  if (!excludeRepoAndNumPed) {
    document.getElementById('numPed').value = '';
  }

  document.getElementById('sector').value = '';
  document.getElementById('issue').value = '';
  document.getElementById('qtd').value = '';
  document.getElementById('width').value = '';
  document.getElementById('height').value = '';
  document.querySelectorAll('input[type="radio"]').forEach(input => {
    input.checked = false;
  });
  document.getElementById('observacao').value = '';
}

function insertNewRegister() {
  // (Código existente permanece aqui)

  clearFields(true); // Chama a função clearFields com excludeRepoAndNumPed como true
}

function insertNewClient() {
  // (Código existente permanece aqui)

  clearFields(); // Chama a função clearFields sem argumentos para limpar todos os campos
}


    function insertNewRegister() {
      const repoOption = document.querySelector('input[name="repoOption"]:checked')?.value;
      const numPed = document.getElementById('numPed').value;
      const sector = document.getElementById('sector').value;
      const issue = document.getElementById('issue').value;
      const qtd = document.getElementById('qtd').value;
      const width = document.getElementById('width').value;
      const height = document.getElementById('height').value;
      const typeOptions = document.querySelector('input[name="typeOptions"]:checked')?.value;
      const configurationOptions = document.querySelector('input[name="configurationOptions"]:checked')?.value;
      const thickOptions = document.querySelector('input[name="thicknessOptions"]:checked')?.value;
      const colourOptions = document.querySelector('input[name="colourOptions"]:checked')?.value;
      const certBy = document.querySelector('input[name="certBy"]:checked')?.value;
      const observacao = document.getElementById('observacao').value;

      let url = `${baseUrl}/ocave/backend/insertReposicao.php`;

      const data = {
        repoOption,
        numPed,
        sector,
        issue,
        qtd,
        width,
        height,
        typeOptions,
        configurationOptions,
        thickOptions,
        colourOptions,
        certBy,
        observacao
      }

      fetch(url, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
      })
        .then(res => res.text())
        .then(data => {
          window.alert(data);
        })
        .catch(err => {
          window.alert("Um erro foi encontrado, pressione F12 e clique em console para ver o erro");
          console.log(err);
        })

        clearFields(true);
    }

    function insertNewClient() {
      insertNewRegister();
      clearFields(false);
    }
  </script>
  <?php require '../functions/scripts.php'; ?>
  </div>
</body>

</html>