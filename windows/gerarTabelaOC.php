<!doctype html>
<html lang="pt-br">
    <?php require '../functions/head.php'; ?>

    <body>
        <div class="wrapper d-flex align-items-stretch">
            <?php require '../functions/navbar.php'; ?>
            <!-- Page Content  -->
            <div id="content" class="p-4 p-md-5 pt-5">
                Data inicial: <input type="date" id="startDate">
                Data final: <input type="date" id="endDate">
                Rota: <select aria-label="Default select example" id="rota">
                        <option value="noValue"></option>
                    </select>
                <button class="btn btn-success" onclick="onButtonClick()">Consultar</button>
                <div id="contentHistory"></div>
            </div>
        </div>

        <script>
            function onButtonClick() {
                const startDate = document.getElementById('startDate').value;
                const endDate = document.getElementById('endDate').value;
                const rota = document.getElementById('rota').value;

                let baseUrl = window.location.protocol + '//' + window.location.hostname;
                if (window.location.port) {
                    baseUrl += ':' + window.location.port;
                }
                let url = ``;
            }

            window.onload = function() {
                let baseUrl = window.location.protocol + '//' + window.location.hostname;
                if (window.location.port) {
                    baseUrl += ':' + window.location.port;
                }
                var url = `${baseUrl}/ocave/backend/getRotaList.php`;
                fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                return response.json();
                })
                .then(data => {
                    let options = '';
                    data.forEach(item => {
                        options += `<option value="${item.IDROTA}">${item.CODINTERNO} - ${item.DESCRICAO} - ${item.IDROTA}</option>`;
                        document.getElementById('rotas').innerHTML = options;
                    })
                })
            }
        </script>
        <?php require '../functions/scripts.php'; ?>
    </body>
</html>