<!--Connecting-->
<?php
    $databaseName = 'AKORNHEI_labs';
    $dsn = 'mysql:host=webdb.uvm.edu;dbname=' .$databaseName;
    $username = 'akornhei_writer';
    $password = '-Q!TK(3-e1cWRu-SK!2U';

    $pdo = new PDO($dsn, $username, $password);
    if($pdo) print '<!--Connection complete-->';
?>