<?php
    include "connection.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    // $username = 'muaz';
    // $password = 'muaz';

    $query = $con->query("SELECT * FROM user WHERE username = '".$username."' AND password = '".$password."'");

    $result = array();

    while($ex = $query->fetch_assoc()){
        $result[] = $ex;
    }

    echo json_encode($result);