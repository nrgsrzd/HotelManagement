<?php

    $hname='localhost';
    $uname='root';
    $pass='';
    $db='hotelwebsite';

    $con = mysqli_connect($hname,$uname,$pass,$db);

    if(!$con){
        die("Cannot Connect to Database".mysqli_connect_error());
    }
    
   

    function filteration($data){
        foreach($data as $key => $value){
            $data[$key] = trim($value);
            $data[$key] = stripcslashes($value);
            $data[$key] = htmlspecialchars($value);
            $data[$key] = strip_tags($value);
        }
        return $data;
    }

 /*   function selectVHistory($sql, $datatypes){
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
          return 0;
        }
    }
    */

    function selectRoomType_id($sql){
        $con = $GLOBALS['con'];
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            return $row["roomType_id"];
        }
        } else {
            return 0;
        }
    }

    function selectRoom_id($sql){
        $con = $GLOBALS['con'];
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            return $row["room_id"];
        }
        } else {
            return 0;
        }
    }

    function selectp_id($sql){
        $con = $GLOBALS['con'];
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            return $row["p_id"];
        }
        } else {
            return 0;
        }
    }

    function selectPassenger($sql){
        $con = $GLOBALS['con'];
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            return $row["reserve_id"];
        }
        } else {
            return 0;
        }
    }

    function selectV($sql){
        $con = $GLOBALS['con'];
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            return $row["price"];
        }
        } else {
            return 0;
        }
    }

    function selectImg($sql){
        $con = $GLOBALS['con'];
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            return $row["img"];
        }
        } else {
            return 0;
        }
    }

    function selectV3($sql, $datatypes){
        $con = $GLOBALS['con'];
    //    echo "!231313213";
    //    echo $sql;
        $result = $con->query($sql);
     //  echo $result;
        if ($result->num_rows > 0) {
          return $result;
          
        } else {
        //  echo "Error: ".mysqli_error($con);
          return 0;
        }
    }

    function select($sql, $values, $datatypes){
   //     echo"5",$datatypes;
        $con = $GLOBALS['con'];
   //     echo"6";
        if($stmt =  mysqli_prepare($con, $sql)){
     //       echo"7";
            mysqli_stmt_bind_param($stmt,$datatypes,...$values);
       //     echo"8";
            if(mysqli_stmt_execute($stmt)){
         //       echo"9";
                $res = mysqli_stmt_get_result($stmt);
           //     echo"10";
                mysqli_stmt_close($stmt);
             //   echo"11";
                return $res;
            }
            else{
               // echo"12";
                mysqli_stmt_close($stmt);
               // echo"13";
                die("Query cannot be executed - Select");
            }
        }
        else{
            echo"14";
            die("Query cannot be executed-Select");
        }
    }

    function insertV2($sql, $datatypes){
        $con = $GLOBALS['con'];
     //   echo $sql;
        if (mysqli_query($con, $sql)) {
            return 1;
           // echo "New record created successfully";
        } else {
         //   echo "Error: " . $sql . "<br>" . mysqli_error($con);
            return 0;
        }
    }
    function insertV5($sql, $datatypes){
        $con = $GLOBALS['con'];
     //   echo $sql;
        if (mysqli_query($con, $sql)) {
            return 1;
           // echo "New record created successfully";
        } else {
         //   echo "Error: " . $sql . "<br>" . mysqli_error($con);
            return 0;
        }
    }

    function insert($sql, $datatypes){
        $con = $GLOBALS['con'];
     //   echo $sql;
        if (mysqli_query($con, $sql)) {
            return "s";
           // echo "New record created successfully";
        } else {
         //   echo "Error: " . $sql . "<br>" . mysqli_error($con);
            return "e";
        }
    }
    function insertroom($sql, $datatypes){
        $con = $GLOBALS['con'];
     //   echo $sql;
        if (mysqli_query($con, $sql)) {
            return mysqli_insert_id($con);
           // echo "New record created successfully";
        } else {
         //   echo "Error: " . $sql . "<br>" . mysqli_error($con);
            return "e";
        }
    }
    function selectAll($table){
        $sql = "SELECT * FROM `$table` limit 3";
     //   echo $sql;
        $con = $GLOBALS['con'];
        $result = $con->query($sql);

        return $result;

    }

    function get_featureId($arr)
    {
        $list = array();
        
        foreach($arr as $value){
         //   echo $value;
         $con = $GLOBALS['con'];
            $sql = "SELECT `id`FROM `features` WHERE `name`='$value'";
            //echo $sql;
            $result = $con->query($sql);
        //    echo $stmt; 
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
              //      echo $row["id"];
                    array_push($list, $row["id"]);
                    
                    // echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
                }
            } else {
                echo "0 results";
            }
        }
        return $list;
    }

    function add_feature_fromRoom($arr, $r_id){
      //  echo $sql;
     //   $index = array();
        $con = $GLOBALS['con'];
        
        foreach($arr as $value){
            $sql = "INSERT INTO `room_facilities`(`room_id`, `facility_id`) VALUES ('$r_id','$value')";
           
        //    echo $sql;
            if ($con->multi_query($sql) === TRUE) {
            //    echo "New records created successfully";
              } else {
              //  echo "Error: " . $sql . "<br>" . $con->error;
            }
        }

        /*
        if($stmt = mysqli_prepare($con, $sql)){
            foreach($index as $value){
                echo $value;
                mysqli_stmt_bind_param($stmt,'ii', $r_id, $value);
                echo"$$$$$";
            //    echo $stmt;
                mysqli_stmt_execute($stmt);   
            }
            mysqli_stmt_close($stmt);
        }
        else{
            $flag=0;
            die('query cannot be prepared - insert');
        }
        */
    }
    function editStatusRoom($id, $val){
        $con = $GLOBALS['con'];
        
        $sql = "UPDATE `rooms` SET `status`='$val' WHERE `room_id`='$id'";

        if ($con->query($sql) === TRUE) {
        echo "Record updated successfully";
        } else {
        echo "Error updating record: " . $conn->error;
        }
    }

    function update($sql, $datatypes){
        $con = $GLOBALS['con'];
        if ($con->query($sql) === TRUE) {
        //    return 1;
            return 1;
        } else {
          //  return 0;
            return "Error updating record: " . $con->error;
        }
    }
    function delete($sql)
    {
        $con = $GLOBALS['con'];
        if ($con->query($sql) === TRUE) {
            return 1;
          } else {
            return "Error deleting record: " . $conn->error;
          }
    }

   
?>