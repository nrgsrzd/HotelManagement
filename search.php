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



 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta charset="UTF-8">
 

    <link href="https://fonts.googleapis.com/css2?family=MonteCarlo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/common.css">
    

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css">

  

    <link rel="stylesheet" href="css/common.css">
    <link href="https://fonts.googleapis.com/css2?family=MonteCarlo&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">


    <link href="https://fonts.googleapis.com/css2?family=MonteCarlo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">

    <link href="https://fonts.googleapis.com/css2?family=MonteCarlo&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

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

<a class="link-primary" href="admin/search.php" style="color: rgb(153, 169, 238); font:50; margin-left: 135px;  margin-button:230px;">Back</a>

<div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center" style="color: black;">Our Rooms</h2>
    <div class="h-line bg-dark">

    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 px-lg-0">
            <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
              <form method = "POST">
                <div class="container-fluid flex-lg-column align-items-stretch">
                  <h4 class="mt-2" style="color: black;">Filters</h4>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">

                  </div>
                  <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                    <div class="border bg-light p-3 rounded mb-3">
                      <h5 class="mb-3" style="font-size: 18px; color:black;">Room Type</h5>
                        <?php 
                        $nk=0;
                        $type=array();
                                                $q = "SELECT `title` FROM `roomtype` WHERE 1";
                                                $res = selectV3($q, "i");
                                                $i=0;
                                                
                                                while($row = mysqli_fetch_assoc($res))
                                                {
                                                  $nk++;
                                                  array_push($type,$row['title']);
                                                    ?>
                                                    <input type="checkbox" id="<?php echo $row['title']; ?>" name="filter[]" value="<?php echo $row['title']; ?>">
                                                    <label for="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></label><br>
                                              
                                                    <?php
                                                }
                                                ?>
           
                     </div>
                  </div>
                  <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                    <div class="border bg-light p-3 rounded mb-3">
                      <h5 class="mb-3" style="font-size: 18px; color:black;">Available</h5>
                      <input type="checkbox" id="Availabale" name="filter[]" value="Availabale">
                      <label for="Availabale">Availabale</label><br>
                      <input type="checkbox" id="UnAvailable" name="filter[]" value="UnAvailable">
                      <label for="UnAvailable">UnAvailable</label><br>
                     </div>
                  </div>
                  <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                    <div class="border bg-light p-3 rounded mb-3">
                      <h5 class="mb-3" style="font-size: 18px; color:black;">Status</h5>
                      <input type="checkbox" id="Active" name="filter[]" value="Active">
                      <label for="Active">Full</label><br>
                      <input type="checkbox" id="DiActive" name="filter[]" value="DiActive">
                      <label for="DiActive">Empty</label><br>
                     </div>
                  </div>
                  <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                    <div class="border bg-light p-3 rounded mb-3">
                      <h5 class="mb-3" style="font-size: 18px; color:black;">Room number</h5>
                      <input type="text" id="roomid" name="roomid" value="enter">
                  </div>
                  <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                    <div class="border bg-light p-3 rounded mb-3">
                      <h5 class="mb-3" style="font-size: 18px; color:black;">Floor</h5>
                      <select name = "filter[]" id="floor" class="form-control shadow-none">
                                            <option value=0>all</option>
                                            <option value=1>1</option>
                                            <option value=2>2</option>
                                            <option value=3>3</option>
                                            <option value=4>4</option>
                                            <option value=5>5</option>
                                            <option value=6>6</option>
                                            <option value=7>7</option>
                                            <option value=8>8</option>
                                            <option value=9>9</option>
                                            <option value=10>10</option>
                                            <option value=11>11</option>
                                            <option value=12>12</option>
                                            <option value=13>13</option>
                                            <option value=14>14</option>
                                            <option value=15>15</option>
                                            <option value=16>16</option>
                                            <option value=17>17</option>
                                            <option value=18>18</option>
                                            <option value=19>19</option>
                                            <option value=20>20</option>
                                        </select>
                     </div>
                  </div>
                
                  <button name="submitSearch" type="submit"  class="btn custom-bg text-white">
                    <i class="bi bi-filter-circle-fill"></i>
                </button>
                </form>
                </div>
              </nav>
        </div>

        <div id = "result" class="col-lg-9 col-md-12 px-4">
                <table id="mytable" class="display"> <!--class="table table-hover border text-center">-->
                                <thead>
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>

                                        <th scope="col">Room ID</th>
                                        <th scope="col">Floor</th>
                                        <th scope="col">Available</th>
                                        <th scope="col">Action</th>
                                        <th scope="col">History</th>
                                        <th scope="col">more Info</th>
                                    </tr>
                                </thead>
                                <tbody id="room-data">
                                    

            <?php
              if(isset($_POST['submitSearch'])){

            //    echo "234234";
                $filter="";
                $filter_search=array();
           //     echo "+++";
           //     echo $_POST['roomid'];
           //     echo "+++";

                $filter =  $_POST['filter'];

           //     echo $filter;
                foreach ($filter as $color){ 

                    array_push($filter_search,$color);

                }

                $resn=array();
                
                $res = selectAll('rooms');
                

                $price =150000;
                $features="";
                
                $fe="";

                $result = array ();
                $value1 = array();

                $n=0;
         //   echo $query;
            foreach($filter_search as $f){

              for($m=0;$m<$nk;$m++)
              {
          //      echo "&&&&&&";
            //    echo $type[$m];
                if($f==$type[$m]){
                  array_push($result,"quality");
                  array_push($value1,$type[$m]);
            //      $price = 150000;
            //            $features="TV";
                  $n++;
                }
              }



      //        echo "$$";
     //         echo $f;
              if(is_numeric($f)){
                if($f!=0){
                array_push($result,"floor");
                array_push($value1,$f);
                $n++;
                }
                //echo "&&";
              }

              if($_POST['roomid']!="enter")
              {
              
                array_push($result,"room_id");
                array_push($value1,$_POST['roomid']);
                $n++;
              }
/*
              if($f=='Normal'){
            //    $result(array("Normal","1"));
                array_push($result,"quality");
                array_push($value1,"Normal");
                $price = 150000;
                        $features="TV";
                $n++;
              }
              
              else if($f=='Royal'){
             //   $result(array("Royal","1"));
                array_push($result,"quality");
                array_push($value1,"Royal");
                $price = 300000;
                        $features="Pool";
                $n++;
              }
              else if($f=='VIP'){
               // $result(array("VIP",1));
                array_push($result,"quality");
                array_push($value1,"VIP");
                $price = 600000;
                        $features="jacuzzy";
                $n++;
                
              }
              */
       //       $res = selectAll('rooms');
              if($f=='Availabale'){
            //    $result(array("available","1"));
                array_push($result,"available");
                array_push($value1,"1");
                $n++;
              }
              else if($f=='UnAvailable'){
                //$result(array("available","0"));
                array_push($result,"available");
                array_push($value1,"0");
                $n++;
              }
              if($f=='Active'){
            //    $result(array("status","1"));
                array_push($result,"status");
                array_push($value1,"1");
                $n++;
              }
              else if($f=='DiActive'){
              //  $result(array("status","0"));
              array_push($result,"status");
                array_push($value1,"0");
                $n++;
             //   }
              }

             
              //     if($f ==)

            }


            $query = "SELECT * FROM `rooms`";
            if (count($filter_search)) {
              $query .= " WHERE";

              $keynames = array_keys($filter_search); // make array of key names from $filtered_get

           for($i=0;$i<$n;$i++)
              {

                $query .= " `$result[$i]` = '$value1[$i]'";  // $filtered_get keyname = $filtered_get['keyname'] value
    
                $j=$i+1;

                  if ($j!=$n) { // more than one search filter, and not the last
    
                    $query .= " AND";
                }
              }
            }
            $query .= ";";


         //   echo $query;
         $data="";
            $res = selectV3($query,"i");
            $i = 1;
            if(empty($res)){
              echo "No Result";
            }
            else{
            while($row = mysqli_fetch_assoc($res))
              {

                $qq= "'".$row['quality']."'";
                $p= "'".$row['price']."'";
                $a= "'".$row['adult']."'";
                $n= "'".$row['area']."'";



                $data="";

                if($row['available']==1){
                  $status = "<button onclick='toggle_status($row[room_id],0)' class='btn btn-dark btn-sm shadow-none'>active</button>";
              }
              else{
                  $status = "<button onclick='toggle_status($row[room_id],1)' class='btn btn-warning btn-sm shadow-none'>inactive</button>";
              }
  
              $history = "<button onclick='history($row[room_id])' class='btn btn-info shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#passengerH'>
              <i class='bi bi-person-lines-fill'></i>
              </button>";

              $data.="
                  <tr class = 'align-middle'>
                      <td>$i</td>
                      <td>$row[room_id]</td>
                      <td>$row[floor]</td>
                      <td>$status</td>
                      <td>
                          <button type='button' onclick='edit_details($row[room_id],$row[area],$row[adult],$row[price],$row[quality],$row[floor])' class='btn btn-primary shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#edit-room'>
                          <i class='bi bi-pencil-square'></i>
                          </button>
                          <button type='button' onclick=\"room_images($row[room_id])\" class='btn btn-info shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#room-images'>
                          <i class='bi bi-images'></i>
                          </button>
                      </td>
                      <td>$history</td>
                      <td>
                        <button type='button' onclick=\"info($row[room_id],$n,$a,$p,$qq)\" class='btn btn-info shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#info'>
                          <i class='bi bi-info-circle'></i>
                        </button>
                      </td>
                  </tr>
              ";
              $i++;

                  echo $data;
            
            }
          }
         
            }

            ?>
                                </tbody>
                            </table>
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
                        <th scope="col">Name</th>
                        <th scope="col">adult</th>
                        <th scope="col">price</th>
                        <th scope="col">Room Type</th>
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

<!---MOdal -->

            <!-- Edit room modal -->
            <div class="modal fade" id="edit-room" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <form id="edit-room-form" autocomplete="off">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" style="color: black;">Edit Room</h5>
                            </div>
                            
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Name</label>
                                        <input type="text" min="1" name="area1" class="form-control shadow-none" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Price</label>
                                        <input type="text" min="1" name="price1" class="form-control shadow-none" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Room Type</label>
                                        <select name = "roomType1" id="roomType1" class="form-control shadow-none">
                                            <option value="Normal">Normal</option>
                                            <option value="Royal">Royal</option>
                                            <option value="VIP">VIP</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Floor</label>
                                        <select name = "floor1" id="floor1" class="form-control shadow-none">
                                            <option value=1>1</option>
                                            <option value=2>2</option>
                                            <option value=3>3</option>
                                            <option value=4>4</option>
                                            <option value=5>5</option>
                                            <option value=6>6</option>
                                            <option value=7>7</option>
                                            <option value=8>8</option>
                                            <option value=9>9</option>
                                            <option value=10>10</option>
                                            <option value=11>11</option>
                                            <option value=12>12</option>
                                            <option value=13>13</option>
                                            <option value=14>14</option>
                                            <option value=15>15</option>
                                            <option value=16>16</option>
                                            <option value=17>17</option>
                                            <option value=18>18</option>
                                            <option value=19>19</option>
                                            <option value=20>20</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Adult(Max.)</label>
                                        <select name = "adult1" id="adult1" class="form-control shadow-none">
                                            <option value=1>1</option>
                                            <option value=2>2</option>
                                            <option value=3>3</option>
                                            <option value=4>4</option>
                                            <option value=5>5</option>
                                            <option value=6>6</option>                                   
                                        </select>
                                    </div>
                          
                                    <input type="hidden" name="room_id">
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                            <button name="submit" type="submit"  class="btn custom-bg text-black">Submit</button>
                            </div>
                        </div>
                    </form>
                
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="room-images" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: black;">Room Name</h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="image-alert"></div>
                    <div class="border-buttom border-3 pb-3 mb-3" style="color: black;">
                        <form id="add_image_form">
                            <label class = "form-label fw-bold">Add Image</label>
                            <input type="file" name = "image" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none mb-3" required>
                                <button type="submit" name="submiti" class="btn custom-bg text-black shadow-none">ADD</button>
                             <input type="hidden" name="room_id">
                        </form>
                    </div>
                    <div class="table-responsive-lg" style="height: 350px; overflow-y:scroll;">
                        <table class="table table-hover border text-center">
                            <thead>
                                <tr class="bg-dark text-light sticky-top">
                                    <th scope="col" width="60%">Image</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody id="room-image-data">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
        </div>
    </div>
  


<!--Passengers Table-->

<div class="modal fade" id="passengerH" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
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
                        <th scope="col">#</th>
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
                      </tr>
                  </thead>
                  <tbody id="room-history-data">
                  </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
  </div>



<!-- END od Modal -->




        
        
    </div>
</div>

<br><br><br>
<br><br><br>

<script>
 let edit_room_form = document.getElementById('edit-room-form');
 //  console.log(edit_room_form );
 //   console.log("!321");

    edit_room_form.addEventListener('submit', function(e){
        console.log(e.preventDefault());
        console.log("@#@$!@$!$");
        submit_edit_room();
    });

    function history(id)
    {
        document.querySelector("#passengerH .modal-title").innerText = id;
        console.log("$$4");
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/search.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


        xhr.onload = function(){
            if(this.response!=0){
            document.getElementById('room-history-data').innerHTML = this.responseText;
            }
            else{
                document.getElementById('room-history-data').innerHTML = "NO History!";
            }
        }

        xhr.send('history='+id);
    }

    function edit_details(id, area, adult, price, quality, floor)
    {


      console.log("idddd: ", id);
      console.log("data.quality1: ", quality.value);


        edit_room_form.elements['area1'].value = area;
        edit_room_form.elements['price1'].value = price;
        console.log("data.quality: ", quality);
        edit_room_form.elements['roomType1'].value = quality.value;
        edit_room_form.elements['adult1'].value = adult;
        console.log("data.floor: ", floor);
        edit_room_form.elements['floor1'].value = floor;
        console.log("room_id: ", id);
        edit_room_form.elements['room_id'].value = id;
        

    }

    function submit_edit_room()
    {
        console.log("@@@@@@@");
        console.log(document.getElementById("roomType1").value);

        let data = new FormData();
        data.append('edit_room','');
        data.append('room_id',edit_room_form.elements['room_id'].value);
        data.append('area',edit_room_form.elements['area1'].value);
        data.append('price',edit_room_form.elements['price1'].value);
        data.append('quantity', document.getElementById("roomType1").value);
        data.append('adult', document.getElementById("adult1").value);
        data.append('floor', document.getElementById("floor1").value);


       // console.log(edit_room_form.elements['area'].value);

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/search.php", true);
     //   xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


        xhr.onload = function(){
            console.log("as");
            console.log(this.responseText);
            var myModal = document.getElementById('edit-room');
            console.log("&&");
            var modal = bootstrap.Modal.getInstance(myModal);
            console.log("((((modal34434))))");
            modal.hide();
            console.log("((((modal))))");
            console.log(this.responseText);
            if(this.responseText==1){
                console.log("4$$4");
                alert('success', 'Room data edited!');
                edit_room_form.reset();
                setTimeout("location.reload(true);");
             //   get_all_rooms();
            }
            else{
                console.log("errpr$$4");
                alert('error', 'Server Down!');
            }
        }
        console.log("3123123");
        xhr.send(data);
        console.log("$$$$");
        
    }

    let add_image_form = document.getElementById('add_image_form');

    add_image_form.addEventListener('submit', function(e){
        e.preventDefault();
        add_image();
    });
    

    function add_image()
    {
       console.log(add_image_form.elements['image'].files[0]);

        let data = new FormData();
        data.append('image', add_image_form.elements['image'].files[0]);
        data.append('room_id', add_image_form.elements['room_id'].value);
        data.append('add_image', '');


        
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/search.php", true);

        xhr.onload = function(){
            console.log(this.responseText);
            if(this.responseText == 'inv_img'){
                alert('error', 'Only JPG, WEBP or PNG images are allowed!');
            }
            else if(this.responseText == 'inv_size'){
                alert('error', 'Image upload failed. Server Down!');
            }
            else if(this.responseText == 1){
                alert('success', 'New Image added!');
                room_images(add_image_form.elements['room_id'].value, document.querySelector("#room-images .modal-title").innerText);
                add_image_form.reset();

            }
        }
        console.log("!!!");
        xhr.send(data);
        console.log("^^^^");
        
    }

    function room_images(id)
    {
        document.querySelector("#room-images .modal-title").innerText = id;
        add_image_form.elements['room_id'].value = id;
        add_image_form.elements['image'].value = '';

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/search.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


        xhr.onload = function(){
            document.getElementById('room-image-data').innerHTML = this.responseText;
        }
        console.log("iddd: ", id);
        xhr.send('get_room_images='+id);

    }

    function rem_image(roomid)
    {
        let data =  new FormData();
        data.append('room_id', roomid);
        data.append('rem_image','');

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/search.php", true);

        xhr.onload = function()
        {
            if(this.responseText == 1)
            {
                alert('success', 'Image Removed!', 'image-alert');
                room_images(roomid, document.querySelector("#room-images .modal-title").innerText);
            }
            else{
                alert('error', 'Image Removal failed!', 'image-alert');
            }
        }

        xhr.send(data);
    }



    function info(id, area, adult, price,t){
        console.log("%%@@");
        console.log(t);
      
        document.querySelector("#info .modal-title").innerText = id;
        console.log("$$4");
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/search.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


        xhr.onload = function(){
            if(this.response!=0){
            document.getElementById('room-info-data').innerHTML = this.responseText;
            }
            else{
                document.getElementById('room-info-data').innerHTML = "NO Data!";
            }
        }

        xhr.send('info='+area+'&adult='+adult+'&price='+price+'&t='+t);
        
    }



    function toggle_status(id, val)
    {
      console.log("2423424");
      
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/search.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


        xhr.onload = function(){
          console.log(this.responseText);
            if(this.responseText==1){
                console.log("#%$#$%#$%");
                alert('success', 'Status toggled!');
                setTimeout("location.reload(true);");
               
            }
            else{
                console.log("24234234234%#$%");
                alert('error', 'Server Down');
            }
        }
       console.log(id);
        xhr.send('toggle_status='+id+'&value='+val);
    }
  </script>



<!-- footer start -->
<?php require('inc/footer.php'); ?>
<!-- footer end -->



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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

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