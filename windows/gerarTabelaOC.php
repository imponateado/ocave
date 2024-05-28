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
                <button class="btn btn-success" onclick="onButtonClick()">Consultar</button>
                <div id="contentHistory"></div>
            </div>
        </div>

        <script>
            function onButtonClick() {
                const startDate = document.getElementById('startDate').value;
                const endDate = document.getElementById('endDate').value;

                let baseUrl = window.location.protocol + '//' + window.location.hostname;
                if (window.location.port) {
                    baseUrl += ':' + window.location.port;
                }
                let url = ``;
                }

                fetch(url)
                .then()
                .then()
                .catch()
        </script>
        <?php require '../functions/scripts.php'; ?>
    </body>
</html>