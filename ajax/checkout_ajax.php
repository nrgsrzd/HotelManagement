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


     
    if(isset($_POST['toggle_status']))
    {
        $frm_data = filteration($_POST);

        $q = "UPDATE `rooms` SET `status`='0' WHERE `room_id`='$frm_data[r]'";
        $r =update($q, 'ii');
        if($r==1){
        //    echo "$frm_data[pid]";
            $q = "UPDATE `reserve` SET `status`='1' WHERE `reserve_id`='$frm_data[toggle_status]'";
            $r =update($q, 'ii');
            if($r==1){
            //    echo "$frm_data[pid]";
            echo 1;
                
            }
            else{
                echo 0;
        //   echo "ff";
            }
            
        }
        else{
            echo 0;
      //   echo "ff";
        }
        
    }


    
   
    
?>