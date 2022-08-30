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
    .box1{
        width: 925px;
        height: 630px;
        border: 1px solid black;
        border-radius: 25px;
        margin-left: 93px;
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

<!-- check availability form -->
<div class="container availability-form">
    <div class="row">
        <div class="col-lg-12 bg-white shadow p-4 rounded">
            <h5 class="mb-4">Reserve Information</h5>
            <form method="POST"><!-- id="reserve-form"> -->
                <div class="row align-items-end" >
         
           <!--         <div class="box1" data-aos="fade-up"> -->
                      
                      <!--  <div class="row" style="margin-left: 23px; margin-top:12px;"> -->
                        
                        <?php
                              //  echo $_SESSION["reserve"];
                                $reserve =$_SESSION["reserve"];
                                $q = "SELECT rooms.room_id, `area`, `price`, `quality`, `floor`, `img`,`adult` FROM rooms, roomreserve WHERE reserve_id = $reserve AND rooms.room_id = roomreserve.room_id";
                              //  echo $q;
                              $room_id="";
                                $res = selectV3($q, "i");
                                if($res!==0){
                              //      echo "11";
                                    while($row = mysqli_fetch_assoc($res))
                                    {
                                        $room_id=$row['room_id'];
                                     //   echo "%%%";
                                        $price = 150000;
                                        $features="TV";
                                        if($row['quality']=='Normal'){
                                         //   array_push($resn,$row);
                                            $price = 150000;
                                            $features="TV";
                                        }
                                        if($row['quality']=='Royal'){
                                        //    array_push($resn,$row);
                                            $price = 300000;
                                            $features="Pool";
                                          }
                                          if($row['quality']=='VIP'){
                                       //     array_push($resn,$row);
                                            $price = 600000;
                                            $features="jacuzzy";
                                          }
                                         
                                      //  echo "@@";
                                     //   echo $row['room_id'];
                                        $data="";
                                        $data.="
                                            <div class='card mb-4 border-0 shadow' style='width:930px; margin-left:90px;'>
                                            <div class='row g-0 p-3 align-items-center'>
                                            <div class='col-md-5 mb-lg-0 mb-md-0 mb-3'>
                                                <img src='images1/rooms/$row[img]' class='img-fluid rounded' alt='...'>
                                            </div>
                                            <div class='col-md-5 px-lg-3 px-md-3 px-0'>
                                                <h5 class='mb-3' style='color: black;'>$row[room_id]</h5>
                                                <h6 class='mb-3' style='color: black;'>$row[area]</h6>
                                                <div class='features mb-3' style='color:black;'>ّCapacity:
                                                    <span class='badge rounded-pill bg-light text-dark text-wrap'>
                                                    $row[adult]
                                                    </span>
                                                </div>
                                                <div class='features mb-3' style='color:black;'>ّFloor:
                                                    <span class='badge rounded-pill bg-light text-dark text-wrap'>
                                                    $row[floor]
                                                    </span>
                                                </div>
                                            </div>
                                            <div class='col-md-2 mt-lg-0 mt-md-0 text-center'>
                                                <h6 class='mb-4' style='color: black;'>$$price per night</h6>
                                                
                                            </div>
                                            </div>
                                        </div>
                                ";

                                        echo $data;
                                    }

                                    $Spassenger_q = "SELECT `p_id`, `name`, `NID`, `phone`, `address`, `email`, `birthdate`, `start`, `end`,`payment`,`password` FROM passenger, reserve WHERE p_id = passenger_id  AND reserve_id = $reserve";
                                    $start = "";
                                    $end = "";
                                    $payment = "";
                                    $Sres1 = selectV3($Spassenger_q, "i");

                                    $pid="";
                                    $name1 = "";
                                    $nid = "";
                                    $phone="";
                                    $address="";
                                    $email = "";
                                    $date = "";
                                    $pass="";
              
                                    if($Sres1!==0){
                                        //      echo "11";
                                              while($row = mysqli_fetch_assoc($Sres1))
                                              {
                                                $start = $row['start'];
                                                $end = $row['end'];
                                                $payment = $row['payment'];


                                                $pid=$row['p_id'];
                                                $name1 = $row['name'];
                                                $nid = $row['NID'];
                                                $phone=$row['phone'];
                                                $address=$row['address'];
                                                $email = $row['email'];
                                                $date = $row['birthdate'];
                                                $pass=$row['password'];
                                              //    echo "$$$$$$$$$";
                                               //   echo $row['p_id'];
                                                
                                                    $data="";
                                                    $data.="
                                                    <div class='card mb-4 border-0 shadow' style='width:800px; margin-left:155px;'>
                                                    <div class='row g-0 p-3 align-items-center'>
                                                    
                                                    <div class='col-md-5 px-lg-3 px-md-3 px-0'>
                                                        <h5 class='mb-3' style='color: black;'>Passenger</h5>
                                                        <div class='features mb-3'>
                                                            <span class='badge rounded-pill bg-light text-dark text-wrap' style='color: pink;'>
                                                            Name:
                                                            </span>
                                                            $row[name]
                                                            <div class='row'>
                                                            <span class='badge rounded-pill bg-light text-dark text-wrap' style='margin-left:15px; margin-top:20px;'>
                                                            phone:
                                                            </span>
                                                            $row[phone]
                                                            </div
                                                            <div class='row'>
                                                            <span class='badge rounded-pill bg-light text-dark text-wrap' style='margin-top:20px;'>
                                                            NID:
                                                            </span>
                                                            $row[NID]
                                                            </div
                                                        </div>
                                                    </div>
                                                    <div class='col-md-5 px-lg-3 px-md-3 px-0'>
                                                        <h5 class='mb-3' style='color: black;'>Reserve Information</h5>
                                                        <div>
                                                        
                                                            <span class='badge rounded-pill bg-light text-dark text-wrap'>
                                                            Reserve ID:
                                                            </span>
                                                            $reserve
                                                            <span class='badge rounded-pill bg-light text-dark text-wrap' style='margin-left:85px; '>
                                                            Room ID:
                                                            </span>
                                                            $room_id
                                                            <div class='row'>
                                                                <span class='badge rounded-pill bg-light text-dark text-wrap' style='margin-left:15px; margin-top:20px;'>
                                                                check in Date:
                                                                </span>
                                                                $row[start]
                                                            </div>
                                                                <div class='row'>
                                                                <span class='badge rounded-pill bg-light text-dark text-wrap' style='margin-left:15px; margin-top:20px;'>
                                                                check out Date:
                                                                </span>
                                                                $row[end]
                                                            </div>
                                                            <span class='badge rounded-pill bg-light text-dark text-wrap' style='margin-top:20px;'>
                                                            Payment:
                                                            </span>
                                                            $row[payment]
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                    ";

                                                    echo $data;
                                              }
                                              $passenger_q = "SELECT `name`, `NID`, `phone` FROM passenger, checkinout WHERE p_id = passenger_no AND reserve_no = $reserve";
                                                $res1 = selectV3($passenger_q, "i");
                        
                                                if($res1!==0){
                                        //     echo "@!$#$!#$";
                                        echo "<div class='row'>";
                                                    while($row = mysqli_fetch_assoc($res1))
                                                    {
                                                    //    echo "$$$$$$$$$";
                                                    //   echo $row['p_id'];
                                                    
                                                        $data="";
                                                        $data.="
                                                        <div class='card mb-1 border-0 shadow' style='width:310px; margin-left:175px;'>
                                                        <div class='row g-0 p-3 align-items-center'>
                                                        
                                                        <div class='col-md-5 px-lg-3 px-md-3 px-0'>
                                                            <h5 class='mb-3' style='color: black;'>Passenger</h5>
                                                            <div class='features mb-3'>
                                                                <span class='badge rounded-pill bg-light text-dark text-wrap' style='color: pink;'>
                                                                Name:
                                                                </span>
                                                                $row[name]
                                                                <div class='row'>
                                                                <span class='badge rounded-pill bg-light text-dark text-wrap' style='margin-left:15px; margin-top:20px;'>
                                                                phone:
                                                                </span>
                                                                $row[phone]
                                                                </div
                                                                <div class='row'>
                                                                <span class='badge rounded-pill bg-light text-dark text-wrap' style='margin-top:20px;'>
                                                                NID:
                                                                </span>
                                                                $row[NID]
                                                                </div
                                                            </div>
                                                        </div>
                                                        
                                                        </div>
                                                    </div>
                                                        ";

                                                        echo $data;
                                                    }
                                                    echo "</div>";
                                                }
                                                else{
                                                  
                                                }
                                    }
                                    else{
                                        echo "error3";
                                    }
                                    
                                }
                                else{
                                    echo "error";
                                }
                           ?>
                   <!--     </div>
                    </div> -->
                    <button name="submitb" type="submit" class="btn custom-bg text-white" style="width:45%; margin-left:300px; margin-top:50px;">Submit and back to account</button>
                    
                </div>
            </form>
        </div>
    </div>
</div>

<br><br><br>
<br><br><br>


<?php
  if(isset($_POST['submitb'])){
    
    $_SESSION["pid"] =$pid;
     $_SESSION["ns"] =$name1 ;
     //      echo"222";
  //  $_SESSION["userS"] =$row['NID'];
    $_SESSION["IDs"] =$nid;
    $_SESSION["phoneS"] =$phone;
    $_SESSION["addressS"] =$address;
    $_SESSION["emailS"] =$email;
    $_SESSION["dateS"] =$date;
    $_SESSION["password"] =$pass;
    redirect('account.php');
  
  }
?>

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