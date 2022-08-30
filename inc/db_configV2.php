<?php

    $hname='localhost';
    $uname='root';
    $pass='';
    $db='hotelwebsite';

    $con = mysqli_connect($hname,$uname,$pass,$db);

    if(!$con){
        die("Cannot Connect to Database".mysqli_connect_error());
    }
    
 

    function selectVHistory($sql, $datatypes){
        $hname='localhost';
    $uname='root';
    $pass='';
    $db='hotelwebsite';
        $con = mysqli_connect($hname,$uname,$pass,$db);
    //    echo "!231313213";
    //    echo $sql;
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
          return $result;
          
        } else {
            return $result;
        }
    }
    

   
   
?>