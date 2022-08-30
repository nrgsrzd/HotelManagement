<?php
    require('admin/inc/db_config.php');
    require('admin/inc/essentials.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/aos.css">
    <link href="https://fonts.googleapis.com/css2?family=MonteCarlo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css">


  
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">


    


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
</style>

<body class="bg-light">

<a class="link-primary" href="admin/search.php" style="color: rgb(153, 169, 238); font:50; margin-left: 135px; margin: top 54px;">Back</a>

<div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center" style="color: black;">Passengers</h2>
    <div class="h-line bg-dark">

    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 px-lg-0">
            <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
              <form method = "POST">
                <div class="container-fluid flex-lg-column align-items-stretch" >
                  <h4 class="mt-2" style="color: black;">Filters</h4>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                  
                      <div class="border bg-light p-3 rounded mb-3">
                        <input type="radio" id="Check" name="filter" value="check">
                        <h5 class="mb-3" style="font-size: 18px; color:black;">Check Availability</h5>
                        <label class="form-label" style="font-weight: 500; color: black;">Check-in</label>
                        <input type="date" id = "CheckIn" name = "CheckIn" class="form-control shadow-none"  value="<?php echo date('Y-m-d'); ?>" />
                        <label class="form-label">Check-out</label>
                        <input type="date" id = "CheckOut" name = "CheckOut" class="form-control shadow-none" value="<?php echo date('Y-m-d'); ?>" />

                       </div>

                  </div>
                  <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                    <div class="border bg-light p-3 rounded mb-3">
                        <input type="radio" id="reserve" name="filter" value="reserve">
                        <h5 class="mb-3" style="font-size: 18px; color:black;">Reserve ID</h5>
                        <input type="text" id="reserveID" name="reserveID">
                     </div>
                  </div>
                  <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                    <div class="border bg-light p-3 rounded mb-3">
                        <input type="radio" id="passenger" name="filter" value="passenger">
                        <h5 class="mb-3" style="font-size: 18px; color:black;">Passenger ID</h5>
                        <input type="text" id="passengerID" name="passengerID" pattern="[0-9]{10}">
                     </div>
                  </div>
                  <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                    <div class="border bg-light p-3 rounded mb-3">
                        <input type="radio" id="room" name="filter" value="room">
                        <h5 class="mb-3" style="font-size: 18px; color:black;">Room ID</h5>
                        <input type="text" id="RoomID" name="RoomID">
                     </div>
                  </div>
                
                  <button name="submitSearch" type="submit"  class="btn custom-bg text-white">
                    <i class="bi bi-filter-circle-fill"></i>
                </button>
                </form>
                </div>
              </nav>
        </div>
        <!--
 <th scope="col">Reserve ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">NID</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Email</th>
                                        <th scope="col"style="width:800px;">birthdate</th>
                                        <th scope="col" style="width:400px;">Start</th>
                                        <th scope="col"style="width:400px;">End</th>
                                        <th scope="col">Status</th>


  -->
        <div class="table-responsive-lg" style="height: 250px; width:75%;">
                            <table id="mytable" class="display"><!--footable  table table-hover border text-center">-->
                                <thead>
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Reserve Info</th>
                                        <th scope="col">Room Info</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">NID</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">More Info</th>
                                    </tr>
                                </thead>
                                <tbody id="room-data" >
                                <?php
                                $n=0;
              if(isset($_POST['submitSearch'])){

                if(!empty($_POST['filter'])) {

                } else {
                  echo 'Please select the value.';
                }

                $q = "SELECT `p_id`, reserve.status, passenger.name, `NID`, reserve.reserve_id, rooms.room_id, `phone`, `address`, `email`, `birthdate`, `start`, `end`, rooms.floor, rooms.adult, reserve.payment, `quality`  FROM passenger, reserve, roomreserve, rooms WHERE passenger.p_id = reserve.passenger_id  AND reserve.reserve_id = roomreserve.reserve_id AND rooms.room_id  = roomreserve.room_id";
                $res = selectV3($q, "i");

                $result = array();
                $co_passenger = array();
                
                if($_POST['filter']=='check'){
                  while($row = mysqli_fetch_assoc($res))
                    {
                     
                      $in = date('Y-m-d', strtotime($_POST['CheckIn']));
                      $out = date('Y-m-d', strtotime($_POST['CheckOut']));
                      $start = $row['start'];

                      $end = $row['end'];
  
                      if($in >= $start || $end<= $out)
                      {
                        array_push($result,$row);
                      }                     
                    }
                }
                else if($_POST['filter']=='reserve')
                {
                  
                  while($row = mysqli_fetch_assoc($res))
                    {

                    $reserve = $_POST['reserveID'];

                    if($row['reserve_id'] == $reserve)
                    { 
                      array_push($result,$row);                 
                    }
                  }
                }
                else if($_POST['filter']=='passenger')
                {
                  $p = $_POST['passengerID'];

                  while($row = mysqli_fetch_assoc($res))
                    {

                    if($row['NID'] == $p)
                    { 
                      array_push($result,$row);                 
                    }
                    else{
                   //   echo "1@@2";
                      //another passenger who does not rent a room
                    }
                  }
                  

                }
                else if($_POST['filter']=='room')
                {
                  $r = $_POST['RoomID'];
                  while($row = mysqli_fetch_assoc($res))
                    {

                    if($row['room_id'] == $r)
                    { 

                      array_push($result,$row);                 
                    }
                  }
                }

              if($_POST['filter']=='passenger')
              {
                  $p = $_POST['passengerID'];
      
                  $q = "SELECT p_id, passenger.name,`phone`, `address`, `email`, `birthdate`, `start`, `end`, reserve.status, reserve.reserve_id, roomreserve.room_id, rooms.floor, rooms.adult, reserve.payment, `quality` FROM passenger, reserve, roomreserve, rooms WHERE passenger.p_id=reserve.passenger_id AND reserve.reserve_id=roomreserve.reserve_id AND roomreserve.room_id=rooms.room_id AND passenger.NID='$p'";
                  //// `reserve_id`  FROM passenger, reserve WHERE `NID` = $p AND passenger_id =p_id";
                  
                  $res3 = selectV3($q, "i");
                  if($res3!==0){
                    $i=1;
                  while($row2 = mysqli_fetch_assoc($res3))
                    {
               //       array_push($result,$row2);  
               //       echo "&";  
               //     }
                    
               //     foreach($result as $row)
                //    {
                 //     echo("8");
                      $status="";
                      if($row2['status']==0){
                     
                        $status = "<button onclick='toggle_status($row2[reserve_id],1)' class='btn btn-warning btn-sm shadow-none'>check out</button>";
                      }
                      else{

                        $status = "Checked out";
                      }
                   ///   echo $row['phone'];
                 //     $info = "<button type='button' onclick=\"info(0,$row[phone],$row[address],$row[email],$row[birthdate])\" class='btn btn-info shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#info'>
                 //               <i class='bi bi-info-circle'></i>
                 //             </button>";

                    $data = "";
                  //    echo $row['reserve_id'];  <th scope="col">Reserve ID</th>

                               //         <th scope="col">Phone</th>
                                 //       <th scope="col">Address</th>
                                   //     <th scope="col">Email</th>
                                     //   <th scope="col"style="width:800px;">birthdate</th>
                                        //room-id

                //      $passenger_q = "SELECT `p_id`, `name`, `NID`, `phone`, `address`, `email`, `birthdate` FROM passenger, checkinout WHERE p_id = passenger_no AND reserve_no = '$row[reserve_id]'";

//                      $res1 = selectV3($passenger_q, "i");

                 //     $co_passenger = array();
                   //   echo $row['email'];
                    $em="'".$row2['email']."'";
                    
                    $add = "'".$row2['address']."'";
                    $phone = "'".$row2['phone']."'";
                    $birth ="'".$row2['birthdate']."'";

                    $start = "'".$row2['start']."'";
                    $end = "'".$row2['end']."'";
                //    echo $p;
              //      echo $row['payment'];
                //    $pa="2300000";
                    $pa = "'".$row2['payment']."'";

                    $adult = "'".$row2['adult']."'";
                                              $floor = "'".$row2['floor']."'";
                                   //           $price = "'".$row2['price']."'";
                                $qq = "'".$row2['quality']."'";

                      $data.="
                      <tr class = 'align-middle'>
                          <td>$i</td>
                          <td>
                          <button type='button' onclick=\"infoRe($start, $end, $pa)\" class='btn btn-info shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#infoRe'>
                          $row2[reserve_id]
                          </button>
                      </td>
                      <td>
                          <button type='button' onclick=\"infoRo($adult, $floor, $qq)\" class='btn btn-info shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#infoRo'>
                          $row2[room_id]
                          </button>
                      </td>
                          <td>$row2[name]</td>
                          <td>$p</td>
                          <td>$status</td>
                          <td>
                            <button type='button' onclick=\"info($phone,$add,$em,$birth)\" class='btn btn-info shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#info'>
                              <i class='bi bi-info-circle'></i>
                            </button>
                          </td>      
                      </tr>
                      ";
                        $i++;
                   
                    $j =0;
                    echo $data;
////,$row[phone],$row[address],$row[email],$row[birthdate]
                  }
                }
                else{
                  echo "NO Result";
                }
              }
              else{
           //     echo "$$%$%";
                $j=1;
                 foreach($result as $row)
                    {

                //      echo "***".$j."***";
                      $n=sizeof($result);
                      $status="";

                      if($row['status']==0){
                        $status = "<button onclick='toggle_status($row[reserve_id],1)' class='btn btn-warning btn-sm shadow-none'>check out</button>";
                      }
                      else{

                        $status = "Checked out";
                      }
                      


                   //   echo $row['p_id'];
                      $data = "";
                  //    echo $row['reserve_id'];

                      $passenger_q = "SELECT `p_id`, `name`, `NID`, `phone`, `address`, `email`, `birthdate`, roomreserve.room_id FROM passenger, checkinout, roomreserve WHERE p_id = passenger_no AND reserve_no = '$row[reserve_id]' AND roomreserve.reserve_id='$row[reserve_id]'";

                      $res1 = selectV3($passenger_q, "i");

                 //     $co_passenger = array();
                      $em="'".$row['email']."'";
                          
                      $add = "'".$row['address']."'";
                      $phone = "'".$row['phone']."'";
                      $birth ="'".$row['birthdate']."'";
                      
                    $start = "'".$row['start']."'";
                    $end = "'".$row['end']."'";
                 //   echo $p;
              //      echo $row['payment'];
                //    $pa="2300000";
                    $pa = "'".$row['payment']."'";

                    $adult = "'".$row['adult']."'";
                                              $floor = "'".$row['floor']."'";
                                   //           $price = "'".$row2['price']."'";
                                   $qq = "'".$row['quality']."'";

                      $data.="
                      <tr class = 'align-middle'>
                          <td>$j</td>
                          <td>
                          <button type='button' onclick=\"infoRe($start, $end, $pa)\" class='btn btn-info shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#infoRe'>
                          $row[reserve_id]
                          </button>
                      </td>
                      <td>
                          <button type='button' onclick=\"infoRo($adult, $floor, $qq)\" class='btn btn-info shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#infoRo'>
                          $row[room_id]
                          </button>
                      </td>
                          <td>$row[name]</td>
                          <td>$row[NID]</td>
                          <td>$status</td>
                          <td>
                            <button type='button' onclick=\"info($phone,$add,$em,$birth)\" class='btn btn-info shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#info'>
                              <i class='bi bi-info-circle'></i>
                            </button>
                          </td>
                      </tr>
                      ";
                      //  $i++;
                   
                    
                    $k=1;
               //     echo "**";
                    echo $data;
             //       echo "**!";
                    $data1 = "";
               //     echo sizeof($res1);
               if (!empty($res1)) {
                    while($row1 = mysqli_fetch_assoc($res1))
                    {
                //      echo $k;

                      $em="'".$row1['email']."'";
                          
                      $add = "'".$row1['address']."'";
                      $phone = "'".$row1['phone']."'";
                      $birth ="'".$row1['birthdate']."'";

            //          echo"\n";
           //           echo $j;
                      $data1.="
                      <tr class = 'align-middle'>
                          <td>$j.$k</td>
                          <td></td>
                          <td></td>
                          <td>$row1[name]</td>
                          <td>$row1[NID]</td>
                          <td></td>
                          <td>
                            <button type='button' onclick=\"info($phone,$add,$em,$birth)\" class='btn btn-info shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#info'>
                              <i class='bi bi-info-circle'></i>
                            </button>
                          </td>
                      </tr>
                      ";
                      $k++;
             //         echo"\n";
               //       echo $j;
                    }
                  
                    echo $data1;
                    
                  }
                  $j++;
                   }
                  }
                  }
                  


                  

            ?>
                                </tbody>
                            </table>
        </div>
        <div id = "result" class="col-lg-9 col-md-12 px-4">
            

        </div>

        
        
    </div>
</div>

<div class="modal fade" id="info" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" style="color: black;">Room Name</h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="table-responsive-lg" style="height: 350px; overflow-y:scroll;">
              <table class="table table-hover border text-center">
                  <thead>
                      <tr class="bg-dark text-light sticky-top">
                        <th scope="col">phone</th>
                        <th scope="col">address</th>
                        <th scope="col">email</th>
                        <th scope="col">Birth Date</th>
                      </tr>
                  </thead>
                  <tbody id="room-info-data">
                  </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="infoRo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" style="color: black;">Room Name</h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="table-responsive-lg" style="height: 350px; overflow-y:scroll;">
              <table class="table table-hover border text-center">
                  <thead>
                      <tr class="bg-dark text-light sticky-top">
                        <th scope="col">floor</th>
                        <th scope="col">number of passenger</th>
                        <th scope="col">Type</th>
                      </tr>
                  </thead>
                  <tbody id="room-info-dataRo">
                  </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  
  <div class="modal fade" id="infoRe" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" style="color: black;">Reserve Info</h5>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="table-responsive-lg" style="height: 350px; overflow-y:scroll;">
              <table class="table table-hover border text-center">
                  <thead>
                      <tr class="bg-dark text-light sticky-top">
                        <th scope="col">Checkin Date</th>
                        <th scope="col">Checkout Date</th>
                        <th scope="col">Payment</th>
                      </tr>
                  </thead>
                  <tbody id="room-info-dataRe">
                  </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
  </div>


<script>


function infoRe(start, end,p){
        console.log("%%@@");
     //   console.log(t.value);
      
  //   document.querySelector("#info .modal-title").innerText = Reserveid;
      //  console.log(name);
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/search_ajax.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


        xhr.onload = function(){
          console.log(this.responseText)
            if(this.responseText!=0){
            document.getElementById('room-info-dataRe').innerHTML = this.responseText;
            }
            else{
                document.getElementById('room-info-dataRe').innerHTML = "NO Data!";
            }
        }

        xhr.send('infoRe='+start+'&end='+end+'&p='+p);
        
    }
    function infoRo(adult, floor,q){
        console.log("%%@@");
     //   console.log(t.value);
      
  //   document.querySelector("#info .modal-title").innerText = Reserveid;
     //   console.log(name);
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/search_ajax.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


        xhr.onload = function(){
          console.log(this.responseText)
            if(this.responseText!=0){
            document.getElementById('room-info-dataRo').innerHTML = this.responseText;
            }
            else{
                document.getElementById('room-info-dataRo').innerHTML = "NO Data!";
            }
        }

        xhr.send('infoRo='+adult+'&floor='+floor+'&q='+q);
        
    }


    function toggle_status(id, val)
    {
        console.log("%%%%%");
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/search_ajax.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


        xhr.onload = function(){
      //    let  x=this.responseText; 
          console.log(this.responseText);
            if(this.responseText==1){
              //  console.log("#%$#$%#$%");

            alert("Checked out was Successful");
            setTimeout("location.reload(true);");
               
            }
            else{
             //   console.log("24234234234%#$%");

            alert("Error");

            }
        }

        xhr.send('toggle_status='+id+'&value='+val);
    }

    function info(phone, address, email, date){
        console.log("%%@@");
     //   console.log(t.value);
      
  //   document.querySelector("#info .modal-title").innerText = Reserveid;
        console.log("$$4");
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/search_ajax.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


        xhr.onload = function(){
          console.log(this.responseText)
            if(this.responseText!=0){
            document.getElementById('room-info-data').innerHTML = this.responseText;
            }
            else{
                document.getElementById('room-info-data').innerHTML = "NO Data!";
            }
        }

        xhr.send('info='+phone+'&address='+address+'&email='+email+'&date='+date);
        
    }

  </script>


<br><br><br>
<br><br><br>
<!-- footer start -->

<!-- footer end -->

<?php require('inc/footer.php'); ?>


<script src="script/aos.js"></script>

<script src="script/script.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>













<script type="text/javascript" scr="https://code.jquery.com/jquery-1.12.3.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js" defer></script>

<script type="text/javascript">
$(document).ready( function () {
    $("#mytable").DataTable();
});

</script>

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
