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


    
    if(isset($_POST['dash'])){
        $frm_data = filteration($_POST);
    $f=0;
    $e=0;
    $n=0;
    $a=array();
        $q = "SELECT `status`  FROM `rooms` WHERE 1";
        $r =  selectV3($q, "o");
      //  if($r!="0"){
       //   echo $r;
            while($ro = mysqli_fetch_assoc($r))
                    {
                        $n++;
            if($ro['status']==0){
                $e++;
            }
            else{
                $f++;
            }
      //  }
        }
     //   echo $n;
     echo $e;
     echo "f";
     echo $f;
        array_push($a,$e);
        array_push($a,$f);
     //   echo $a;
    }
    
   
    
?>