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

        $frm_data = filteration($_POST);
 
        $ql = "INSERT INTO `rooms`(`area`, `price`, `quality`, `adult`, `available`, `status`, `floor`) VALUES ('$frm_data[area]',
         '$frm_data[price]', '$frm_data[quantity]', '$frm_data[adult]', '1', '0', '$frm_data[floor]')";
 
        $r=insertV2($ql,'siiiiis');
        if($r==1){
            echo 1;
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

            if($row['available']==1){
                $status = "<button onclick='toggle_status($row[room_id],0)' class='btn btn-dark btn-sm shadow-none'>active</button>";
            }
            else{
                $status = "<button onclick='toggle_status($row[room_id],1)' class='btn btn-warning btn-sm shadow-none'>inactive</button>";
            }

            $history = "<button onclick='history($row[room_id])' class='btn btn-info shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#passengerH'>
            <i class='bi bi-person-lines-fill'></i>
            </button>";

            $data.="
                <tr class = 'align-middle'>
                    <td>$i</td>
                    <td>$row[area]</td>
                    <td>
                        <span class='badge rounded-pill bg-light text-dark'>
                            Adult: $row[adult]
                        </span><br>
                        
                    </td>
                    <td>$$row[price]</td>
                    <td>$row[floor]</td>
                    <td>$row[quality]</td>
                    <td>$status</td>
                    <td>
                        <button type='button' onclick='edit_details($row[room_id])' class='btn btn-primary shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#edit-room'>
                        <i class='bi bi-pencil-square'></i>
                        </button>
                        <button type='button' onclick=\"room_images($row[room_id])\" class='btn btn-info shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#room-images'>
                        <i class='bi bi-images'></i>
                        </button>
                    </td>
                    <td>$history</td>
                </tr>
            ";
            $i++;
        }
        echo $data;
    }
     
    if(isset($_POST['toggle_status'])){
        $frm_data = filteration($_POST);
  
        $q = "UPDATE `rooms` SET `available`='$frm_data[value]' WHERE `room_id`='$frm_data[toggle_status]'";
        
        if(update($q, 'ii')){
   
            echo 1;
        }
        else{
    
            echo 0;
        }
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

    if(isset($_POST['get_room'])){
  
        $frm_data = filteration($_POST);
  
        $res1 = select("SELECT*FROM `rooms` WHERE `room_id`=?",[$frm_data['get_room']], 'i');
  
        $roomdata = mysqli_fetch_assoc($res1);

        $data = $roomdata;
 
        $data = json_encode($data);

        echo $data;
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
   //     echo "imggg: ".$img_r;
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
    //   echo $q;
        $res = selectImg($q);
   //     echo $res;
        $path = ROOMS_IMG_PATH;
//echo $path;
 //       while($row = mysqli_fetch_assoc($res))
 //       {
     if($res!=""){
            echo<<<data
                <tr class='align-middle'>
                    <td><img src='../images1/rooms/$res' class='img-fluid'></td>
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
   //     }
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
    
    
    if(isset($_POST['add_feature'])){

        $frm_data = filteration($_POST);
 
        $ql = "INSERT INTO `roomtype`(`price`, `title`) VALUES ('$frm_data[price]','$frm_data[area]')";
        
        //"INSERT INTO `rooms`(`name`, `area`, `price`, `quality`, `adult`, `available`, `status`, `floor`) VALUES ('$frm_data[name]', '$frm_data[area]',
       //  '$frm_data[price]', '$frm_data[quantity]', '$frm_data[adult]', '1', '0', '$frm_data[floor]')";
 
        $r=insertV2($ql,'siiiiis');
        if($r==1){
            echo 1;
        }
        else{
            echo 0;
        }
    
    }


    if(isset($_POST['get_all_type'])){
        $res = selectAll('roomtype');
        $i =1;

        $data = "";
        while($row = mysqli_fetch_assoc($res))
        {
            $r = "'".$row['title']."'";
            $money = "'".$row['price']."'";
            $data.="
                <tr class = 'align-middle'>
                    <td>$i</td>
                    <td>$row[title]</td>
                    <td>$row[price]</td>
                    <td>
                        <button type='button' onclick=\"edit($row[roomType_id], $i, $r, $money )\" class='btn btn-primary shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#edit-room'>
                        <i class='bi bi-pencil-square'></i>
                        </button>
                        <button onclick='rem($row[roomType_id])' class='btn btn-danger btn-sm shadow-none'>
                            <i class='bi bi-trash'></i>
                        </button>
                    </td>
                </tr>
            ";
            $i++;
        }
        echo $data;
    }

    if(isset($_POST['get_type'])){
  
        $frm_data = filteration($_POST);
  
        $sql= "SELECT*FROM `roomtype` WHERE `title`='$frm_data[get_type]'";
        $res1 = selectV3($sql, "i");
   //     $roomdata = mysqli_fetch_assoc($res1);

     //   $data = $roomdata;
 
        $data = json_encode($res1);

        echo $data;
    }

    if(isset($_POST['edit_type'])){

        $frm_data = filteration($_POST);


        $sql = "UPDATE `roomtype` SET `price`='$frm_data[price]',`title`='$frm_data[area]' WHERE `roomType_id`='$frm_data[room_id]'";
        //"UPDATE `roomtype` SET `name`='$frm_data[name]',`area`='$frm_data[area]',`price`='$frm_data[price]',`quality`='$frm_data[quantity]',`adult`='$frm_data[adult]',`floor`='$frm_data[floor]' WHERE `room_id`='$frm_data[room_id]'";

        $r = update($sql, 'ii');
        if($r==1){
            echo 1;
        }
        else{
            echo $r;
        }
    }

    if(isset($_POST['rem_type'])){
        $frm_data = filteration($_POST);

        $q = "DELETE FROM `roomtype` WHERE `roomType_id`='$frm_data[room_id]'";
    //   echo $q;
        $res = delete($q);

     //   $img = mysqli_fetch_assoc($res);

        if($res==1)
        {
        //    $q = "UPDATE `rooms` SET `img`='' WHERE `room_id`=$frm_data[room_id]";
        //    $res = update($q, "i");
            echo 1;
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