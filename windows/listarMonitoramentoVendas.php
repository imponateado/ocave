<!doctype html>
<html lang="pt-br">
<?php require '../functions/head.php'; ?>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <?php require '../functions/navbar.php'; ?>
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            Código do cliente: <input type="text" id="codCliente">
            Data inicial: <input type="date" id="startDate">
            Data final: <input type="date" id="endDate">
            Nome do vendedor: <input type="text" id="vendedor">
            <button class="btn btn-success" onclick="onButtonClick()">Consultar</button>
            <div id="responseContent"></div>
        </div>
    </div>

    <?php require '../functions/scripts.php'; ?>

    <script>
        function onButtonClick() {
            document.getElementById('responseContent').innerHTML = '<div class="loader"></div>';

            const codCliente = document.getElementById('codCliente').value;
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;
            const vendedor = document.getElementById('vendedor').value;

            let url = `${baseUrl}/ocave/backend/getMonitoramentoVendas.php?codCliente=${codCliente}&startDate=${startDate}&endDate=${endDate}&vendedor=${vendedor}`;

            fetch(url)
                .then(res => res.json())
                .then(content => {
                    console.log(content);
                    if (Array.isArray(content) && content.length === 0) {
                        document.getElementById('responseContent').innerHTML = 'No data found';
                        return;
                    }
                    if (content.error) {
                        document.getElementById('responseContent').innerHTML = content.error;
                        return;
                    }

                    var hstTable = `<table class="table"><thead><tr><td>Código do cliente</td><td>Data</td><td>Vendedor</td><td>Contato</td><td>Preços (Ordem: Pronta-entrega Incolor e Fumê, Engenharia Incolor e Fumê)</td><td>Fornecedor</td><td>Ação</td><td>Fantasma</td><td>Representante</td><td>Referência</td><td>Obs Cliente</td><td>Obs Vendedor</td><td>Cliente não atendeu</td></tr></thead><tbody>`;

                    content.forEach(item => {
                        hstTable += `
                        <tr>
                            <td>${item.codigo}</td>
                            <td>${item.data}</td>
                            <td>${item.vendedor}</td>
                            <td>${item.contato}</td>
                            <td>${item.preco ? item.preco : "⬜"}</td>
                            <td>${item.fornecedor}</td>
                            <td>${item.acao}</td>
                            <td>${item.fantasma ? "🟥" : "⬜"}</td>
                            <td>${item.representante ? "🟥" : "⬜"}</td>
                            <td>${item.referencia ? item.referencia : "Cliente não deu referência do local"}</td>
                            <td>${item.obsCliente ? item.obsCliente : "Cliente não tem observação"}</td>
                            <td>${item.obsVendedor}</td>
                            <td>${item.clienteNaoAtendeu ? "🟥" : "🟩"}</td>
                        </tr>
                        `;

                    })

                    hstTable += `</tbody></table>`;
                    document.getElementById('responseContent').innerHTML = hstTable;
                })
                .catch(err => {
                    console.error('Fetch error:', err);
                    document.getElementById('responseContent').innerHTML = 'Error fetching data';
                });
        }

        window.onload(onButtonClick());

    </script>
</body>

</html>

<style>
    .loader {
        width: 120px;
        height: 20px;
        background:
            linear-gradient(90deg, #0001 33%, #0005 50%, #0001 66%) #f2f2f2;
        background-size: 300% 100%;
        animation: l1 1s infinite linear;
    }

    @keyframes l1 {
        0% {
            background-position: right
        }
    }
</style>