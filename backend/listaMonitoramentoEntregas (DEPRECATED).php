<?php
    require '../functions/makeSqlConnectionToOwn.php';

    $sql = "SELECT * FROM historicoentregas";
    $result = $OwnConn->query($sql);
    $OwnConn->close();

    if ($result->num_rows > 0) {
        echo '<table class="table">';
            echo '  
            <thead>
                <tr>
                    <th scope="col">Ordem de carregamento</th>
                    <th scope="col">Nome do contato</th>
                    <th scope="col">telefone do contato</th>
                    <th scope="col">pedido OK</th>
                    <th scope="col">Questionário de entregas</th>
                    <th scope="col">Avaliação da empresa</th>
                    <th scope="col">Pedido com alerta</th>
                    <th scope="col">Observação</th>
                    <th scope="col">Produtos cliente gostaria empresa vendesse</th>
                    <th scope="col">Data</th>
                </tr>
          </thead>
          ';
        echo '
          <tbody>' . ()() . ''
            // while($row = $result->fetch_assoc()) {
            //     echo '
            //     <tr>
            //         <td> ' . $row["ordemCarregamento"] . '</td>
            //         <td> ' . $row["nomeContato"] . '</td>
            //         <td> ' . $row["telefoneContato"] . '</td>
            //         <td> ' . $row["pedidoOK"] . '</td>
            //         <td> ' . $row["questionarioEntregas"] . '</td>
            //         <td> ' . $row["avaliacaoEmpresa"] . '</td>
            //         <td> ' . $row["alerta"] . '</td>
            //         <td> ' . $row["observacao"] . '</td>
            //         <td> ' . $row["produtoGostariaEntregasse"] . '</td>
            //         <td> ' . $row["data"] . '</td>
            //     </tr>
            //     ';
            // } . '
            // </tbody>
            // ';

        // echo '</table>';
    } else {
        echo 'Nenhum relatório.';
    }
?>