<?php
    include('./src/models/connect.php');
    
    $connect = db::connnet_DB();
    $select = db::select_get($connect);
    print_r($select);

?>