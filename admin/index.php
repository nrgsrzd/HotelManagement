<?php
    require('inc/essentials.php');
    require('inc/db_config.php');

    session_start();
   
 //   if((isset($_SESSION['adminLogin'])&& $_SESSION['adminLogin']==true)){
  //      redirect('dashboard.php');
  //  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">
    <link rel="stylesheet" href="css/common.css">
    <link href="https://fonts.googleapis.com/css2?family=MonteCarlo&display=swap" rel="stylesheet">
    
    <title>Welcome</title>
    <?php require('inc/links.php');?>
</head>
<style>
    div.login-form{
        position: absolute;
        top: 50%;
        left:50%;
        transform: translate(-50%, -50%);
        width: 400px;
    }
</style>
<body class="bg-light">
    <div class="login-form text-center rounded bg-white shadow overflow-hidden">
        <form method="POST">
            <h4 class="bg-dark text-white py-3">ADMIN LOGIN PANEL</h4>
            <div class="p-4">
                <div class="mb-3">
                    <input name="admin_name" required type="text" class="form-control shadow-none text-center" placeholder="Admin Name">
                </div>
                <div class="mb-4">
                    <input name="admin_pass" required type="password" class="form-control shadow-none text-center" placeholder="Password">  
                </div>
                <button name="login" type="submit" class="btn text-white custom-bg shadow-none">LOGIN</button>
            </div>
        </form>
    </div>



    <?php
        if(isset($_POST['login'])){
            $frm_data = filteration($_POST);
          //  echo"<h1>$frm_data[admin_name]</h1>";
           // echo"<h1>$frm_data[admin_pass]</h1>";
          //  print_r($_POST);
          $query = "SELECT * FROM `admin_cred1` WHERE `admin_name`=? AND `admin_pass`=?";
        //  echo"1";
          $values = [$frm_data['admin_name'], $frm_data['admin_pass']];
        //  echo"2";
          $res = select($query, $values, "ss");
      //    echo"3 ";
          if($res->num_rows==1){
              $row =  mysqli_fetch_assoc($res);
          //    session_start();
              $_SESSION['adminLogin']=true;
       //       $_SESSION['adminId']=$row['sr_no'];
              redirect('dashboard.php');
          }
          else{
        //      echo"4";
              alert('error','Login failed - Invalid Credentials!');
          }
        }
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>