<!doctype html>
<html lang="pt-br">
<?php require '../functions/head.php'; ?>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <?php require '../functions/navbar.php'; ?>
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            Data:
            <input type="date" id="date">
            <button class="btn btn-success" onclick="getReposicoes()">Consultar</button>
            <div class="getcontent"></div>
        </div>
    </div>

    <?php require '../functions/scripts.php'; ?>
    <script>
        let baseUrl = window.location.protocol + '//' + window.location.hostname;
        if(window.location.port) {
            baseUrl += ':' + window.location.port;
        }
        function getReposicoes() {
            const date = document.getElementById('date').value;
            let url = `${baseUrl}/ocave/getReposicao.php`;

            
            
        }

        window.onload = function() {
            var today = new Date().toISOString().split('T')[0];
            document.getElementById('date').value = today;
        }
    </script>
</body>

</html>