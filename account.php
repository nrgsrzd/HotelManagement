<?php
require('admin/inc/db_config.php');
require('admin/inc/essentials.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Account</title>

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
    .home-section{
        position: relative;
        /* dige moqe zoom overflow nemikone*/
        overflow: hidden;
    }
    .home-section .home-bg{
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        background-image: url("images/10.jpg");
        background-attachment: fixed;
        background-size: cover;
        background-position: center;
        z-index: -2;
      /*  animation: zoomInOut 20s ease infinite; */
    }

    form .txt_field{
        position: relative;
        border-bottom: 2px solid white;
        margin: 30px 0;
    }
    .txt_field input{
        width: 430px;
        padding: 0 5px;
        height: 40px;
        font-size: 16px;
        border: none;
        background: none;
        outline: none;

    }
    .txt_field label{
        position: absolute;
        top: 50%;
        left: 5px;
        color: white;
        transform: translateY(-50%);
        font-size: 16px;
        pointer-events: none;
    }
    .txt_field input:focus ~ label,
    .txt_field input:valid ~ label{
        top: -5px;
        color: #eaa023;
    }
    .txt_field input:focus ~ span::before,
    .txt_field input:valid ~ span::before{
        width: 100%;
    }
    .box1{
        width: 525px;
        height: 630px;
        border: 1px solid white;
        border-radius: 25px;
        margin-left: 323px;
    }
    .titlel{
        font-size: 34px;
        padding: 0 15px;
        max-width: 700px;
        width: 100%;
        margin-left: 230px;
        margin-top: -30px;
        text-align: center;
    }
</style>
<body>
<header class="header">
        <div class="container">
            <div class="row justify-content-between">
                <form class="form-inline my-2 my-lg-0">
                   <h2 style="margin-left: -73px;">User Account</h2>
                   
                    
                        
                     
                      
                    
                </form>
                <button type="button" class="nav-toggler .active">
                    <span></span>
                </button>
                <nav class="nav .open">
                    <ul>
                        <li class="nav-item"><a href="Home.php?Id=<?= $_SESSION["IDs"]?>">Reserve Room</a></li>
                        <li class="nav-item"><a href="history.php?Id=<?= $_SESSION["IDs"]?>">History</a></li>
                        <li class="nav-item"><a href="index.php">Logout</a></li>
                    </ul>
                </nav>
            </div>
        </div>
</header>


    <section class="home-section" id="home">
    <div class="home-bg"></div>
    <div class="container">
        <div class="row min-vh-100 alighn-items-center">
        <!--    <div class="home-text">
                <h1 style="font-size: 54px;margin-top: -80px">Information</h1>
            </div>-->
            <div class="titlel" data-aos="fade-up">
                <i class="bi bi-person-bounding-box"></i>
            </div>
            <div class="box1" data-aos="fade-up">
                <form style="margin-left: -30px; padding: 93px;margin-top: -63px;" method="POST">

                    <div class="txt_field">
                        <input name="name" type="text"  value="<?= $_SESSION["ns"] ?>" style="color: white">
                        <span></span>
                        <label>Name</label>
                    </div>
                    <div class="txt_field">
                        <input type="text" name="id" value="<?= $_SESSION["IDs"] ?>" style="color: white" pattern="[0-9]{10}">
                        <span></span>
                        <label>NO. ID</label>
                    </div>
                    <div class="txt_field">
                        <input type="text" name="phone" value="<?= $_SESSION["phoneS"] ?>" style="color: white" pattern="[0-9]{11}">
                        <span></span>
                        <label>Phone number</label>
                    </div>
                    <div class="txt_field">
                        <input type="text" name="address" value="<?= $_SESSION["addressS"] ?>" style="color: white">
                        <span></span>
                        <label>Address</label>
                    </div>
                    <div class="txt_field">
                        <input type="email" name="email" value="<?= $_SESSION["emailS"] ?>" style="color: white">
                        <span></span>
                        <label>Email</label>
                    </div>
                    <div class="txt_field">
                        <input type="date" name="date" value="<?= $_SESSION["dateS"] ?>" style="color: white" pattern="[0-9]{11}">
                        <span></span>
                        <label>Birth Date</label>
                    </div>
                    <div class="txt_field">
                        <input type="password" minlength="8" name="pass" value="<?= $_SESSION["password"] ?>">
                        <span></span>
                        <label>Password</label>
                    </div>

                    <button name="edit" type="submit" class="btn btn-dark shadow-none" style="margin-left: 130px;">Submit Edit</button>
                </form>
            </div>
        </div>
    </div>
</section>



<?php
        if(isset($_POST['edit'])){
            $frm_data = filteration($_POST);
            $pid = $_SESSION["pid"];

            if(strlen($frm_data['pass'])==8){
                $hash = password_hash($frm_data['pass'], PASSWORD_DEFAULT); 
            }
            else{
                $hash = $frm_data['pass'];
            }
           
   //         echo $pid;

     //       echo "0000000000000000000";

       //     echo $frm_data["pass"];

            $query = "UPDATE `passenger` SET `name`='$frm_data[name]',`NID`='$frm_data[id]',`phone`='$frm_data[phone]',`address`='$frm_data[address]',`email`='$frm_data[email]',`birthdate`='$frm_data[date]',`password`='$hash' WHERE `p_id`='$pid'";
        //    echo $query;
            $res = update($query, "i");
            if($res ==1){
                echo '<script language="javascript">';
                echo 'alert("Edit was Successful.")';
                echo '</script>';

                $_SESSION["ns"] ="$frm_data[name]";

           //     echo $frm_data['name'];
      //      echo"222";
           //     $_SESSION["userS"] ="$frm_data[userS]";
                $_SESSION["IDs"] ="$frm_data[id]";
                $_SESSION["phoneS"] ="$frm_data[phone]";
                $_SESSION["addressS"] ="$frm_data[address]";
                $_SESSION["emailS"] ="$frm_data[email]";
                $_SESSION["dateS"] ="$frm_data[date]";
                $_SESSION["password"] ="$frm_data[pass]";
        //    echo "Session variables are set.";
                redirect('account.php');

                
            }
            else{
                echo '<script language="javascript">';
                echo 'alert("Error")';
                echo '</script>';
            }
            //  echo $frm_data['passf'];
    //$values = [$frm_data['passf'], $frm_data['idNf']];
      //echo"2";
    //$res = select($query, $values, "ss");
    
        }
    ?>


<?php require('inc/footer.php'); ?>


<script src="script/aos.js"></script>

<script src="script/script.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>