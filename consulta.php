<?php
require 'sqlconnection.php';

$codigo = $_GET["codigo"];

$sql = "SELECT * FROM cliente WHERE codigo = '$codigo'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo
    '
    <br>
    <table border=1>
        <tr>
            <td colspan=10 style="text-align: center; font-size: 1.2rem;">Dados do cliente</td>
        </tr>
        <tr>
            <td>Nome</td>
            <td>CPF/CNPJ</td>
            <td>Endereço</td>
            <td>Cidade</td>
            <td>Telefone</td>
            <td>E-mail</td>
            <td>Data última compra</td>
            <td>Total valor já comprado</td>
            <td>Dias desde última compra</td>
        </tr>
    ';
    while($row = $result->fetch_assoc()) {
    echo "
    <tr>
        <td>" . (isset($row["nome"]) ? $row["nome"] : "Cliente não tem nome!") . "</td>
        <td>" . (isset($row["cpfCNPJ"]) ? $row["cpfCNPJ"] : "Cliente não tem um CPF ou um CNPJ!") . "</td>
        <td>" . (isset($row["endereco"]) ? $row["endereco"] : "Cliente não tem um endereço!") . "</td>
        <td>" . (isset($row["cidade"]) ? $row["cidade"] : "Cliente não tem uma cidade!") . "</td>
        <td>" . (isset($row["telefone"]) ? $row["telefone"] : "Cliente não tem telefone!") . "</td>
        <td>" . (isset($row["e-mail"]) ? $row["e-mail"] : "cliente não tem um e-mail!") . "</td>
        <td> " . (function($row) {
            if(!$row["data"] == ""){
                $data_excel = $row["data"];
                $data_unix = ($data_excel - 25569) * 86400;
                return date("d/m/Y", $data_unix);
            } else {
                return "Cliente não comprou nada.";
            }
        })($row) . " </td>
        <td>R$ " . (isset($row["ultCompra"]) ? $row["ultCompra"] : "Cliente não fez nenhuma compra!") . "</td>
        <td> " . (function($row){
            if(!$row["data"] == "") {
                $excelTimestamp = $row["data"];
                $excelStartDateUnix = strtotime('1900-01-01');
                $unixTimestamp = ($excelTimestamp - 25569) * 86400;
                $currentTimestamp = time();
                $daysOfDifference = floor(($currentTimestamp - $unixTimestamp) / 86400);
                return $daysOfDifference;
            } else {
                return "Cliente não comprou nada!";
            }
        })($row) . "</td>
    </tr>
    ";
    }
    echo "</table>";
    
    echo '<br>';

    $hstQuery = "SELECT * FROM historico WHERE codigo = '$codigo'";
    $hstResult = $conn->query($hstQuery);

    //checks if there is history
    if($hstResult->num_rows > 0) {
        //creates tables to show history info
        echo
        '<table border=1>
        <tr>
            <td>Data</td>
            <td>Vendedor</td>
            <td>Observação</td>
        </tr>
        ';
        while($row = $hstResult->fetch_assoc()) {
            echo 
            '
            <tr>
                <td>' . $row["data"] . '</td>
                <td>' . $row["vendedor"] . '</td>
                <td>' . $row["observacao"] . '</td>
            </tr>
            ';
        }
        echo '</table>';
    } else {
        echo '<br><table border="1"><tr><td>Cliente ainda não tem histórico</td></tr></table>';
    }

    echo '<br>';

    //form to insert data
    echo '
        <input type="text" readonly value="' . $codigo . '">
        <input type="text" name="vendedor" id="vendedor" placeholder="Vendedor">
        <input type="text" name="observacao" id="observacao" placeholder="Observação">
        <button onclick="triggerInsert(); consultarCodigo();">Gravar</button>
    ';
} else {
    echo '<br><table border="1"><tr><td>Este cliente não existe</td></tr></table>';
}


// Fecha a conexão com o banco de dados
$conn->close();
?>