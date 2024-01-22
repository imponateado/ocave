<?php
function isOlderThan7Days ($date, $codigo) {
    $today = time();
    if($today - $date > 7) {
        $sql = "INSERT INTO historicoOld SELECT * FROM historico WHERE codigo = $codigo;";
        $result = $conn->query($sql);
        $sql = "DELETE FROM historico WHERE codigo = $codigo;";
        $result = $conn->query($sql);
    }
}

function currentSeller($codigo) {
    if()
}
?>