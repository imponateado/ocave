<!doctype html>
<html lang="pt-br">
<?php require '../functions/head.php'; ?>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <?php require '../functions/navbar.php'; ?>
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <?php require '../functions/startAndEndDate.php'  ?>

            <?php require '../functions/getRotaListHTML.php' ?>

            Cliente: <input type="text" id="codCliente">
            Cidade: <input type="text" id="cidade">
            <button class="btn btn-success" onclick="onButtonClick()">Consultar</button>
            <div id="responseContent"></div>
        </div>
    </div>

    <script>

        let baseUrl = window.location.protocol + '//' + window.location.hostname;
        if (window.location.port) {
            baseUrl += ':' + window.location.port;
        }

        <?php require '../functions/getRotaListHTMLscript.php' ?>

        function onButtonClick() {
            document.getElementById('responseContent').innerHTML = '<div class="loader"></div>';

            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;
            const rota = document.getElementById('rota').value;
            const codCliente = document.getElementById('codCliente').value;
            const cidade = document.getElementById('cidade').value;


            let url = `${baseUrl}/ocave/backend/getControlesDeViagem.php?startDate=${startDate}&endDate=${endDate}&rota=${rota}&codCliente=${codCliente}&cidade=${cidade}`;

            fetch(url)
                .then(res => {
                    if (res.ok) {
                        return res.json();
                    }
                })
                .then(data => {
                    var hstTable = '<table class="table"><thead><tr><td>Cliente novo</td><td>Inativo</td><td>Empresa fechou?</td><td>Endereço não localizado</td><td>Telefone não atende?</td><td>Código do cliente</td><td>Vendedor</td><td>Cidade</td><td>Rota</td><td>Localização geográfica</td><td>Nome fantasia</td><td>Telefone da empresa</td><td>CPF/CNPJ</td><td>Nome do responsável pela empresa</td><td>Telefone do responsável pela compra</td><td>Contato da empresa</td><td>Formas de pagamento</td><td>Posse do imóvel</td><td>Representante tem fotos do imóvel?</td><td>Média de compra mensal</td><td>Fornecedores</td><td>Preços</td><td>Obs Cliente</td><td>Obs Representante</td><td>Reportar a</td><td>Distribuidor?</td><td>R$0,00</td><td>Não trabalha com vidro temperado</td></tr></thead><tbody>';

                    data.forEach(item => {
                        hstTable += `
                            <tr>
                                <td>${item.clienteNovo}</td>
                                <td>${item.inativo}</td>
                                <td>${item.empresaFechou}</td>
                                <td>${item.enderecoNaoLocalizado}</td>
                                <td>${item.telefoneNaoAtende}</td>
                                <td>${item.codigoCliente}</td>
                                <td>${item.vendedor}</td>
                                <td>${item.cidade}</td>
                                <td>${item.rota}</td>
                                <td>${item.localizacaoGeografica}</td>
                                <td>${item.nomeFantasia}</td>
                                <td>${item.telefoneEmpresa}</td>
                                <td>${item.cpfCNPJ}</td>
                                <td>${item.nomeResponsavelCompra}</td>
                                <td>${item.telefoneResponsavelCompra}</td>
                                <td>${item.contatoEmpresa}</td>
                                <td>${item.formaPgto}</td>
                                <td>${item.posseImovel}</td>
                                <td>${item.fotoImovel}</td>
                                <td>${item.mediaComprasMensais}</td>
                                <td>${item.fornecedores}</td>
                                <td>${item.precos}</td>
                                <td>${item.obsCliente}</td>
                                <td>${item.obsRepresentante}</td>
                                <td>${item.reportar}</td>
                                <td>${item.distribuidor}</td>
                                <td>${item.ohOhOh}</td>
                                <td>${item.naoTrabalhaVidroTemperado}</td>
                            </tr>
                        `;
                    })

                    hstTable += "</tbody></table>";

                    document.getElementById('responseContent').innerHTML = hstTable;
                })
                .catch(err => {
                    window.alert("Um erro ocorreu, aperte F12 para ver");
                    console.log(err);
                })
        }
    </script>

    <?php require '../functions/scripts.php'; ?>
</body>

</html>