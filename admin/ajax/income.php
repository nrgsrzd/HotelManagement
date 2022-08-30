<?php
    require('../inc/db_config.php');
    require('../inc/essentials.php');
    adminLogin();
    
    /*

    if(isset($_POST['toggle_status'])){
        $frm_data = filteration($_POST);
    //    echo "%25245";
   //     echo $frm_data['toggle_status'];
        $q = "UPDATE `reserve` SET `status`='$frm_data[value]' WHERE `reserve_id`='$frm_data[toggle_status]'";
        $sq=update($q, 'ii');
        if($sq==1){
         //   echo"1231";
            echo 1;
        }
        else{
          //  echo"246666666";
            echo $sq;
        }
    }*/

    if(isset($_POST['info'])){
        $frm_data = filteration($_POST);
    
  //      $q = "SELECT passenger.NID, reserve.reserve_id, roomreserve.room_id FROM passenger, reserve, roomreserve WHERE passenger.p_id=reserve.passenger_id AND reserve.reserve_id=roomreserve.reserve_id AND passenger.NID='$frm_data[id]'";
  //      $res = selectV3($q, "i");
        $data ="";
  //      echo $res;
  //      while($row = mysqli_fetch_assoc($res))
  //      {
            $data.="
            <tr class = 'align-middle'>
                <td>$frm_data[info]</td>
                <td>$frm_data[id]</td>
                <td>$frm_data[phone]</td>
            </tr>
            ";
   //     }

        echo $data;
    }

    if(isset($_POST['infoRo'])){
        $frm_data = filteration($_POST);
    
  //      $q = "SELECT passenger.NID, reserve.reserve_id, roomreserve.room_id FROM passenger, reserve, roomreserve WHERE passenger.p_id=reserve.passenger_id AND reserve.reserve_id=roomreserve.reserve_id AND passenger.NID='$frm_data[id]'";
  //      $res = selectV3($q, "i");
        $data ="";
  //      echo $res;
  //      while($row = mysqli_fetch_assoc($res))
  //      {
            $data.="
            <tr class = 'align-middle'>
                <td>$frm_data[floor]</td>
                <td>$frm_data[price]</td>
                <td>$frm_data[infoRo]</td>
            </tr>
            ";
   //     }

        echo $data;
    }

    if(isset($_POST['infoRe'])){
        $frm_data = filteration($_POST);
    
  //      $q = "SELECT passenger.NID, reserve.reserve_id, roomreserve.room_id FROM passenger, reserve, roomreserve WHERE passenger.p_id=reserve.passenger_id AND reserve.reserve_id=roomreserve.reserve_id AND passenger.NID='$frm_data[id]'";
  //      $res = selectV3($q, "i");
        $data ="";
  //      echo $res;
  //      while($row = mysqli_fetch_assoc($res))
  //      {
            $data.="
            <tr class = 'align-middle'>
                <td>$frm_data[infoRe]</td>
                <td>$frm_data[end]</td>
            </tr>
            ";
   //     }

        echo $data;
    }

?>
