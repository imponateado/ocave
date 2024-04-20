<?php
    require '../functions/makeSqlConnectionToWG.php';;

    $WGSQL = "SELECT * FROM rota";
    $WGResult = $WGConn->query($WGSQL);

    $data = array(
        array(
            "IDROTA" => "", 
            "CODINTERNO" => "", 
            "DESCRICAO" => "Selecione uma rota", 
            "SITUACAO" => "", 
            "DISTANCIA" => "", 
            "USUCAD" => "", 
            "DATACAD" => "", 
            "OBS" => "Esta rota existe apenas para nada", 
            "NUMEROMINIMODIASENTREGA" => "", 
            "DIASSEMANA" => "", 
            "ENTREGABALCAO" => "", 
            "ValorFrete" => ""
        )
    );

    if($WGResult) {
        while($row = $WGResult->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data);
    } else {
        echo json_encode(array('error' => 'No results found.'));
    }

    $WGConn->close();
?>