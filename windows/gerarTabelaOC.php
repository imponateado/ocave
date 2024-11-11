<!doctype html>
<html lang="pt-br">
<?php require '../functions/head.php'; ?>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <?php require '../functions/navbar.php'; ?>
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">

            <?php require '../functions/startAndEndDate.php' ?>

            <?php require '../functions/getRotaListHTML.php' ?>

            <button class="btn btn-success" onclick="onButtonClick()">Consultar</button>
            <div id="contentHistory"></div>

            <div>Opa... Gerar tabelas a partir de ordens de carga ainda não estão implementadas! (provavelmente descartado) </div>
        </div>
    </div>
    
    <?php require '../functions/scripts.php'; ?>

    <script>
        function onButtonClick() {
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;
            const rota = document.getElementById('rotas').value;
        }

        window.onload = function () {
            <?php require '../functions/getRotaListHTMLscript.php'; ?>
        }
    </script>
</body>

</html>