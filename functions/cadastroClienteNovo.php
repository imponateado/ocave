<!doctype html>
<html lang="en">

<?php
require 'head.php';
?>

<body>

    <div class="wrapper d-flex align-items-stretch">
        <?php
        require 'navbar.php';
        ?>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <h2 class="mb-4">Cadastro cliente novo</h2>
            <div class="card" aria-hidden="true">
                <div class="card-body">
                    <h5 class="card-title">
                        <span class=" col-6">Ficha do cliente</span>
                    </h5>
                    <p class="card-text ">
                        <span class=" col-1"><input class="form-control" type="text" placeholder="Empresa"></span>
                        <span class=" col-1"><input class="form-control" type="text" placeholder="Contato"></span>
                        <span class=" col-1"><input class="form-control" type="text" placeholder="Telefone"></span>
                        <span class=" col-1"><input class="form-control" type="text" placeholder="Cidade"></span>
                        <span class=" col-1"><input class="form-control" type="text" placeholder="Rota"></span>
                        <span class=" col-1"><input class="form-control" type="text" placeholder="Valor de compra mensal"></span>
                        <span class=" col-1"><input class="form-control" type="text" placeholder="Forma de pagamento"></span>
                    </p>
                    <a href="#" tabindex="-1" class="btn btn-success">Gravar</a>
                </div>
            </div>
        </div>
    </div>
    <?php
    require 'scripts.php';
    ?>

</body>

</html>