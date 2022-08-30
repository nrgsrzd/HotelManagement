<?php
    require('../inc/db_config.php');
    require('../inc/essentials.php');
    adminLogin();
    
    

    if(isset($_POST['add_feature'])){
        $frm_data = filteration($_POST);
        $q = "SELECT `roomType_id` FROM `roomtype` WHERE `title`='$frm_data[quantity]'";
        $res = selectRoomType_id($q);
        if($res!=0){
            $q = "INSERT INTO `features`(`name`, `roomtype`) VALUES ('$frm_data[name]','$res')";
            $res1 =  insertV5($q, 's');
            if($res1==1){
                echo 1;
            }
            else{
                echo 0;
            }
        }
        else{
            echo "NO";
        }
        
    //    echo "\n",$frm_data['name'],"\n";
      //  $values = $frm_data['name'];
    //    echo $frm_data['name'],"\n";
   //     echo"\nvalue= ",$values, "\n";
       // $res =  insert($q, $values, 's');
       
        
    }
    if(isset($_POST['get_features'])){
    //    echo"567675\n";
 //   write_to_console("33");
        $res =  selectAll('features');
    //   echo"98323";
        $i = 1;
     //   $row = $result->fetch_assoc()
        while($row = mysqli_fetch_assoc($res))
        {
            $type="";
            if($row['roomtype']==1){
                $type="Normal";
            }
            else if($row['roomtype']==2){
                $type="Royal";
            }
            else{
                $type="VIP";
            }
            echo <<<data
                <tr>
                    <td>$i</td>
                    <td>$row[name]</td>
                    <td>$type</td>
                    <td>
                        <button type="button" onclick = "rem_features($row[fId])" class="btn btn-danger btn-sm shadow-none">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </td>
                </tr>
            data;
            $i++;
        }
    }

    if(isset($_POST['rem_feature'])){
    //    write_to_console("1231231231312313123");
   //     echo "123567";
        $frm_data = filteration($_POST);
   //     $values=[$frm_data['rem_feature']];
        
        $q = "DELETE FROM `features` WHERE `fId`='$frm_data[rem_feature]'";
        $res = delete($q);
        if($res==1){
            echo 1;
        }
        else{
            echo $res;
        }
    //    echo $res;
    }   
    /*

    if(isset($_POST['add_facility'])){
        $frm_data = filteration($_POST);
        $q = "INSERT INTO `facilities`(`name`) VALUES ('$frm_data[name]')";
    //    echo "\n",$frm_data['name'],"\n";
        $values = $frm_data['name'];
    //    echo $frm_data['name'],"\n";
   //     echo"\nvalue= ",$values, "\n";
       // $res =  insert($q, $values, 's');
        $res =  insert($q, 's');
        echo $res;
    }
    if(isset($_POST['get_facilities'])){
    //    echo"567675\n";
 //   write_to_console("33");
        $res =  selectAll('facilities');
    //   echo"98323";
        $i = 1;
     //   $row = $result->fetch_assoc()
        while($row = mysqli_fetch_assoc($res))
        {
            echo <<<data
                <tr>
                    <td>$i</td>
                    <td>$row[name]</td>
                    <td>
                        <button type="button" onclick = "rem_facilities($row[id])" class="btn btn-danger btn-sm shadow-none">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </td>
                </tr>
            data;
            $i++;
        }
    }

    if(isset($_POST['rem_facilitie'])){
        write_to_console("1231231231312313123");
        echo "123567";
        $frm_data = filteration($_POST);
        $values=[$frm_data['rem_rem_facilitie']];
        
        $q = "DELETE FROM `facilities` WHERE `id`=?";
        $res = delete($q, $values, 'i');
        echo $res;
    }   
*/

?>
