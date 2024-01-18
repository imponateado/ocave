<?php
echo '<center>';
require 'sqlconnection.php';

$sql = "select * from historico";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table border=1>';
        echo '
            <tr>
                <td>Funcionário</td>
                <td>Observação</td>
                <td>Data</td>
            </tr>
        ';
        while($row = $result->fetch_assoc()) {
            echo '
                <tr>
                    <td> ' . $row["vendedor"] . '</td>
                    <td> ' . $row["observacao"] . '</td>
                    <td> ' . $row["data"] . '</td>
                </tr>
            ';
        }
    echo '</table>';
    echo '<br>';
    echo '<button onclick="window.print();">Imprimir</button>';
} else {
    echo 'Nenhum relatório.';
}
echo '</center>';
?>