<?php
    require('../inc/db_config.php');
    require('../inc/essentials.php');
    adminLogin();

    if(isset($_POST['get_general']))
    {
        $q = "SELECT*FROM `settings` WHERE `sr_no`=?";
        echo"11";
        echo"$q";
        $values = [2];
        $res = select($q, $values,"i");
        $data = mysqli_fetch_assoc($res);
        $json_data = json_encoda($data);
        echo $json_data;
    }
?>