<?php
$hostnom = 'host=btssio.dedyn.io';
$usernom = 'DIARRAM';
$password = '20050517';
$bdd = 'DIARRAM_biblio';

try {
    $monPdo = new PDO("mysql:$hostnom;dbname=$bdd;charset=utf8", $usernom, $password);
    $monPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
    $monPdo = null;
}
?>