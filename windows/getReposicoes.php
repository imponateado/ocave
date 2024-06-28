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
            <div class="container mt-4">

                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Metragem de Vidro Desperdiçada por Tipo</h5>
                            <canvas id="metragemDesperdicadaChart"></canvas>
                        </div>
                    </div>
                </div>

                <h2>Estatísticas de Reposição</h2>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total de Reposições</h5>
                                <p class="card-text" id="totalReposicoes">0</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Média de Quantidade</h5>
                                <p class="card-text" id="mediaQuantidade">0</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Status de Pagamento</h5>
                                <canvas id="statusPagamentoChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Reposições por Setor</h5>
                                <canvas id="reposicoesPorSetorChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Problemas Mais Comuns</h5>
                                <canvas id="problemasComunsChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

        function atualizarEstatisticas(dados) {
            // Cálculo das estatísticas
            const estatisticas = {
                totalReposicoes: dados.length,
                reposicoesPorSetor: {},
                problemasComuns: {},
                mediaQuantidade: 0,
                statusPagamento: { Pago: 0, 'Não Pago': 0 }
            };

            let somaQuantidade = 0;

            dados.forEach(item => {
                estatisticas.reposicoesPorSetor[item.sector] = (estatisticas.reposicoesPorSetor[item.sector] || 0) + 1;
                estatisticas.problemasComuns[item.issue] = (estatisticas.problemasComuns[item.issue] || 0) + 1;
                somaQuantidade += parseInt(item.quantity);
                estatisticas.statusPagamento[item.isItPaid === 'Sim' ? 'Pago' : 'Não Pago']++;
            });

            estatisticas.mediaQuantidade = somaQuantidade / dados.length;

            // Atualização dos elementos HTML
            document.getElementById('totalReposicoes').textContent = estatisticas.totalReposicoes;
            document.getElementById('mediaQuantidade').textContent = estatisticas.mediaQuantidade.toFixed(2);

            // Criação/atualização dos gráficos
            criarGrafico('statusPagamentoChart', 'Status de Pagamento', estatisticas.statusPagamento, 'doughnut');
            criarGrafico('reposicoesPorSetorChart', 'Reposições por Setor', estatisticas.reposicoesPorSetor, 'bar');
            criarGrafico('problemasComunsChart', 'Problemas Mais Comuns', estatisticas.problemasComuns, 'bar');

            const metragemDesperdicada = {};
            let totalMetragemDesperdicada = 0;

            dados.forEach(item => {
                // ... (cálculos existentes) ...

                // Cálculo da área desperdiçada
                const area = (parseFloat(item.width) * parseFloat(item.height)) / 10000; // convertendo para m²
                if (!metragemDesperdicada[item.type]) {
                    metragemDesperdicada[item.type] = 0;
                }
                metragemDesperdicada[item.type] += area;
                totalMetragemDesperdicada += area;
            });

            estatisticas.mediaQuantidade = somaQuantidade / dados.length;
            estatisticas.metragemDesperdicada = metragemDesperdicada;
            estatisticas.totalMetragemDesperdicada = totalMetragemDesperdicada;

            // Atualização dos elementos HTML
            document.getElementById('totalReposicoes').textContent = estatisticas.totalReposicoes;
            document.getElementById('mediaQuantidade').textContent = estatisticas.mediaQuantidade.toFixed(2);

            // Criação/atualização dos gráficos
            criarGrafico('statusPagamentoChart', 'Status de Pagamento', estatisticas.statusPagamento, 'doughnut');
            criarGrafico('reposicoesPorSetorChart', 'Reposições por Setor', estatisticas.reposicoesPorSetor, 'bar');
            criarGrafico('problemasComunsChart', 'Problemas Mais Comuns', estatisticas.problemasComuns, 'bar');
            criarGrafico('metragemDesperdicadaChart', 'Metragem Desperdiçada por Tipo (m²)', estatisticas.metragemDesperdicada, 'bar');

            // Adicionar total de metragem desperdiçada
            const totalMetragemElement = document.getElementById('totalMetragemDesperdicada');
            if (totalMetragemElement) {
                totalMetragemElement.textContent = estatisticas.totalMetragemDesperdicada.toFixed(2) + ' m²';
            } else {
                const newElement = document.createElement('p');
                newElement.id = 'totalMetragemDesperdicada';
                newElement.textContent = `Total de Metragem Desperdiçada: ${estatisticas.totalMetragemDesperdicada.toFixed(2)} m²`;
                document.querySelector('.container').appendChild(newElement);
            }
        }

        function criarGrafico(id, titulo, dados, tipo) {
            const ctx = document.getElementById(id).getContext('2d');
            const chartStatus = Chart.getChart(id);
            if (chartStatus !== undefined) {
                chartStatus.destroy();
            }

            new Chart(ctx, {
                type: tipo,
                data: {
                    labels: Object.keys(dados),
                    datasets: [{
                        label: titulo,
                        data: Object.values(dados),
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 206, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: titulo
                        }
                    }
                }
            });
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
                    if (dados) {

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

                        atualizarEstatisticas(dados);

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