<?php
    require('../admin/inc/db_config.php');
    require('../admin/inc/essentials.php');
    adminLogin();


    function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);
    
        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }


    if(isset($_POST['set_reserve'])){
        $frm_data = filteration($_POST);
        //Calculate Payment
 #       $q = "SELECT `price` FROM `roomtype` WHERE `title`='$frm_data[roomType]'";
 #       $res = selectV($q);
 #       $price = $res * $frm_data['adult'];

        debug_to_console("aa");

        #    $qi = "INSERT INTO `reserve`(`passenger_id`, `start`, `end`, `payment`, `status`) VALUES ('$frm_data[passengerId]','$frm_data[CheckIn]','$frm_data[CheckOut]','0','0')";
        $qi = "INSERT INTO `reserve`(`passenger_id`,`payment`, `status`) VALUES ('$frm_data[passengerId]','0','0')";
        debug_to_console("ss");
        if(insertV2($qi,'siiiiis')){
            $flag=1;
            $reserve_id = mysqli_insert_id($con);
            echo $flag;
        }
        else{
            echo 0;
        }
    }

    if(isset($_POST['add_passenger'])){

        $frm_data = filteration($_POST);

        $q = "INSERT INTO `passenger`(`name`, `NID`, `phone`, `address`, `birthdate`) VALUES ('$frm_data[name]', '$frm_data[NID]', '$frm_data[phone]','$frm_data[address]', '$frm_data[birth]')";
        if(insertV2($q,'siiiiis')){
            $flag=1;
            $passenger_id = mysqli_insert_id($con);
            $qp = "SELECT `reserve_id` FROM `reserve` WHERE `passenger_id`='$frm_data[passengerId]' AND `status`=0";
            $reserve_id = selectV($q);
            $qc = "INSERT INTO `checkinout`(`reserve_no`, `passenger_no`) VALUES ('$reserve_id','$passenger_id')";
            if(insert($q,'siiiiis')){
                echo 1;
            }
         //   echo $flag;
        }
        else{
            echo 0;
        }
    }

    if(isset($_POST['get_all_rooms'])){
        $res = selectAll('rooms');
        $i =1;

        $data = "";
        while($row = mysqli_fetch_assoc($res))
        {

            if($row['status']==1){
                $status = "<button onclick='toggle_status($row[room_id],0)' class='btn btn-dark btn-sm shadow-none'>active</button>";
            }
            else{
                $status = "<button onclick='toggle_status($row[room_id],1)' class='btn btn-warning btn-sm shadow-none'>inactive</button>";
            }

            $data.="
                <tr class = 'align-middle'>
                    <td>$i</td>
                    <td>$row[name]</td>
                    <td>$row[area] sq. ft.</td>
                    <td>
                        <span class='badge rounded-pill bg-light text-dark'>
                            Adult: $row[adult]
                        </span><br>
                        <span class='badge rounded-pill bg-light text-dark'>
                            Children: $row[children]
                        </span>
                    </td>
                    <td>$$row[price]</td>
                    <td>$row[quality]</td>
                    <td>$status</td>
                    <td>
                        <button type='button' onclick='edit_details($row[room_id])' class='btn btn-primary shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#edit-room'>
                        <i class='bi bi-pencil-square'></i>
                        </button>
                        <button type='button' onclick=\"room_images($row[room_id], '$row[name]')\" class='btn btn-info shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#room-images'>
                        <i class='bi bi-images'></i>
                        </button>
                    </td>
                </tr>
            ";
            $i++;
        }
        echo $data;
    }

    if(isset($_POST['toggle_status1'])){
    //    echo "$$";
        $frm_data = filteration($_POST);

        $_SESSION["pid"] ="$frm_data[pid]";
    //    echo $frm_data['pid'];
        $_SESSION["room_id"] ="$frm_data[toggle_status1]";
        $_SESSION["checkInDate"] ="$frm_data[idate]";
        $_SESSION["checkOutDate"] ="$frm_data[odate]";
        $_SESSION["price"] ="$frm_data[price]";
      //  $_SESSION["ri"] =$reserve_id;
        $_SESSION["n"] =$frm_data['n'];
        echo 1;
        //    echo "Session variables are set.";
  //      redirect('passengerReserveAdmin.php');

    }
     
    if(isset($_POST['toggle_status']))
    {
        $frm_data = filteration($_POST);

        $q = "UPDATE `rooms` SET `status`='$frm_data[value]' WHERE `room_id`='$frm_data[toggle_status]'";
        $r =update($q, 'ii');
        if($r==1){
        //    echo "$frm_data[pid]";
            
            $qpa = "SELECT `p_id` FROM `passenger` WHERE `NID`='$frm_data[pid]'";
            $passenger_id2 = selectp_id($qpa, "i");
           
            if($passenger_id2 !=0){
             //   echo $passenger_id2;
             //   $$passenger_id2="0"+$passenger_id2;
             
                $qi = "INSERT INTO `reserve`(`passenger_id`, `start`, `end`, `payment`, `status`) VALUES ('$passenger_id2','$frm_data[idate]','$frm_data[odate]','$frm_data[price]','0')";
                $res2 = insertV2($qi,'siiiiis');
                if($res2==1){
                    $reserve_id = mysqli_insert_id($con);
          //          echo $reserve_id;

                    $qrr = "INSERT INTO `roomreserve`(`room_id`, `reserve_id`) VALUES ('$frm_data[toggle_status]','$reserve_id')";
                    $r=insertV2($qrr,'siiiiis');
                    if($r==1){

                        $qpa = "SELECT * FROM `passenger` WHERE `NID`='$frm_data[pid]'";

                        $res = selectV3($qpa, "I");

                        while($row = mysqli_fetch_assoc($res)){
                            $_SESSION["name"] = $row['name'];
                            $_SESSION["phone"] = $row['phone'];
                            $_SESSION["address"] = $row['address'];

                        }
                       

                        $_SESSION["pid"] =$frm_data['pid'];
                        $_SESSION["ri"] =$reserve_id;
                        $_SESSION["n"] =$frm_data['n'];
                        echo 1;
                    //    echo "Session variables are set.";
                  //      redirect('passengerReserveAdmin.php');
                       
                    }
                    else{
                        echo 3;
                    }
                    
                }
                else{
                    echo 2;
                }
                
            }
            else{
                echo 4;
            }
            
        }
        else{
            echo 0;
      //   echo "ff";
        }
        
    }

    if(isset($_POST['get_room'])){
    //    echo "#$$$$$$$";
        $frm_data = filteration($_POST);
   //     echo "$";
        $res1 = select("SELECT*FROM `rooms` WHERE `room_id`=?",[$frm_data['get_room']], 'i');
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

    
    if(isset($_POST['edit_room'])){

        $frm_data = filteration($_POST);


        $sql = "UPDATE `rooms` SET `name`='$frm_data[name]',`area`='$frm_data[area]',`price`='$frm_data[price]',`quality`='$frm_data[quality]',`adult`='$frm_data[adult]',`children`='$frm_data[children]' WHERE `room_id`='$frm_data[room_id]';";

        if(update($sql, 'ii')){
            echo 1;
        }
        else{
            echo 0;
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