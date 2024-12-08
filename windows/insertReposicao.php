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

              <?php require '../functions/deps.php' ?>
              <?php require '../functions/issues.php'; ?>

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

                <?php
                require '../functions/type.php';
                require '../functions/setting.php';
                require '../functions/thickness.php';
                require '../functions/colour.php';
                ?>

                <?php require '../functions/padraoEngenharia.php'; ?>

                <!-- Reposição paga -->
                <div class="border border-2 rounded m-1 p-2">
                  <div><strong>Status pagamento</strong></div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="isItPaid" id="paid" value="paid">
                    <label class="form-check-label" for="paid">Pago</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="isItPaid" id="notPaid" value="notPaid">
                    <label class="form-check-label" for="notPaid">Não pago</label>
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
        <span class="col01">

          <button id="addSuggestion" class="btn btn-primary" onclick="addSuggestion()">Adicionar</button>
          <button id="clearFields" class="btn btn-secondary" onclick="clearAllFields()">Limpar Campos</button>
          <textarea id="copyText" style="width:100%; height:100px;"></textarea>
          <button id="generateAndRedirect" class="btn btn-primary" onclick="gerarTexto()">Gerar
            Sugestão</button>
        </span>
        </p>
      </div>
    </div>
  </div>
  <script>

    let baseUrl = window.location.protocol + '//' + window.location.hostname + ':1235';

    let copyText = document.getElementById('copyText');

    function clearAllFields() {
      const textInputs = document.querySelectorAll('input[type="text"]');
      textInputs.forEach(input => input.value = '');

      const radioInputs = document.querySelectorAll('input[type="radio"]');
      radioInputs.forEach(input => input.checked = false);

      const selects = document.querySelectorAll('select');
      selects.forEach(select => select.selectedIndex = 0);

      document.getElementById('observacao').value = '';
      document.getElementById('copyText').value = '';

      document.getElementById('numPed').value = '';
    }

    function addSuggestion() {
      const repoOptions = document.querySelector('input[name="repoOptions"]:checked')?.value;
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
      const isItPaid = document.querySelector('input[name="isItPaid"]:checked')?.value;

      let textToCopy = `Código reposição: ${repoOptions}\nPedido: ${numPed}\nDepartamento: ${sector}\nProblema: ${issue}\nQuantidade: ${qtd}\nLargura: ${width}\nAltura: ${height}\nTipo: ${typeOptions}\nConfiguração: ${configurationOptions}\nEspessura: ${thickOptions}\nCor: ${colourOptions}\nAutorização: ${certBy}\nObservações: ${observacao}\nStatus do pagamento: ${isItPaid === 'paid' ? "Pago" : "Não pago"}`;

      insertNewRegister();

      
      
      if(copyText.value !== '') {
        copyText.value += '\n\n';
        copyText.value += textToCopy.toUpperCase();
      } else {
        copyText.value = textToCopy.toUpperCase();
      }
      clearFields(true);
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
      const repoOptions = document.querySelector('input[name="repoOptions"]:checked')?.value;
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
      const isItPaid = document.querySelector('input[name="isItPaid"]:checked')?.value;

      let url = `${baseUrl}/reposicao/insert`;

      const data = {
        repoOptions,
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
        observacao,
        isItPaid
      }

      fetch(url, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
      })
        .then(res => res.json())
        .then(data => {
          window.alert(data.msg);
        })
        .catch(err => {
          window.alert("Um erro foi encontrado, pressione F12 e clique em console para ver o erro");
          console.log(err);
        })
    }

    function gerarTexto() {
      textToCopy = copyText.value;
      copyText.value = textToCopy.toUpperCase();
      copyText.select();
      document.execCommand('copy');
      alert('Texto copiado! Cole no próximo site.');
      window.open(`https://localhost/Cadastros/CadSugestaoCliente.aspx?idPedido=${numPed}`, '_blank');
      clearFields(false);
    }
  </script>
  <?php require '../functions/scripts.php'; ?>
  </div>
</body>

</html>
