<?php
    require('inc/essentials.php');
    adminLogin();
  //  session_regenerate_id(true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!---->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styletest.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">
    <link rel="stylesheet" href="css/common.css">
    <link href="https://fonts.googleapis.com/css2?family=MonteCarlo&display=swap" rel="stylesheet">
    

    <title>Admin Panel-Setting</title>
  <!--  <?php require('inc/links.php'); ?> -->
</head>
<body class="bg-light">

    <?php require('inc/header.php');?>
<!--
<div class="container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between sticky-top">
    <h3 class="mb-0 h-font">HOTEL WEBSITE</h3>
    <a href="logout.php" class="btn btn-light btn-sm">LOG OUT</a>
</div>

<div class="col-lg-2 bg-dark border-top border-3 border-secondary" id="dashboard-menu" style=" position:fixed; height: 100%;">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid flex-lg-column align-items-stretch">
          <h4 class="mt-2 text-light" style="color: white;">ADMIN PANEL</h4>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="adminDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="adminDropdown">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a class="nav-link text-w" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-w" href="#">Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-w" href="#">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-w" href="#">Setting</a>
                </li>
            </ul>
          </div>
        </div>
      </nav>
</div>
-->


<div class="container-fluid" id ="main-content">
    <div class="row">
        <div class="col-lg-10 ml-auto p-4 overflow-hidden" style="color: black;">
            <h3 class="mb-4" style="color: black;">Settings</h3>
            <!-- General setting section -->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="card-title m-0" style="color: black;">General Settings</h5>
                      
                        <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#general-s">
                            <i class="bi bi-pencil-square"></i>Edit
                        </button>
                    
                    </div>
                  <h6 class="card-subtitle mb-1 fw-bold" style="color: black;">Site Title</h6>
                  <p class="card-text" id = "site_title"></p>
                  <h6 class="card-subtitle mb-1 fw-bold" style="color: black;">About us</h6>
                  <p class="card-text" id = "site_about"></p>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form>
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">General Setting</h5>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Site Title</label>
                                    <input type="text" name="site-title" id="site_title_inp" class="form-control shadow-none">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">About us</label>
                                    <textarea name="site_about" id="site_about_inp" class="form-control shadow-none" rows="6"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" onlick="site_title.value=general_data.site_title, site_about.value=general_data.site_about" class="btn btn-secondary shadow-none" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn custom-bg text-white shadow-none">Submit</button>
                            </div>
                        </div>
                    </form>
                
                </div>
            </div>

        </div>
    </div>
</div>

<script src="aos.js"></script>
<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script>
    let general_data;
    function get_general(){
        let site_title = document.getElementById('site_title');
        let site_about= document.getElementById('site_about');

        let site_title = document.getElementById('site_title_inp');
        let site_about= document.getElementById('site_about_inp');

        

        let xhr =  new XMLHttpRequest();
        xhr.open("POST","ajax/setting_crud.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
   
        xhr.onload = function(){
            general_data= JSON.parse(this.responseText);

            site_title.innerText = general_data.site_title;
            site_about.innerText = general_data.site_about;

            site_title_inp.value =  general_data.site_title;
            site_about_inp.value =  general_data.site_about;
        }
       
        xhr.send('get_general');
    }
    window.onload = function(){
        get_general();
    }
</script>


</body>
</html>