<?php
    require('admin/inc/db_config.php');
    require('admin/inc/essentials.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">
   <!-- <link rel="stylesheet" href="C:/xampp/htdocs/PHP Project/V15/css/style.css">
    <link rel="stylesheet" href="C:/xampp/htdocs/PHP Project/V15/css/common.css">



    
        
    <link rel="stylesheet" href="C:/xampp/htdocs/PHP Project/V15/css/styletest.css">
    
    <link rel="stylesheet" href="C:/xampp/htdocs/PHP Project/V15/style.css">
  
    <link rel="stylesheet" href="C:/xampp/htdocs/PHP Project/V15/aos.css">

    -->
    <link href="https://fonts.googleapis.com/css2?family=MonteCarlo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css">
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

<body class="bg-light">

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
                </form>
                <button type="button" class="nav-toggler .active">
                    <span></span>
                </button>
                <nav class="nav .open">
                    <ul>
                        <li class="nav-item"><a href="Home.php">Home</a></li>
                        <li class="nav-item"><a href="account.php">Account</a></li>
                        <li class="nav-item"><a href="#about">About us</a></li>
                        <li class="nav-item"><a href="#footer">Contact</a></li>
                        <li class="nav-item"><a href="#">Logout</a></li>
                        <li class="nav-item"><a href="FoodMenu.html">Food Menu</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

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