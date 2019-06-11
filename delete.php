<?php
    require_once 'inc/Db_Functions.php';
    $database = new Db_Functions();

    if(isset($_GET["id"])){

        $id = trim($_GET["id"]);
    }

    $id = intval($_GET["id"]);

    $database->delete_single_record($id);
    header('location: dashboard.php');
    exit();
?>