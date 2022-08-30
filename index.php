<?php
// Start the session
//session_start();
require('admin/inc/db_config.php');
require('admin/inc/essentials.php');

session_start();
//$_SESSION["ns"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>   

    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/aos.css"> 
    <link rel="stylesheet" href="css/common.css">
    <link href="https://fonts.googleapis.com/css2?family=MonteCarlo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=MonteCarlo&display=swap" rel="stylesheet">
  </head>
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
<body >


<header class="header">
        <div class="container">
            <div class="row justify-content-between">
                <form class="form-inline my-2 my-lg-0">
                    <button type="button" class="btn btn-outline-light shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                        Login
                    </button>
                    <button type="button" class="btn btn-outline-light shadow-none" data-bs-toggle="modal" data-bs-target="#signupModal">
                        Register
                    </button>
                    <a class="btn btn-outline-light shadow-none" data-bs-toggle="modal" data-bs-target="#forgetPassModal">
                        Forget Password
                    </a>
                </form>
                <button type="button" class="nav-toggler .active">
                    <span></span>
                </button>
                <nav class="nav .open">
                    <ul>  
                        <li class="nav-item"><a href="#rooms">Our rooms</a></li>
                        <li class="nav-item"><a href="#facilities">Our Facilites</a></li>
                        <li class="nav-item"><a href="#about">About us</a></li>
                        <li class="nav-item"><a href="#footer">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/7.jpg" alt="hotel1">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/1.jpg" alt="hotel2">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/6.jpg" alt="hotel3">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<!-- Modal -->
<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form method="POST">
            <div class="modal-header">
                <h5 class="modal-title d-flex align-items-center" style="color:black;">
                <i class="bi bi-person-circle fs-3 me-2" style="color: black;"></i> User Login
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            
                <div class="mb-3">
                    <label class="form-label" >ID NO.</label>
                    <input type="text" class="form-control shadow-none" name="idN" pattern="[0-9]{10}">
                </div>
                <div class="mb-4">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control shadow-none" name="pass" minlength="8" >
                </div>
                
                  <div class="d-flex align-items-center justify-content-between mb-2">
                 <!--    <form action="account.php" method="post">  -->
                         <button name="login" type="submit" class='btn btn-dark shadow-none'>Submit</button>
                 <!--    </form>  -->
           <!--      <button type="button" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#forgetPassModal">Forgot Password?</button> -->
                      
                  </div>
            </div>
        </form>
    </div>
  </div>
</div>

<div class="modal fade" id="forgetPassModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form method="POST">
            <div class="modal-header">
                <h5 class="modal-title d-flex align-items-center">
                <i class="bi bi-person-circle fs-3 me-2" style="color: black;"></i>Forget Password
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            
                <div class="mb-3">
                    <label class="form-label" >ID NO.</label>
                    <input type="text" class="form-control shadow-none" name="idNf" pattern="[0-9]{10}" required>
                </div>
                <div class="mb-4">
                    <label class="form-label">New Password</label>
                    <input type="password" minlength="8" class="form-control shadow-none" name="passf" required>
                </div>
                
                  <div class="d-flex align-items-center justify-content-between mb-2">
         
                         <button name="forget" type="submit" class='btn btn-dark shadow-none'>Submit</button>
       
  
                  </div>
            </div>
        </form>
    </div>
  </div>
</div>


<div class="modal fade" id="signupModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form method="POST">
            <div class="modal-header">
                <h5 class="modal-title d-flex align-items-center" style="color:black;">
                <i class="bi bi-person-lines-fill"></i> User Registeration
                </h5>
                <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                Note: Enter your Information.
              </span>
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label">Name*</label>   
                    <input name="nameS" type="text" class="form-control shadow-none" required>
                  </div>
                  <div class="col-md-6 p-0">
                    <label class="form-label">Email</label>
                    <input name="emailS" type="email" class="form-control shadow-none">
                  </div>
                  <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label">Phone number*</label>

                    <input name="phoneS" type="phone" pattern="[0-9]{11}" class="form-control shadow-none" required>
                  </div>
                  <div class="col-md-6 p-0">
                    <label class="form-label">ID*</label>

                    <input name="IDs" type="text" pattern="[0-9]{10}" class="form-control shadow-none" required>
                  </div>
                  <div class="col-md-6 ps-0 mb-3">
                    <label class="form-label">Address*</label>

                    <input name="addressS" type="text" class="form-control shadow-none" required>
                  </div>
                  <!--
                  <div class="col-md-6 p-0">
                    <label class="form-label">gender</label>
                    <select name="gender" id="gender" class="form-control shadow-none">
                      <option value="female">Female</option>
                      <option value="male">Male</option>
                    </select>
                  </div>
  -->
                  <div class="col-md-6 ps-3">
                    <label class="form-label">Date of birth</label>
                    <input name="dateS" type="date" class="form-control shadow-none">
                  </div>
                  <div class="col-md-6 p-3">
                    <label class="form-label">Password*</label>

                    <input name="password" minlength="8" type="password" class="form-control shadow-none" required>
                  </div>
                </div>
              </div>
              <div class="text-center my-1">
                <button name="signup" type="submit" class="btn btn-dark shadow-none">SignUp</button>
              </div>
            
               <!-- <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control shadow-none">
                </div>
                <div class="mb-4">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control shadow-none">
                </div>
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <button type="submit" class='btn btn-dark shadow-none'>Submit</button>
                    <a href="javascript: void(0)" class="text-secondary text-decoration-none">Forgot Password?</a>
                </div> -->
            </div>
        </form>
    </div>
  </div>
</div>

<!-- about section start -->
<section class="about-section sec-padding" id="about">
    <div class="container">

        <div class="row">
            <div class="about-text" data-aos="fade-right" style="color: white;">
                <h3>Welcome!</h3>
                <p>Enjoy your Weakend!</p>
                <p>Relac and Chill!</p>
                <p>leave your comfy on us</p>
                <p>:)</p>
                <p>In this hotel we have differents type of Rooms which you can see below!</p>
                <p>we have 20 floors which each floor has 15 diffrents room.</p>
         
            </div>
            <div class="about-img" data-aos="fade-left">
                <div class="img-box">
                    <img src="images/2.jpg" alt="about img">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about section end -->

<!-- Rooms -->
<h2 class="mt-5 mb-4 text-center fw-bold h-font" style="color: black;" id="rooms">Our Rooms</h2>

<div class="container">
    <div class="row">
<?php

  $q = "SELECT * FROM `roomtype`, `features` WHERE roomtype.roomType_id=features.roomtype";
  $res = selectV3($q, "i");

  $feat = array();
  $type = array();
  $price = array();
  $n=0;
  while($row = mysqli_fetch_assoc($res))
  {
    array_push($feat, $row["name"]);
    array_push($type, $row["title"]);
   // echo $row["price"];
    array_push($price, $row["price"]);
    $n++;
  }

  $q = "SELECT * FROM `roomtype` WHERE 1";
  $res = selectV3($q, "i");

  $typename = array();
  $k=0;
  while($row = mysqli_fetch_assoc($res))
  {
  //  array_push($feat, $row["name"]);
    array_push($typename, $row["title"]);
  //  array_push($price, $row["price"]);
    $k++;
  }
  
  for($i=0; $i<$k;$i++){
    $feature = array();
  $pricee = "";
  //  echo "Type: ".$typename[$i]."\n";
    for($j=0; $j<$n;$j++){
    //  echo $price[$j];
      if($typename[$i]==$type[$j]){
    //    echo "#";
   //     echo $feat[$j];
        array_push($feature, $feat[$j]);
    //    echo $price[0];
    
        $pricee = $price[$j];
      }
    }
 //   echo $price;
    $Normal ="";
    foreach($feature as $value){
  //    echo $value;
      $Normal.="<span class='badge rounded-pill bg-light text-dark text-wrap'>
      $value
      </span>";

    }
    ?>

        <div class="col-lg-4 col-md-5 my-3">
            <div class="card border-0 shadow" style="max-width:350px; margin:auto;">
                <img src="images/rooms/1.jpg" class="card-img-top" >
                <div class="card-body">
                  <h5 style="color: black;"><?php echo $typename[$i] ?></h5>
                  <h6 class="mb-4"  style="color: black;"><?php echo $pricee ?>per night</h6>
                  <div class="features mb-4">
                      <h6 class="mb-1"  style="color: black;">Features</h6>
                      <?php
                      echo $Normal;
                      ?>
                  </div>
                  
                  <div class="ratings mb-4">
                    <h6 class="mb-1" style="color: black;">Rating</h6>
                    <span class="badge rounded-pill bg-light">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star text-warning"></i>
                        <i class="bi bi-star text-warning"></i>
                    </span>
                  </div>
                 
                </div>
                
            </div>
        </div>



    <?php
  }
?>
</div>
</div>




<h2 class="mt-5 mb-4 text-center fw-bold h-font" style="color: black;" id="facilities">Our Facilites </h2>
<div class="cotainer">
    <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
        <div class="col-lg-2 col-md-2 text-center b-white rounded shadow py-4 my-8" style="margin-left: 330px;">
            <img src="images/features/wifi.svg" width="80px">
            <h5 class="mt-3" style="color: black;">Wifi</h5>
        </div>
        <div class="col-lg-2 col-md-2 text-center b-white rounded shadow py-4 my-8" style="margin-left: 330px;">
            <img src="images/features/jacuuzy.png" width="80px">
            <h5 class="mt-3" style="color: black;">Jaccuzy</h5>
        </div>
        <div class="col-lg-2 col-md-2 text-center b-white rounded shadow py-4 my-8" style="margin-left: 330px; margin-top:100px;  margin-bottom:100px;">
            <img src="images/features/tv.svg" width="80px">
            <h5 class="mt-3" style="color: black;">TV</h5>
        </div>
        <div class="col-lg-2 col-md-2 text-center b-white rounded shadow py-4 my-8" style="margin-left: 330px;margin-top:100px; margin-bottom:100px;">
            <img src="images/features/masseur.svg" width="80px">
            <h5 class="mt-3" style="color: black;">masseur</h5>
        </div>
    </div>
</div>


<?php require('inc/footer.php'); ?>


<script src="script/aos.js"></script>

<script src="script/script.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<?php

  if(isset($_POST['forget'])){
    $frm_data = filteration($_POST);

    $query = "UPDATE `passenger` SET `password`=? WHERE `NID`=?";

    $hash = password_hash($frm_data['passf'], PASSWORD_DEFAULT);
    //  echo $frm_data['passf'];
    $values = [$hash, $frm_data['idNf']];
      //echo"2";
    $res = select($query, $values, "ss");
    echo '<script language="javascript">';
    echo 'alert("Your Password has changes!")';
    echo '</script>';
  }

?>



<?php
  if(isset($_POST['login'])){
    $frm_data = filteration($_POST);

    $query = "SELECT * FROM `passenger` WHERE `NID`='$frm_data[idN]'";// AND `password`=?";
      //echo"1";
  //  $values = [$frm_data['idN']];//, $frm_data['pass']];
      //echo"2";
      $res = selectV3($query, "ss");

    if($res->num_rows==1){
      $row =  mysqli_fetch_assoc($res);

      $verify = password_verify($frm_data['pass'], $row['password']);
      if($verify=="1"){
        $_SESSION["pid"] =$row['p_id'];
        $_SESSION["ns"] =$row['name'];
        //      echo"222";
     //  $_SESSION["userS"] =$row['NID'];
        $_SESSION["IDs"] =$row['NID'];
        $_SESSION["phoneS"] =$row['phone'];
        $_SESSION["addressS"] =$row['address'];
        $_SESSION["emailS"] =$row['email'];
        $_SESSION["dateS"] =$row['birthdate'];
        $_SESSION["password"] =$row['password'];
        redirect('account.php');
      }
      else{
        echo '<script language="javascript">';
        echo 'alert("Wrong Password.")';
        echo '</script>';
      }
          //    session_start();
     // $_SESSION['adminLogin']=true;
  //   $_SESSION['userId']=$row['NID'];
  
  //  header('location:account.php');
    }
    else{
      echo '<script language="javascript">';
      echo 'alert("Wrong Username and Password.")';
      echo '</script>';
        //      echo"4";
      //alert('error','Login failed - Invalid Credentials!');
    }
  }
?>

<?php
        if(isset($_POST['signup']))
        {
            $frm_data = filteration($_POST);


            $query = "SELECT * FROM `passenger` WHERE `NID`='$frm_data[IDs]'";

            $res = selectV3($query, "ss");

            if($res->num_rows==1){
              //alert('error','There is account with this ID');
              echo '<script language="javascript">';
              echo 'alert("There is account with this ID")';
              echo '</script>';
            }
            else{
           //   echo "password: ".$frm_data['password']."\n";
              $hash = password_hash($frm_data['password'], PASSWORD_DEFAULT);
         //     $decoded = base64_decode($frm_data['password']);
         //     echo "Hash: ".$hash."\n";

         //     $p = password_hash($hash, PASSWORD_DEFAULT);

           //   echo "pass: ".$p."\n";

              ////////////         $verify = password_verify($frm_data['password'], $hash);


          $query = "INSERT INTO `passenger`(`name`, `NID`, `phone`, `address`, `email`, `birthdate`, `password`) VALUES ('$frm_data[nameS]', '$frm_data[IDs]',
         '$frm_data[phoneS]','$frm_data[addressS]','$frm_data[emailS]','$frm_data[dateS]','$hash')";

          $res = insert($query, "ss");
          if($res=="s"){
            //echo"success";
            // Set session variables

            $_SESSION["ns"] ="$frm_data[nameS]";

            $_SESSION["IDs"] ="$frm_data[IDs]";
            $_SESSION["phoneS"] ="$frm_data[phoneS]";
            $_SESSION["addressS"] ="$frm_data[addressS]";
            $_SESSION["emailS"] ="$frm_data[emailS]";
            $_SESSION["dateS"] ="$frm_data[dateS]";
            $_SESSION["password"] ="$frm_data[password]";
      
            redirect('account.php');
            }
            else{
             alert('error','signup failed - Invalid Credentials!');
            }
          }
    
        }
    ?>


</body>
</html>