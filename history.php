<?php

$result = array();
//include_once('admin/inc/db_config.php'); 
session_start();
include_once('inc/db_configV2.php'); 
$result=swriteMsg(); 
//echo "Size: ";
//echo sizeof($result);  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>History</title>
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

<header class="header">
        <div class="container">
            <div class="row justify-content-between">
                <form class="form-inline my-2 my-lg-0">
                <a class="link-primary" href="account.php?Id=<?= $_GET['Id']?>" style="color: rgb(153, 169, 238); font:50; margin-left: 35px;">Back</a>

                </form>
                <button type="button" class="nav-toggler .active">
                    <span></span>
                </button>
                <nav class="nav .open">
                    <ul>
                        <li class="nav-item"><a href="#about">About us</a></li>
                        <li class="nav-item"><a href="#footer">Contact</a></li>
                        <li class="nav-item"><a href="index.php">Logout</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

<div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center" style="color: black;">History</h2>
    <div class="h-line bg-dark">

    </div>
</div>
<div class="container">
    <div class="row">
        
        <div class="table-responsive-lg" style="height: 750px; width:100%;"> <!-- overflow-y:scroll; ">-->
                            <table id="mytable" class="display"><!--footable  table table-hover border text-center">-->
                                <thead>
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Reserve ID</th>
                                        <th scope="col">Room ID</th>
                                        <th scope="col">Room Type</th>
                                        <th scope="col">Payment</th>
                                        <th scope="col" style="width:100px;">Check in</th>
                                        <th scope="col"style="width:100px;">Check out</th>
                                    </tr>
                                </thead>
                                <tbody id="room-data">
                                <?php

                                if(sizeof($result)==0){
                                    echo "NO History!";
                                }
                                $n=sizeof($result);
                        //        echo "@#$@#$@$#";
                           //     $result2 = array();
                      //     echo ;
                           $pId = $_GET['Id'];
                           $i=1;
                           $data = "";
                                foreach($result as $row)
                                    {
                                   //   echo "#$";
                                      
                                          $data.="
                                            <tr class = 'align-middle'>
                                              <td>$i</td>
                                              <td>$row[reserve_id]</td>
                                              <td>$row[room_id]</td>
                                              <td>$row[quality]</td>
                                              <td>$row[payment]</td>
                                              <td>$row[start]</td>
                                              <td>$row[end]</td>
                                            </tr>
                                          ";
                                          $i++;
                                         
                                          
                                        

                                    }
                                    echo $data;
                            //    echo "!!!";
                             //   array_push($result,$row);
                                    function swriteMsg() {
                                    //  echo $result;
                             //         $flag = true;
                                      $result = array();
                                 //     echo "!!!!!!";
                                      $pId = $_GET['Id'];
                                   //   $data = "";
                                 //     echo $pId;
                                      $q = "SELECT  reserve.reserve_id, rooms.room_id, `start`, `end`, `quality`, `payment`  FROM passenger, reserve, roomreserve, rooms WHERE NID ='$pId' AND reserve.passenger_id=passenger.p_id AND reserve.reserve_id = roomreserve.reserve_id AND rooms.room_id  = roomreserve.room_id";
                                      
                                      $res = selectVHistory($q, "i");
                                      
                                      if(empty($res)){
                                    //    echo "####";
                                          //find of check in check out
                                      }
                                      else{
                                    //    echo "&&&";
                                        while($row = mysqli_fetch_assoc($res))
                                        {
                                  //        $n= sizeof($result);
                                      //   echo $row['reserve_id'];
                                          array_push($result,$row);
                                        }
                                 //       foreach($result as $row)
                                 //       {
                                 //         $data = "";
                                 //             $data.="
                                //                <tr class = 'align-middle'>
                                ////                  <td></td>
                                 //                 <td>$pId</td>
                                ////                  <td>$row[reserve_id]</td>
                                //                  <td>$row[room_id]</td>
                                //                  <td>$row[start]</td>
                                //                  <td>$row[end]</td>
                                //                </tr>
                                //              ";
                                //              echo $data;
                                 //       }
                                      }
                                  //    echo $data;
                                  //    $passenger_q = "SELECT `p_id`, passenger.name, `NID`, `phone`, `address`, `email`, `birthdate`,   FROM passenger, checkinout WHERE passenger.p_id = checkinout.passenger_no AND reserve.reserve_id = ' '";
                      
                                   //   $result = array();
                                //   echo sizeof($result);
                                   if(sizeof($result)==0){
                                        $q = "SELECT  reserve.reserve_id, rooms.room_id, `start`, `end` FROM passenger, reserve, roomreserve, rooms, checkinout WHERE reserve_no=reserve.reserve_id AND passenger_no=p_id AND  NID ='$pId' AND reserve.reserve_id = roomreserve.reserve_id AND rooms.room_id  = roomreserve.room_id";
                            //            echo $q;
                                        $res = selectVHistory($q, "i");
                                        
                                        if(empty($res)){
                                  //      echo "####";
                                            //find of check in check out
                                        }
                                        else{
                                   //     echo "&&&";
                                        while($row = mysqli_fetch_assoc($res))
                                        {
                                    //        $n= sizeof($result);
                                    //    echo $row['reserve_id'];
                                            array_push($result,$row);
                                        }
                                        }
                                        return $result;
                                   }
                                   else{
                                    return $result;
                                   }
                                   
                                    }

                                    
                                  //  echo $data;
                                ?>
                                <!--
                                </tbody>
                                <tfoot class="hide-if-no-paging">
                                <td colspan="5">
                                    <div class="pagination"></div>
                                </td>
                                </tfoot>
                                -->
                            </table>
                            
        </div>
        <div id = "result" class="col-lg-9 col-md-12 px-4">
            

        </div>

        
        
    </div>
</div>


<script>
    function toggle_status(id, val)
    {
      console.log("2423424");
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/search_ajax.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


        xhr.onload = function(){
      //    let  x=this.responseText; 
          console.log(this.responseText);
            if(this.responseText==1){
                console.log("#%$#$%#$%");
                alert('success', 'Status toggled!');
               
            }
            else{
                console.log("24234234234%#$%");
                alert('error', 'Server Down');
            }
        }
        console.log("#%");
       console.log(id);
        xhr.send('toggle_status='+id+'&value='+val);
    }
  </script>



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


<script type="text/javascript" scr="https://code.jquery.com/jquery-1.12.3.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
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

<script type="text/javascript">

    $(document).ready(function(){
        $('.footable').footable();
    });

</script>
</body>
</html>