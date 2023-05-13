<?php
require_once("db_con.php");
$query = query("SELECT b.por_titulo AS item, COUNT(com_por_id) AS canti FROM comentarios a INNER JOIN portafolios b ON a.com_por_id = b.por_id GROUP BY com_por_id");
$res = mysqli_fetch_all($query, MYSQLI_ASSOC);
$jsonRes = json_encode(['res' => $res]);
echo $jsonRes;
