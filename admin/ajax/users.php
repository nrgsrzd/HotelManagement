<?php
    require('../inc/db_config.php');
    require('../inc/essentials.php');
    adminLogin();


    function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);
    
        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }


    if(isset($_POST['add_room'])){
 //       echo "222wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww";
     //   $features = filteration(json_decode($_POST['features']));
      //  echo "45";
        $frm_data = filteration($_POST);
     //   echo "23";
        $ql = "INSERT INTO `rooms`(`name`, `area`, `price`, `quality`, `adult`, `available`, `status`, `floor`) VALUES ('$frm_data[name]', '$frm_data[area]',
         '$frm_data[price]', '$frm_data[quantity]', '$frm_data[adult]', '1', '0', '$frm_data[floor]')";
  //  echo"12";
     //   $values = [$frm_data['name'], $frm_data['area'], $frm_data['price'], $frm_data['quantity'], $frm_data['adult'], $frm_data['children'],'1'] ;
  // echo"123";
  $r=insertV2($ql,'siiiiis');
        if($r==1){
            echo 1;
        }
        else{
            echo 0;
        }
    
    //    $room_id = mysqli_insert_id($con);
   //     echo $room_id;
   //     $q2 = "INSERT INTO `room_feature`(`rfroom_id`, `rffeature_id`) VALUES (?,?)";
   

  //      if($stmt = mysqli_prepare($con, $q2))
    //    {
            
     /*       foreach($features as $f){
             //   echo $f;
                $q3 = "SELECT `fId` FROM `features` WHERE `name`='$f'";

                $result = $con->query($q3);

                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                 //   echo "id: " . $row["fId"]. "<br>";
                    $q2 = "INSERT INTO `room_feature`(`rfroom_id`, `rffeature_id`) VALUES ('$room_id','$row[fId]')";
                    
                    if ($con->query($q2) === TRUE) {
                        $flag=1;
                     //   echo "New record created successfully";
                    } else {
                        $flag=0;
                      //  echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
                } else {
                    $flag=0;
             //   echo "0 results";
                }
               // mysqli_stmt_bind_param($stmt, 'ii', $room_id, $f);
           //     echo $stmt;
           //     mysqli_stmt_execute($stmt);
            }
       //     mysqli_stmt_close($stmt);
     //   }
    //    else{
    //        $flag=0;
    //        die('query cannot be prepared -insert');
    //    }
*/
        /*
        if($stmt = mysqli_prepare($con, $q2))
        {
            
            foreach($features as $f){
                echo $f;
                mysqli_stmt_bind_param($stmt, 'ii', $room_id, $f);
           //     echo $stmt;
                mysqli_stmt_execute($stmt);
            }
            mysqli_stmt_close($stmt);
        }
        else{
            $flag=0;
            die('query cannot be prepared -insert');
        }
*/
/*
        if($flag){
            echo 1;
        }
        else{
            echo 0;
        }
        */
    }

    if(isset($_POST['get_all_rooms'])){
        $res = selectAll('passenger');
        $i =1;

        $data = "";
        while($row = mysqli_fetch_assoc($res))
        {

        //    if($row['available']==1){
        //        $status = "<button onclick='toggle_status($row[room_id],0)' class='btn btn-dark btn-sm shadow-none'>active</button>";
       //     }
       //     else{
       //         $status = "<button onclick='toggle_status($row[room_id],1)' class='btn btn-warning btn-sm shadow-none'>inactive</button>";
      //      }
      $p = "'".$row['NID']."'";

            $data.="
                <tr class = 'align-middle'>
                    <td>$i</td>
                    <td>$row[name]</td>
                    <td>$row[NID]</td>
                    <td>$row[phone]</td>
                    <td>$row[address]</td>
                    <td>$row[email]</td>
                    <td>$row[birthdate]</td>
                    <td>
                        <button type='button' onclick=\"edit_details($p)\" class='btn btn-primary shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#edit-room'>
                        <i class='bi bi-pencil-square'></i>
                        </button>
                    </td>
                </tr>
            ";
            $i++;
        }
        echo $data;
    }
     
    if(isset($_POST['toggle_status'])){
        $frm_data = filteration($_POST);
   //     echo $frm_data['toggle_status'];
        $q = "UPDATE `rooms` SET `available`='$frm_data[value]' WHERE `room_id`='$frm_data[toggle_status]'";
        
        if(update($q, 'ii')){
         //   echo"1231";
            echo 1;
        }
        else{
          //  echo"246666666";
            echo 0;
        }
    }

    if(isset($_POST['get_room'])){
    //    echo "#$$$$$$$";
        $frm_data = filteration($_POST);
   //     echo "$";
        $res1 = select("SELECT*FROM `passenger` WHERE `NID`=?",[$frm_data['get_room']], 'i');
        //room_features
        //room_facilities
        
        $roomdata = mysqli_fetch_assoc($res1);
        //video 14 - 1:08
    //    $data = ["roomdata" => $roomdata];
     //   $data = [$roomdata];
        $data = $roomdata;
   //     echo $data;
        $data = json_encode($data);
   //     echo "111";
    //    echo $data;
      //  $d = "'"+$data+"'";
        echo $data;
    }

    
    if(isset($_POST['edit_user'])){

        $frm_data = filteration($_POST);


        $sql = "UPDATE `passenger` SET `name`='$frm_data[name]',`nid`='$frm_data[nid]',`phone`='$frm_data[p]',`address`='$frm_data[add]',`email`='$frm_data[e]' WHERE `p_id`='$frm_data[room_id]'";
//echo $sql;
$r = update($sql, 'ii');
        if($r==1){
            echo 1;
        }
        else{
            echo $r;
        }
    }

    if(isset($_POST['add_image'])){
        $frm_data = filteration($_POST);

        $img_r = uploadImage($_FILES['image'], ROOMS_FOLDER);

        if($img_r == 'inv_img'){
            echo $img_r;
        }
        else if($img_r == 'inv_size'){
            echo $img_r;
        }
        else{
            $q = "INSERT INTO `room_images`(`room_id`, `image`) VALUES ('$frm_data[room_id]','$img_r')";
            $values = [$frm_data['name'], $img_r];
            $res = insert($q, 'ss');
            echo $res;
        }
    }
    
   
    
?>