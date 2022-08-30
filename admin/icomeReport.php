<?php
    require('inc/essentials.php');
    require('inc/db_config.php');
    adminLogin();
  //  session_regenerate_id(true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=MonteCarlo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styletest.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">
    <link rel="stylesheet" href="css/common.css">
    <link href="https://fonts.googleapis.com/css2?family=MonteCarlo&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">

    <title>Admin Panel-Room</title>
  
</head>

<body class="bg-light">

    <?php require('inc/header.php');?>

        

    <div class="container-fluid" id ="main-content">
        <div class="row">
            <div class="col-lg-10 ml-auto p-4 overflow-hidden" style="color: black;">
                <h3 class="mb-4" style="color: black;">Report</h3>
               <!--  General setting section -->
                <div class="card">
                    <div class="card-body">

                        <form method="POST">
                            <div class="col-lg-3 mb-3">
                                <label class="form-label" style="font-weight: 500; color: black;">Check-in</label>
                                <input type="date" name ="InDate" id="InDate" class="form-control shadow-none">
                            </div>
                            <div class="col-lg-3 mb-3">
                                <label class="form-label" style="font-weight: 500; color: black;">Check-out</label>
                                <input type="date" name ="OutDate" id="OutDate" class="form-control shadow-none">
                                <!-- value="<?php //echo date('Y-m-d'); ?>" -->
                               
                            </div>
                            <button type="submit" name="result" class="btn btn-dark shadow-none btn-sm">
                                <i class="bi bi-coin">Result</i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid" id ="main-content">
        <div class="row">
            <div class="col-lg-10 ml-auto p-4 overflow-hidden" style="color: black;">
                <h3 class="mb-4" style="color: black;">Result</h3>
                <!-- Floors -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="table-responsive-lg" style="height: 450px; overflow-y:scroll;">
                            <table id="mytable" class="display"><!--footable  table table-hover border text-center">-->
                                <thead>
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Reserve Info</th>
                                        <th scope="col">Room Info</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">passenger info</th>
                                    </tr>
                                </thead>
                                <tbody id="room-data">
                                    <?php
                                          if(isset($_POST['result'])){
                                             // echo "90";
                                          //   $time = strtotime($_POST['InDate']);
                                            //   echo $time;
                                            $frm_data = filteration($_POST);
                                      //      echo $frm_data['InDate'];
                                       //     echo $frm_data['OutDate'];

                                            $q = "SELECT reserve.reserve_id, `payment`, roomreserve.room_id, `quality`, passenger.name, NID, phone, reserve.start, reserve.end, rooms.adult, rooms.floor, rooms.price FROM reserve, roomreserve, rooms, passenger WHERE p_id = passenger_id  AND rooms.room_id=roomreserve.room_id AND reserve.reserve_id = roomreserve.reserve_id AND reserve.start>= '$frm_data[InDate]' AND reserve.end<='$frm_data[OutDate]'";
                                            $res = selectV3($q, "i");
                                            $data="";
                                            $i=1;
                                            $total=0;
                                            $tm= 0;
                                            if($res!==0){
                                                while($row = mysqli_fetch_assoc($res)){
                                                /*   $type = "";
                                                    if($row['quality']==1){
                                                        $type = "Normal";
                                                        $tm=1500000;
                                                    }
                                                    else if($row['quality']==2){
                                                        $type = "Royal";
                                                        $tm=300000;
                                                    }
                                                    else{
                                                        $type = "VIP";
                                                        $tm = 600000;
                                                    }*/
                                                    $p = (int) $row['payment'];
                                                    $total = $total + (int)$p;

                                              //      $total = $total + $tm;

                                                    $name="'".$row['name']."'";
                    
                                                    $NID = "'".$row['NID']."'";
                                                    $phone = "'".$row['phone']."'";
                                              //      $birth ="'".$row['birthdate']."'";

                                              $start = "'".$row['start']."'";
                                              $end = "'".$row['end']."'";

                                              $adult = "'".$row['adult']."'";
                                              $floor = "'".$row['floor']."'";
                                              $price = "'".$row['price']."'";

                                                $data.="
                                                <tr class = 'align-middle'>
                                                    <td>$i</td>
                                                    <td>
                                                        <button type='button' onclick=\"infoRe($start, $end)\" class='btn btn-info shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#infoRe'>
                                                        $row[reserve_id]
                                                        </button>
                                                    </td>
                                                    <td>
                                                        <button type='button' onclick=\"infoRo($adult, $floor, $price)\" class='btn btn-info shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#infoRo'>
                                                        $row[room_id]
                                                        </button>
                                                    </td>
                                                    <td>$row[payment]</td>    
                                                    <td>
                                                        <button type='button' onclick=\"info($name, $NID,$phone)\" class='btn btn-info shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#info'>
                                                            <i class='bi bi-info-circle'></i>
                                                        </button>
                                                    </td>                                                   
                                                </tr>
                                                ";
                                                //  $i++;
                                            
                                                $i =0;
                                                
                                                }
                                                echo "<h4 style='color: black;'>Total income: ";
                                                echo $total;
                                                echo "</h4>";
                                                echo $data;
                                            }
                                            else{
                                                echo "NO Reserve we had!";
                                            }
                                          }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
                        <th scope="col">name</th>
                        <th scope="col">NID</th>
                        <th scope="col">phone</th>
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

  <div class="modal fade" id="infoRe" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
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
                        <th scope="col">Checkin Date</th>
                        <th scope="col">Checkout Date</th>
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
                        <th scope="col">price</th>
                        <th scope="col">number of passenger</th>
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



<script>

function infoRe(start, end){
        console.log("%%@@");
     //   console.log(t.value);
      
  //   document.querySelector("#info .modal-title").innerText = Reserveid;
      //  console.log(name);
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/income.php", true);
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

        xhr.send('infoRe='+start+'&end='+end);
        
    }
    function infoRo(adult, floor, price){
        console.log("%%@@");
     //   console.log(t.value);
      
  //   document.querySelector("#info .modal-title").innerText = Reserveid;
     //   console.log(name);
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/income.php", true);
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

        xhr.send('infoRo='+adult+'&floor='+floor+'&price='+price);
        
    }





    function info(name, id, phone){
        console.log("%%@@");
     //   console.log(t.value);
      
  //   document.querySelector("#info .modal-title").innerText = Reserveid;
        console.log(name);
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/income.php", true);
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

        xhr.send('info='+name+'&id='+id+'&phone='+phone);
        
    }


</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



<script type="text/javascript" scr="https://code.jquery.com/jquery-1.12.3.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#mytable").DataTable();
        });


        </script>

</body>
</html>