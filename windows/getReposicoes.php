<!doctype html>
<html lang="pt-br">
<?php require '../functions/head.php'; ?>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <?php require '../functions/navbar.php'; ?>
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <div class="mb-3 d-flex justify-content-between">
                <!-- Start Date -->
                <span class="border rounded m-3 p-3">
                    <label for="startDate">Data Inicial: </label>
                    <input type="date" id="startDate">
                    <label for="endDate">Data Final: </label>
                    <input type="date" id="endDate">
                </span>

                <!-- codigo reposicao -->
                <span class="border rounded m-3 p-3">
                    Código reposição:
                    <label for="15">15</label> <input type="radio" value="15" id="15" name="codRep">
                    <label for="16">16</label> <input type="radio" value="16" id="16" name="codRep">
                </span>

                <span class="border rounded m-3 p-3">
                    Número do pedido: <input type="text" id="numped">
                </span>

                <?php
                require '../functions/type.php';
                require '../functions/setting.php';
                require '../functions/thickness.php';
                require '../functions/colour.php'
                    ?>
            </div>

            <?php
            require '../functions/deps.php';
            require '../functions/issues.php';

            ?>

            <div id="ReposicaoPlaceholder"></div>
            <button class="btn btn-success" onclick="getReposicoes()">Consultar</button>
            <div class="getcontent"></div>
        </div>
    </div>

    <?php require '../functions/scripts.php'; ?>
    <script>
        let baseUrl = window.location.protocol + '//' + window.location.hostname;
        if (window.location.port) {
            baseUrl += ':' + window.location.port;
        }
        function getReposicoes() {
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;
            const codRep = document.querySelector('input[name="codRep"]:checked')?.value;
            const numped = document.getElementById('numped').value;
            const typeOptions = document.querySelector('input[name="typeOptions"]:checked')?.value;
            const configurationOptions = document.querySelector('input[name="configurationOptions"]:checked')?.value;
            const thicknessOptions = document.querySelector('input[name="thicknessOptions"]:checked')?.value;
            const colourOptions = document.querySelector('input[name="colourOptions"]:checked')?.value;
            const sector = document.getElementById('sector').value;
            const issue = document.getElementById('issue').value;

            let url = `${baseUrl}/ocave/backend/getReposicoes.php`;

            const dados = {
                startDate, endDate, codRep, numped, typeOptions, configurationOptions, thicknessOptions, colourOptions, sector, issue
            }

            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(dados)
            })
            .then(res => res.json())
            .then(dados => {
                if(dados){
                    
                let table = '<table class="table"><thead><tr><td>Número do pedido</td><td>Setor</td><td>Problema</td><td>Quantidade</td><td>Largura</td><td>Altura</td><td>Tipo</td><td>Configuração</td><td>Observação</td><td>Data</td><td>Espessura</td><td>Cor</td><td>Autorizado</td><td>Código da reposição</td><td>Status do pagamento</td></tr></thead>';

                dados.forEach(item => {
                    table += `
                        <tr>
                            <td>${item.numPed}</td>
                            <td>${item.sector}</td>
                            <td>${item.issue}</td>
                            <td>${item.quantity}</td>
                            <td>${item.width}</td>
                            <td>${item.height}</td>
                            <td>${item.type}</td>
                            <td>${item.configuration}</td>
                            <td>${item.observacao}</td>
                            <td>${item.created_at}</td>
                            <td>${item.thick}</td>
                            <td>${item.colour}</td>
                            <td>${item.certBy}</td>
                            <td>${item.repoOptions}</td>
                            <td>${item.isItPaid}</td>
                        </tr>
                    `;
                })

                

                table += '</tbody></table>';

                document.getElementById('ReposicaoPlaceholder').innerHTML = table;
                console.log(dados);
            
                } else {
                    let table = '<table class="table"><thead><tr><td>Aviso</td></tr></thead><tbody><tr><td>Nenhum item encontrado.</td></tr></tbody></table>';
                    document.getElementsByClassName('ReposicaoPlaceholder').innerHTML = table;
                }
            })
            .catch(err => {
                window.alert('Algo deu errado, aperte F12 no teeclado para ver');
                console.log(err);
            })
        }
    </script>
</body>

</html>