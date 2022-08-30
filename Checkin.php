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
<a class="link-primary" href="admin/dashboard.php" style="color: rgb(153, 169, 238); font:50; margin-left: 135px;  margin-button:230px;">Back</a>

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
            <h5 class="mb-4" style="color: black;">Check in</h5>
            <form method="POST"><!-- id="reserve-form"> -->
                <div class="row align-items-end">
                    <div class="col-lg-2 mb-3">
                        <label class="form-label" style="font-weight: 500; color: black;">NID</label>
                        <input type="text" name="ida" id="ida" class="form-control shadow-none" pattern="[0-9]{10}">
                    </div>
                    <div class="col-lg-3 mb-3">
                        <label class="form-label" style="font-weight: 500; color: black;">Check-in</label>
                        <input type="date" name ="InDate" id="InDate" class="form-control shadow-none" value="<?php echo date('Y-m-d'); ?>" />
                    </div>
                    <div class="col-lg-3 mb-3">
                        <label class="form-label" style="font-weight: 500; color: black;">Check-out</label>
                        <input type="date" name ="OutDate" id="OutDate" class="form-control shadow-none" value="<?php echo date('Y-m-d'); ?>" />
                       
                    </div>
                    <div class="col-lg-2 mb-3">
                        <label class="form-label" style="font-weight: 500; color: black;">NO Passenger</label>
                        <input type="number" name="np" id="np" min="1" max="6" class="form-control shadow-none">
                    </div>
                    <div class="col-lg-2 mb-3">
                        <label class="form-label" style="font-weight: 500; color: black;">Type of room</label>
                        <select name = "roomType" id="roomType" class="form-control shadow-none">
                           
                            <?php 
                                $q = "SELECT `title` FROM `roomtype` WHERE 1";
                                $res = selectV3($q, "i");
                                $mm=0;
                                while($row = mysqli_fetch_assoc($res))
                                {
                                    ?>
                                    <option value="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></option>
                                    <?php
                                    $mm++;
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-1 mb-lg-3 mt-2">
                            <button name="submitReserve" type="submit"  class="btn custom-bg text-white">
                                <i class="bi bi-check-square-fill"></i>
                            </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Rooms -->
<h2 class="mt-5 mb-4 text-center fw-bold h-font" style="color: black;">Available</h2>
<tbody id="availabale_room ">

<?php
  if(isset($_POST['submitReserve'])){

    $frm_data = filteration($_POST);

    $pId = $frm_data['ida'];
    $money = 0;
    $a=array();
    $q = "SELECT `title` FROM `roomtype` WHERE 1";
    $res = selectV3($q, "i");

    while($row = mysqli_fetch_assoc($res))
    {
        array_push($a, $row["title"]);
    }

 //   if($frm_data['roomType']=='all'){
        
        /*
        for($i =0 ;$i<$mm;$i++){
            $frm_data['roomType']=$a[$i];
   
            $q = "SELECT `name` FROM `roomtype`, `features` WHERE `title`='$frm_data[roomType]' AND roomtype.roomType_id=features.roomtype";
            $res = selectV3($q, "i");

            $feat = array();
            $f=0;
            while($row = mysqli_fetch_assoc($res))
            {
                array_push($feat, $row["name"]);
                $f++;
            }
            $featureecho = "";
            foreach($feat as $value){
                $featureecho.="<span class='badge rounded-pill bg-light text-dark text-wrap'>
                $value
                </span>";
            }

            $q = "SELECT `price` FROM `roomtype` WHERE `title`='$frm_data[roomType]'";
            $res = selectV($q);
            $money = intval($res);
 
            $qroom = "SELECT `room_id`, `area`, `price`, `floor`, `img`, `adult` FROM `rooms` WHERE `status`=0 AND `available`=1 AND `quality`='$frm_data[roomType]'";
            $res = selectV3($qroom,'i');

            $_SESSION["indate"] = $frm_data['InDate'];

            if($res=="0"){
                echo "There is no Room Avialable!";
            }
            else{
                while($row = mysqli_fetch_assoc($res))
                {
                    $n = $frm_data['np'];

                    $price = $money * $n;
                    $r = (int)$row['adult']*50000;
                    $price = $price + $r;
                    $price = $price + (int)$row['price'];
                    $data="";
                    $r = "'".$pId."'";

                    $in = "'".$frm_data['InDate']."'";
                    $out = "'".$frm_data['OutDate']."'";

                    $status = "<button onclick=\"toggle_status($row[room_id],1,$r,$in,$out,$price,$frm_data[np])\" class='btn btn-dark btn-sm shadow-none'>Reserve Now</button>";
                    $data.="<div class='card mb-4 border-0 shadow' style='width:930px; margin-left:300px; position: relative; '>
                                <div class='row g-0 p-3 align-items-center' style='position: relative;'>
                                    <div class='col-md-5 mb-lg-0 mb-md-0 mb-3'>
                                        <img src='images1/rooms/$row[img]' class='img-fluid rounded' alt='...'>
                                    </div>
                                    <div class='col-md-5 px-lg-3 px-md-3 px-0'>
                                        <h5 class='mb-3' style='color: black;'>$row[room_id]</h5>
                                        <h6 class='mb-3' style='color: black;'>$row[area]</h6>
                                        <div class='features mb-3' style='color:black;'>ّFeatures:
                                            $featureecho
                                        </div>
                                        <div class='features mb-3' style='color:black;'>ّFloor:
                                            <span class='badge rounded-pill bg-light text-dark text-wrap'>
                                                $row[floor]
                                            </span>
                                        </div>
                                        <div class='features mb-3' style='color:black;'>ّCapacity:
                                            <span class='badge rounded-pill bg-light text-dark text-wrap'>
                                                $row[adult]
                                            </span>
                                        </div>
                                    </div>
                                    <div class='col-md-2 mt-lg-0 mt-md-0 text-center'>
                                        <h6 class='mb-4' style='color: black;'>$$price per night</h6>
                                            $status
                                    </div>
                                </div>
                            </div>";

                    echo $data;
                }
            }
            $reserve_id ="";
        }
        */
//    }
//    else{

        $q = "SELECT `name`, `price` FROM `roomtype`, `features` WHERE `title`='$frm_data[roomType]' AND roomtype.roomType_id=features.roomtype";
        $res = selectV3($q, "i");

        $feat = array();
        $f=0;
        
        while($row = mysqli_fetch_assoc($res))
        {
            $money = $row['price'];
            array_push($feat, $row["name"]);
            $f++;
        }

        $featureecho = "";
        foreach($feat as $value){
            $featureecho.="<span class='badge rounded-pill bg-light text-dark text-wrap'>
                $value
            </span>";
        }
        $sql = "SELECT * FROM `passenger` WHERE `NID`='$pId'";
//echo "^^^^";
        $ressql = selectV3($sql,"i");
        if(empty($ressql)){
         //   echo "Type1";
            $qroom = "SELECT `room_id`, `area`, `price`, `floor`, `img`,`adult` FROM `rooms` WHERE `status`=0 AND `available`=1 AND `quality`='$frm_data[roomType]'";
            $res = selectV3($qroom,'i');

            if($res=="0"){
                echo "There is no Room Avialable!";
            }
            else{
                while($row = mysqli_fetch_assoc($res))
                {
                    $n = $frm_data['np'];
                    $nn = $n * 100000;
                    $price = $money + $nn;
                    $r = (int)$row['adult']*50000;
                    $price = $price + $r;
                    $price = $price + (int)$row['price'];

                    $data="";
         
                    $r = "'".$pId."'";

                    $start = "'".$frm_data['InDate']."'";
                    $end = "'".$frm_data['OutDate']."'";


                    $status = "<button onclick=\"toggle_status1($row[room_id],1,$r,$start,$end,$price,$frm_data[np])\" class='btn btn-dark btn-sm shadow-none'>Reserve Now</button>";
                    $data.="<div class='card mb-4 border-0 shadow' style='width:930px; margin-left:300px; position: relative;'>
                                <div class='row g-0 p-3 align-items-center' style='position: relative;'>
                                    <div class='col-md-5 mb-lg-0 mb-md-0 mb-3'>
                                        <img src='images1/rooms/$row[img]' class='img-fluid rounded' alt='...'>
                                    </div>
                                    <div class='col-md-5 px-lg-3 px-md-3 px-0'>
                                        <h5 class='mb-3' style='color: black;'>$row[room_id]</h5>
                                        <h6 class='mb-3' style='color: black;'>$row[area]</h6>
                                        <div class='features mb-3' style='color:black;'>ّFeatures:
                                            $featureecho
                                        </div>
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
                                            $status
                                    </div>
                                </div>
                            </div>
                                ";
                    echo $data;
                }

            }

            $reserve_id ="";
        }
        else{
        //    echo "Type2";
            $qroom = "SELECT `room_id`, `area`, `price`, `floor`, `img`,`adult` FROM `rooms` WHERE `status`=0 AND `available`=1 AND `quality`='$frm_data[roomType]'";
            $res = selectV3($qroom,'i');

            if($res=="0"){
                echo "There is no Room Avialable!";
            }
            else{
                while($row = mysqli_fetch_assoc($res))
                {

                    $data="";

                    $r = "'".$pId."'";
                    $in = "'".$frm_data['InDate']."'";
                    $out = "'".$frm_data['OutDate']."'";

                    $n = $frm_data['np'];
                    $nn = $n * 100000;
                    $price = $money + $nn;
                    $r = (int)$row['adult']*50000;
                    $price = $price + $r;
                    $price = $price + (int)$row['price'];

                    $status = "<button onclick=\"toggle_status($row[room_id],1,$r,$in,$out,$price,$frm_data[np])\" class='btn btn-dark btn-sm shadow-none'>Reserve Now</button>";
                
                    $data.="<div class='card mb-4 border-0 shadow' style='width:930px; margin-left:300px; position: relative;'>
                                <div class='row g-0 p-3 align-items-center' style='position: relative;'>
                                    <div class='col-md-5 mb-lg-0 mb-md-0 mb-3'>
                                        <img src='images1/rooms/$row[img]' class='img-fluid rounded' alt='...'>
                                    </div>
                                    <div class='col-md-5 px-lg-3 px-md-3 px-0'>
                                        <h5 class='mb-3' style='color: black;'>$row[room_id]</h5>
                                        <h6 class='mb-3' style='color: black;'>$row[area]</h6>
                                        <div class='features mb-3' style='color:black;'>ّFeatures:
                                            $featureecho
                                        </div>
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
                                        <h6 class='mb-4' style='color: black;'>$price$ per night</h6>
                                            $status
                                    </div>
                                </div>
                            </div>";

                    echo $data;
                }

            }
            $reserve_id ="";
        }
 //   }
  }

?>
             
</tbody>

<div class="modal fade" id="add-passenger" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">  
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method = "POST"><!--id="add_info_form">-->
                    <div class="row">
            
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Name</label>
                            <input type="text" name="name" class="form-control shadow-none" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">NID</label>
                            <input type="text" name="NID" class="form-control shadow-none" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Phone</label>
                            <input type="text" name="phone" class="form-control shadow-none" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Address</label>
                            <input type="text" name="address" class="form-control shadow-none" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">birthdate</label>
                            <input type="date" name="birth" class="form-control shadow-none" required>
                        </div>
                        <button name="Infosubmit" type="submit"  class="btn custom-bg text-white">Add</button>               
                    </div>
                </form>
          
            </div>
        </div>
    </div>
  </div>
</div>

<?php
  if(isset($_POST['Infosubmit']))
  {

    $frm_data = filteration($_POST);
    $pId = $frm_data['ida'];

    $q = "INSERT INTO `passenger`(`name`, `NID`, `phone`, `address`, `birthdate`) VALUES ('$frm_data[name]', '$frm_data[NID]', '$frm_data[phone]','$frm_data[address]', '$frm_data[birth]')";
    if(insertV2($q,'siiiiis')){
        $flag=1;
        $passenger_id = mysqli_insert_id($con);
        $qpa = "SELECT `p_id` FROM `passenger` WHERE `NID`='$pId'";
        $passenger_id2 = selectp_id($qpa, "i");
        $qp = "SELECT `reserve_id` FROM `reserve` WHERE `passenger_id`='$passenger_id2' AND `status`=0";
        $reserve_id = selectPassenger($qp);

        $qc = "INSERT INTO `checkinout`(`reserve_no`, `passenger_no`) VALUES ('$reserve_id','$passenger_id')";

        if(insertV2($qc,'siiiiis')){
            alert('success', 'New Passenger added!');
        }
    }
    else{
        alert('error', 'Server Down!');
    }    
  }

?>

<script>
    function toggle_status1(id, val, pid, idate, odate, price,n)
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/checkin_ajax.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function(){
            if(this.responseText!=0){
                let x = this.responseText;
                window.location = "passengerReserveAdmin.php";
            }
            else{
                alert('error', 'Server Down');
            }
        }
        xhr.send('toggle_status1='+id+'&value='+val+'&pid='+pid+'&idate='+idate+'&odate='+odate+'&price='+price+'&n='+n);
    }

    function toggle_status(id, val, pid, idate, odate, price,n)
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/checkin_ajax.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function(){
          
            if(this.responseText!=0){
                let x = this.responseText;

                sessionStorage.setItem("x", x);
                sessionStorage.setItem("n", <?php echo $frm_data['np']?>);

                window.location = "passengerReserveAdminOldPassenger.php";
            }
            else{
                alert('error', 'Server Down');
            }      
        }
        xhr.send('toggle_status='+id+'&value='+val+'&pid='+pid+'&idate='+idate+'&odate='+odate+'&price='+price+'&n='+n);
    }
</script>

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