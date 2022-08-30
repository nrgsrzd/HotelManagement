<?php
session_start();
    require('admin/inc/essentials.php');
    require('admin/inc/db_config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reserve</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/aos.css">
    <link href="https://fonts.googleapis.com/css2?family=MonteCarlo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css">
</head>
َ
<style>

    .footer{
        padding: 80px 0 0;
        background-image: url("images/4.jpg");
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
        position: relative;
        z-index: -1;
    }
    .custom-bg{
        background-color: #2ec1ac;
    }
    .custom-bg:hover{
        background-color: #279e8c;
    }
    .availability-form{
        margin-top: -50px;
        z-index: 2;
        position: relative;
    }
    @media screen and (max-width: 575px){
        .availability-form{
            margin-top: 25px;
            padding: 0 35px;
        }
    }

</style>

<body class="bg-light">


<!-- Carousel-->
<div class="container-fluid px-lg-4 mt-5">
    <div class="swiper swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="images/carousel/1.png" class="w-100 d-block">
            </div>
            <div class="swiper-slide">
                <img src="images/carousel/2.png" class="w-100 d-block">
            </div>
            <div class="swiper-slide">
                <img src="images/carousel/3.png" class="w-100 d-block">
            </div>
            <div class="swiper-slide">
                <img src="images/carousel/4.png" class="w-100 d-block">
            </div>
            <div class="swiper-slide">
                <img src="images/carousel/5.png" class="w-100 d-block">
            </div>
            <div class="swiper-slide">
                <img src="images/carousel/6.png" class="w-100 d-block">
            </div>
        </div>
    </div>
</div>


<h2 class="fw-bold h-font text-center" style="color: black; margin-top:20px;">Passengers Information</h2>



<form method="POST">
The Reserve will Submit by this person
    <hr class="rounded" style="border-radius: 8px; margin-left:200px; width:70%;">
        <div class="container-fluid" style="margin-left:220px;">
            <div class="row">
                <div class="col-md-2 ps-0 mb-3">
                    <label class="form-label fw-bold">NID</label>
                    <input type="text" name="NID" value="<?= $_SESSION["pid"] ?>" class="form-control shadow-none" pattern="[0-9]{10}" required>
                </div>
                <div class="col-md-2 ps-0 mb-2">
                    <label class="form-label fw-bold">Name</label>
                    <input type="text" name="name" value="<?= $_SESSION["name"] ?>" class="form-control shadow-none" required>
                </div>
                <div class="col-md-2 ps-0 mb-3">
                    <label class="form-label fw-bold">Phone</label>
                    <input type="text" name="phone" value="<?= $_SESSION["phone"] ?>" class="form-control shadow-none" pattern="[0-9]{11}" required>
                </div>
                <div class="col-md-2 ps-0 mb-3">
                    <label class="form-label fw-bold">Address</label>
                    <input type="text" name="address" value="<?= $_SESSION["address"] ?>" class="form-control shadow-none">
                </div>
            </div>
        </div>
        <hr class="rounded" style="border-radius: 8px; margin-left:200px; width:70%;">
<?php
//echo $_SESSION["ri"];
//echo $_SESSION["n"];

    for ($i = 0; $i < $_SESSION["n"]-1; $i++) {
        ?>
        <hr class="rounded" style="border-radius: 8px; margin-left:200px; width:70%;">
        <div class="container-fluid" style="margin-left:220px;">
            <div class="row">
                <div class="col-md-2 ps-0 mb-3">
                    <label class="form-label fw-bold">Old NID</label>
                    <input type="text" name="<?php echo $i.'oldId'; ?>" value="0" class="form-control shadow-none" pattern="[0-9]{10}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 ps-0 mb-3">
                    <label class="form-label fw-bold">NID</label>
                    <input type="text" name="<?php echo $i.'id'; ?>" class="form-control shadow-none" pattern="[0-9]{10}">
                </div>
                <div class="col-md-2 ps-0 mb-2">
                    <label class="form-label fw-bold">Name</label>
                    <input type="text" name="<?php echo $i.'nm'; ?>" class="form-control shadow-none">
                </div>
                <div class="col-md-2 ps-0 mb-3">
                    <label class="form-label fw-bold">Phone</label>
                    <input type="text" name="<?php echo $i.'p'; ?>" class="form-control shadow-none" pattern="[0-9]{11}">
                </div>
                <div class="col-md-2 ps-0 mb-3">
                    <label class="form-label fw-bold">birthdate</label>
                    <input type="date" name="<?php echo $i.'d'; ?>" class="form-control shadow-none">
                </div>
                
            </div>
        </div>
        <hr class="rounded" style="border-radius: 8px; margin-left:200px; width:70%;">
        <?php
    }
?>

<button name="Infosubmit" type="submit"  class="btn custom-bg text-white" style="width:45%; margin-left:420px;">Submit</button>

</form>

<?php
    if(isset($_POST['Infosubmit'])){

        $frm_data = filteration($_POST);
 //   $pId = $frm_data['ida'];
        $reserve_id="";
        $flag=0;
        $n = $_SESSION["n"];
    //    echo $n;
        $reserve_id = $_SESSION["ri"];
   //     echo $reserve_id;
  //      $q = "INSERT INTO `passenger`(`name`, `NID`, `phone`, `address`, `birthdate`) VALUES ('$frm_data[name]','$_SESSION[pid]','$frm_data[phone]','$frm_data[address]','$frm_data[birthdate]')";
    //    $r=insertV2($q,'siiiiis');
   //     $passenger_id2 = mysqli_insert_id($con);
   //     if($r==1){
        //    $q = "UPDATE `rooms` SET `status`='1' WHERE `room_id`='$_SESSION[room_id]'";
     //       $r =update($q, 'ii');
        //    if($r==1){
           //     $qpa = "SELECT `p_id` FROM `passenger` WHERE `NID`='$_SESSION[pid]'";
           //     $passenger_id2 = selectp_id($qpa, "i");
            //    if($passenger_id2 !=0){
                //   $$passenger_id2="0"+$passenger_id2;
             //       $qi = "INSERT INTO `reserve`(`passenger_id`, `start`, `end`, `payment`, `status`) VALUES ('$passenger_id2','$_SESSION[checkInDate]','$_SESSION[checkOutDate]','$_SESSION[price]','1')";
            //        $res2 = insertV2($qi,'siiiiis');
           //         if($res2==1){
           //             $reserve_id = mysqli_insert_id($con);
            //            $qrr = "INSERT INTO `roomreserve`(`room_id`, `reserve_id`) VALUES ('$_SESSION[room_id]','$reserve_id')";
            //            $r=insertV2($qrr,'siiiiis');
            //            if($r==1){
                    //     echo $reserve_id;

                    //      $_SESSION["IDs"] ="$frm_data[IDs]";
            //    $_SESSION["phoneS"] ="$frm_data[phoneS]";
            //    $_SESSION["addressS"] ="$frm_data[addressS]";
            //    $_SESSION["emailS"] ="$frm_data[emailS]";
            //    $_SESSION["dateS"] ="$frm_data[dateS]";
                       //     $_SESSION["ri"] =$reserve_id;
                           // $_SESSION["n"] =$frm_data['n'];
                        //    echo "Session variables are set.";
                           // redirect('passengerReserve.php');
                        
                //        }
            //            else{
            //                echo 0;
           //             }
           //         }
            //        else{
            //            return 0;
            //        }
            //    }
            //    else{
            //        return 0;
            //    }
     //       }
      //      else{
       //         return 0;
      //      }
    //    }
    //    else{
    //        echo '<script language="javascript">';
    //        echo 'alert("Error")';
    //        echo '</script>';
     //   }

     $flag=0;
        for ($i = 0; $i < $n-1; $i++) {

        //    echo $_POST[$i."oldId"];
            $oldId =  $_POST[$i."oldId"];

            if($oldId=="0"){


                
            //    echo $_POST[$i."nm"];
                $reserve_id = $_SESSION["ri"];
                $name = $_POST[$i."nm"];
                $NID = $_POST[$i."id"];
                $phone = $_POST[$i."p"];
                $date = $_POST[$i."d"];


                $sql = "SELECT * FROM `passenger` WHERE `NID`='$NID'";

                //     echo "11";
                //     echo $pId;
              //       echo "0000000";
                     $p_id = selectp_id($sql);
                     if($p_id!=0){

                    //    echo "11111111";
                   //      echo "!@#!23";
                         echo '<script language="javascript">';
                         echo 'alert("There is Passenger with this NID")';
                         echo '</script>';
                     }
                     else{

                    //    echo "123444444444";


                $q = "INSERT INTO `passenger`(`name`, `NID`, `phone`, `birthdate`) VALUES ('$name','$NID','$phone','$date')";
                $r=insertV2($q,'siiiiis');
                if($r==1){
                    $p_id = mysqli_insert_id($con);
                //    echo $p_id;
                    $q1 = "INSERT INTO `checkinout`(`reserve_no`, `passenger_no`) VALUES ($reserve_id,$p_id)";
                    $r1=insertV2($q1,'siiiiis');
                    if($r1==1){
               //         echo "weeeeeee";
                        $flag=1;
                        
                    //   redirect('account.php');
                    }
                    else{
                        echo '<script language="javascript">';
                        echo 'alert("Error")';
                        echo '</script>';
                    }
                }
                else{
                    echo '<script language="javascript">';
                    echo 'alert("Error")';
                    echo '</script>';
                }
            }
            }
            else{
          //      echo $_POST[$i."oldId"];
                $flag=2;
                $p2=$_POST[$i."oldId"];


                
              //  echo $_POST[$i."nm"];
                $reserve_id = $_SESSION["ri"];
            //    $name = $_POST[$i."nm"];
           //     $NID = $_POST[$i."id"];
           //     $phone = $_POST[$i."p"];
           //     $date = $_POST[$i."d"];
           //     $q = "INSERT INTO `passenger`(`name`, `NID`, `phone`, `birthdate`) VALUES ('$name','$NID','$phone','$date')";
          //      $r=insertV2($q,'siiiiis');
           //     if($r==1){
           //         $p_id = mysqli_insert_id($con);
            //        echo $p_id;
                    $sql = "SELECT * FROM `passenger` WHERE `NID`='$p2'";

               //     echo "11";
               //     echo $pId;
              //      echo "11";
                    $p_id = selectp_id($sql);
                    if($p_id==0){
             //           echo "!@#!23";
                        echo '<script language="javascript">';
                        echo 'alert("There is no Passenger with this NID")';
                        echo '</script>';
                    }
                    else{
                    
//echo $p_id;

//echo $reserve_id;
                    $q1 = "INSERT INTO `checkinout`(`reserve_no`, `passenger_no`) VALUES ('$reserve_id','$p_id')";

               //     echo $q1;

                    $r1=insertV2($q1,'siiiiis');
                    if($r1==1){
                  //      echo "weeeeeee";
                        $flag=2;
                        
                    //   redirect('account.php');
                    }
                    else{
                        echo '<script language="javascript">';
                        echo 'alert("Error")';
                        echo '</script>';
                    }
          //      }
         //       else{
         //           echo '<script language="javascript">';
         //           echo 'alert("Error")';
         //           echo '</script>';
         //       }

         echo '<script language="javascript">';
         echo 'alert("Reserve Completed!")';
         echo '</script>';
         $_SESSION["reserve"] =$reserve_id;
    //     $_SESSION["n"] =$frm_data['n'];
     //    echo "Session variables are set.";
         redirect('FinalReserveAdmin.php');
         if($n==1){
         //    echo '<script language="javascript">';
        //     echo 'alert("Reserve Completed!")';
         //    echo '</script>';
         //    echo "@$@#$@#$@#$2";
       //      echo $reserve_id;
             $_SESSION["reserve"] =$reserve_id;
        //     $_SESSION["n"] =$frm_data['n'];
         //    echo "Session variables are set.";
             redirect('FinalReserveAdmin.php');
         }
         if($flag==1){
             echo '<script language="javascript">';
             echo 'alert("Reserve Completed!")';
             echo '</script>';
             $_SESSION["reserve"] =$reserve_id;
        //     $_SESSION["n"] =$frm_data['n'];
         //    echo "Session variables are set.";
             redirect('FinalReserveAdmin.php');
         }
         if($flag==2){
             echo '<script language="javascript">';
             echo 'alert("Reserve Completed!")';
             echo '</script>';
 
             $p=$_POST[$i."oldId"];
 
          //   selec
 
 
 
 
             $_SESSION["reserve"] =$reserve_id;
        //     $_SESSION["n"] =$frm_data['n'];
         //    echo "Session variables are set.";
             redirect('FinalReserveAdmin.php');
         }


            }
        }

        }

        if($n==1){
            echo '<script language="javascript">';
            echo 'alert("Reserve Completed!")';
            echo '</script>';
            $_SESSION["reserve"] =$reserve_id;
        //     $_SESSION["n"] =$frm_data['n'];
        //    echo "Session variables are set.";
        redirect('FinalReserveAdmin.php');
          } 

        
    }
?>

<br><br><br>
<br><br><br>

<!-- footer start -->
<?php require('inc/footer.php'); ?>
<!-- footer end -->
<script src="script/aos.js"></script>
<script src="script/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script>
      var swiper = new Swiper(".swiper-container", {
        spaceBetween: 30,
        effect: "fade",
        loop: true,
        autoplay: {
            delay: 3500,
            disableOnInteraction: false
        }
      });
</script>

</body>
</html>