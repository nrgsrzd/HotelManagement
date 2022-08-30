<?php
    require('../admin/inc/db_config.php');
    require('../admin/inc/essentials.php');
    adminLogin();
    
    

    if(isset($_POST['toggle_status'])){
        $frm_data = filteration($_POST);
    //    echo "%25245";
   //     echo $frm_data['toggle_status'];
   $q = "UPDATE `rooms` SET `available`='$frm_data[value]' WHERE `room_id`='$frm_data[toggle_status]'";
        $sq=update($q, 'ii');
        if($sq==1){
         //   echo"1231";
            echo 1;
        }
        else{
          //  echo"246666666";
            echo $sq;
        }
    }

    if(isset($_POST['info'])){
        $frm_data = filteration($_POST);
    
        $data ="";

        $data.="
        <tr class = 'align-middle'>
            <td>$frm_data[info]</td>
            <td>
                <span class='badge rounded-pill bg-light text-dark'>
                    Adult: $frm_data[adult]
                </span><br>
            </td>
            <td>$$frm_data[price]</td>
            <td>$frm_data[t]</td>
            
        </tr>
        ";

        echo $data;
    }

    if(isset($_POST['history'])){
        $frm_data = filteration($_POST);

        $q = "SELECT `p_id`, passenger.name, `NID`, `phone`, `address`, `email`, `birthdate`, reserve.reserve_id, `start`, `end`, `payment`, reserve.status FROM passenger, roomreserve, reserve WHERE roomreserve.room_id='$frm_data[history]' AND passenger.p_id = reserve.passenger_id AND reserve.reserve_id=roomreserve.reserve_id";
    
        $res = selectV3($q, "I");

    

        $i =1;
        if(empty($res)){
            echo 0;
        }
        else{
            $data = "";
            while($row = mysqli_fetch_assoc($res))
            {
                $status="";

                      if($row['status']==0){
                        $status = "<button onclick='toggle_status($row[reserve_id],1)' class='btn btn-warning btn-sm shadow-none'>check out</button>";
                      }
                      else{

                        $status = "Checked out";
                      }

                        $data.="
                      <tr class = 'align-middle'>
                          <td>$i</td>
                          <td>$row[reserve_id]</td>
                          <td>$row[name]</td>
                          <td>$row[NID]</td>
                          <td>$row[phone]</td>
                          <td>$row[address]</td>
                          <td>$row[email]</td>
                          <td>$row[birthdate]</td>
                          <td>$row[start]</td>
                          <td>$row[end]</td>
                          <td>$status</td>
                          
                      </tr>
                      ";
                        $i++;

                    $q2 = "SELECT `p_id`, passenger.name, `NID`, `phone`, `address`, `email`, `birthdate` FROM checkinout, passenger, roomreserve, reserve WHERE roomreserve.room_id='$frm_data[history]' AND reserve.reserve_id='$row[reserve_id]' AND checkinout.reserve_no=roomreserve.reserve_id AND checkinout.passenger_no=passenger.p_id AND reserve.reserve_id=roomreserve.reserve_id;";
                $res2 = selectV3($q, "I");
                if(!empty($res2)){
            while($row2 = mysqli_fetch_assoc($res2)){
            $data.="
                      <tr class = 'align-middle'>
                          <td></td>
                          <td></td>
                          <td>$row2[name]</td>
                          <td>$row2[NID]</td>
                          <td>$row2[phone]</td>
                          <td>$row2[address]</td>
                          <td>$row2[email]</td>
                          <td>$row2[birthdate]</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          
                      </tr>
                      ";

            }
     //   $i++;
        }
        }
        echo $data;
        }
    }

    if(isset($_POST['edit_room'])){

        $frm_data = filteration($_POST);


        $sql = "UPDATE `rooms` SET `area`='$frm_data[area]',`price`='$frm_data[price]',`quality`='$frm_data[quantity]',`adult`='$frm_data[adult]',`floor`='$frm_data[floor]' WHERE `room_id`='$frm_data[room_id]'";

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
            $q = "UPDATE `rooms` SET `img`= '$img_r' WHERE `room_id`='$frm_data[room_id]'";
         //   $values = [$frm_data['name'], $img_r];
            $res = update($q, 'ss');
            echo $res;
        }
    }
    


    if(isset($_POST['get_room_images'])){
        $frm_data = filteration($_POST);

        $q = "SELECT `img` FROM `rooms` WHERE `room_id`=$frm_data[get_room_images]";

        $res = selectImg($q);

        $path = ROOMS_IMG_PATH;

     if($res!=""){
            echo<<<data
                <tr class='align-middle'>
                    <td><img src='images1/rooms/$res' class='img-fluid'></td>
                    <td>
                        <button onclick='rem_image($frm_data[get_room_images])' class='btn btn-danger btn-sm shadow-none'>
                            <i class='bi bi-trash'></i>
                        </button>
                    </td>
                </tr>
            data;

     }
     else{
         echo "NO Image";
     }

    }

    
    if(isset($_POST['rem_image'])){
        $frm_data = filteration($_POST);

        $q = "SELECT `img` FROM `rooms` WHERE `room_id`=$frm_data[room_id]";
    //   echo $q;
        $res = selectImg($q);

     //   $img = mysqli_fetch_assoc($res);

        if(deleteImage($res, ROOMS_FOLDER))
        {
            $q = "UPDATE `rooms` SET `img`='' WHERE `room_id`=$frm_data[room_id]";
            $res = update($q, "i");
            echo $res;
        }
        else{
            echo 0;
        }
   //     echo $res;
    //    $path = ROOMS_IMG_PATH;
//echo $path;
 //       while($row = mysqli_fetch_assoc($res))
 //       {
          
   //     }
    }
?>
