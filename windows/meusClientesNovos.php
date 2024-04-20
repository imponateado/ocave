<!doctype html>
<html lang="en">
    <?php require '../functions/head.php' ?>

    <body>
        <div class="wrapper d-flex align-items-stretch">
            <?php require '../functions/navbar.php' ?>
            <!-- Page Content -->
            <div id="content" class="p-4 p-md pt-5">
                <h2>Lista de clientes novos</h2>
                <div class="card" aria-hidden="true">
                    <div class="card-body">
                        <h5 class="card-title">
                            <span class="col-1">Inovar Vidro</span>
                        </h5>
                        <p class="card-text">
                            <span class="col-1">Antônio</span>
                            <span class="col-1">61 55446922</span>
                            <span class="col-1">Pato de minas</span>
                            <span class="col-1">RT 05</span>
                            <span class="col-1">R$ 6.000,00</span>
                            <span class="col-1">Boleto</span>
                            <span><button class="btn btn-success">Aceitar</button></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        

        <?php require '../functions/scripts.php' ?>

    </body>
</html>