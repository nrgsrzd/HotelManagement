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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    
    <title>Admin Panel-Room</title>
  
</head>

<body class="bg-light">

    <?php require('inc/header.php');?>

    <div class="container-fluid" id ="main-content">
        <div class="row">
            <div class="col-lg-10 ml-auto p-4 overflow-hidden" style="color: black;">
                <h3 class="mb-4" style="color: black;">Rooms</h3>
                <!-- Floors -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="text-end mb-4">
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#add-room">
                                <i class="bi bi-plus-square"></i>Add
                            </button>
                        </div>
                        <div class="table-responsive-lg" style="height: 450px; overflow-y:scroll;">
                            <table class="table table-hover border text-center">
                                <thead>
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                 
                                        <th scope="col">Name</th>
                                        <th scope="col">Guests</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Floor</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Available</th>
                                        <th scope="col">Action</th>
                                        <th scope="col">History</th>
                                    </tr>
                                </thead>
                                <tbody id="room-data">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
            <div class="modal fade" id="add-room" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <form id="add_room_form" autocomplete="off">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" style="color: black;">Add Room</h5>
                            </div>
                            
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Name</label>
                                        <input type="text" name="area" class="form-control shadow-none" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Price</label>
                                        <input type="text" min="1" name="price" class="form-control shadow-none" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Room Type</label>
                                        <select name = "roomType" id="roomType" class="form-control shadow-none">
                                            <?php 
                                                $q = "SELECT `title` FROM `roomtype` WHERE 1";
                                                $res = selectV3($q, "i");
                                                $i=0;
                                                while($row = mysqli_fetch_assoc($res))
                                                {
                                                    ?>
                                                    <option value="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Floor</label>
                                        <select name = "floor" id="floor" class="form-control shadow-none">
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
                                        <select name = "adult" id="adult" class="form-control shadow-none">
                                            <option value=1>1</option>
                                            <option value=2>2</option>
                                            <option value=3>3</option>
                                            <option value=4>4</option>
                                            <option value=5>5</option>
                                            <option value=6>6</option>                                   
                                        </select>
                                    </div>
                                    
                                    <!--
                                    <div class="col-12 mb-3">
                                        <label class="form-label fw-bold">Features</label>
                                        <div class="row">
                                            <div class='col-md-3'>
                                                <label style="margin-left: 22px;">
                                                    <input type='checkbox' name='features' value="bedroom" class='form-check-input shadow-none'>
                                                    bedroom
                                                </label>
                                            </div>
                                            <div class='col-md-3'>
                                                <label>
                                                    <input type='checkbox' name='features' value="bathroom" class='form-check-input shadow-none'>
                                                    bathroom
                                                </label>
                                            </div>
                                            <div class='col-md-3'>
                                                <label>
                                                    <input type='checkbox' name='features' value="kitchen" class='form-check-input shadow-none'>
                                                    kitchen
                                                </label>
                                            </div>
                                            <div class='col-md-3'>
                                                <label>
                                                    <input type='checkbox' name='features' value="Wifi" class='form-check-input shadow-none'>
                                                    Wifi
                                                </label>
                                            </div>
                                            <div class='col-md-3'>
                                                <label style="margin-left: 22px;">
                                                    <input type='checkbox' name='features' value="Air Conditioner" class='form-check-input shadow-none'>
                                                    Air Conditioner
                                                </label>
                                            </div>
                                            <div class='col-md-3'>
                                                <label>
                                                    <input type='checkbox' name='features' value="TV" class='form-check-input shadow-none'>
                                                    TV
                                                </label>
                                            </div>
                                            <div class='col-md-3'>
                                                <label>
                                                    <input type='checkbox' name='features' value="Spa" class='form-check-input shadow-none'>
                                                    Spa
                                                </label>
                                            </div>
                                            <div class='col-md-3'>
                                                <label>
                                                    <input type='checkbox' name='features' value="Gym" class='form-check-input shadow-none'>
                                                    Gym
                                                </label>
                                            </div>
                                            <div class='col-md-3' style="margin-left: 22px;">
                                                <label>
                                                    <input type='checkbox' name='features' value="Room Heater" class='form-check-input shadow-none'>
                                                    Room Heater
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    -->
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
                                        <input type="text" name="area1" class="form-control shadow-none" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Price</label>
                                        <input type="text" min="1" name="price1" class="form-control shadow-none" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Room Type</label>
                                        <select name = "roomType1" id="roomType1" class="form-control shadow-none">
                                        <?php 
                                                $q = "SELECT `title` FROM `roomtype` WHERE 1";
                                                $res = selectV3($q, "i");
                                                $i=0;
                                                while($row = mysqli_fetch_assoc($res))
                                                {
                                                    ?>
                                                    <option value="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></option>
                                                    <?php
                                                }
                                                ?>
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

            </div>
        </div>
    </div>

<script>
    let add_room_form = document.getElementById('add_room_form');
 //   console.log("!21");

    add_room_form.addEventListener('submit', function(e){
        e.preventDefault();
        add_rooms();
    });

    function add_rooms()
    {
        console.log("&&&");
        console.log(document.getElementById("roomType").value);
        let data = new FormData();
        data.append('add_room', '');
        data.append('area', add_room_form.elements['area'].value);
        data.append('price', add_room_form.elements['price'].value);
        data.append('quantity', document.getElementById("roomType").value);
        data.append('adult', document.getElementById("adult").value);
        data.append('floor', document.getElementById("floor").value);


        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/rooms.php", true);

        xhr.onload = function(){
            console.log(this.responseText);
            var myModal = document.getElementById('add-room');
            var modal = bootstrap.Modal.getInstance(myModal);
            modal.hide();

            if(this.responseText==1){
                alert('success', 'New room added!');
                add_room_form.reset();
                get_all_rooms();
            }
            else{
                alert('error', 'Server Down!');
            }
        }

        xhr.send(data);

    
    }

    function get_all_rooms()
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/rooms.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


        xhr.onload = function(){
            document.getElementById('room-data').innerHTML = this.responseText;
        }

        xhr.send('get_all_rooms');
    
    }

    function history(id){
        document.querySelector("#passengerH .modal-title").innerText = id;
        console.log("$$4");
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/rooms.php", true);
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

    function toggle_status(id, val)
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/rooms.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


        xhr.onload = function(){
            if(this.responseText==1){
                console.log("#%$#$%#$%");
                alert('success', 'Status toggled!');
                get_all_rooms();
            }
            else{
                console.log("24234234234%#$%");
                alert('error', 'Server Down');
            }
        }
       console.log(val);
        xhr.send('toggle_status='+id+'&value='+val);
    }

    
   let edit_room_form = document.getElementById('edit-room-form');
 //  console.log(edit_room_form );
 //   console.log("!321");

    edit_room_form.addEventListener('submit', function(e){
        console.log(e.preventDefault());
        console.log("@#@$!@$!$");
        submit_edit_room();
    });
    
    function edit_details(id)
    {
      console.log("idddd: ", id);
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/rooms.php", true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      xhr.onload = function(){

        var data=xhr.responseText;
        console.log(data);
        var data = JSON.parse(data);
        console.log(data.name);

        edit_room_form.elements['area1'].value = data.area;
        edit_room_form.elements['price1'].value = data.price;
        console.log("data.quality: ", data.quality);
        edit_room_form.elements['roomType1'].value = data.quality;
        edit_room_form.elements['adult1'].value = data.adult;
        console.log("data.floor: ", data.floor);
        edit_room_form.elements['floor1'].value = data.floor;
        console.log("room_id: ", data.room_id);
        edit_room_form.elements['room_id'].value = data.room_id;
        

      }

      xhr.send('get_room='+id);
    }

    function submit_edit_room()
    {
        console.log("@@@@@@@");
        console.log(document.getElementById("floor1").value);

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
        xhr.open("POST", "ajax/rooms.php", true);
     //   xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


        xhr.onload = function(){
            console.log("as");
            console.log(this.responseText);
            var myModal = document.getElementById('edit-room');
        //    console.log(myModal);
            var modal = bootstrap.Modal.getInstance(myModal);
            modal.hide();
       //     console.log(modal);
            console.log(this.responseText);
            if(this.responseText==1){
                console.log("4$$4");
                alert('success', 'Room data edited!');
                edit_room_form.reset();
                get_all_rooms();
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
        xhr.open("POST", "ajax/rooms.php", true);

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
        xhr.open("POST", "ajax/rooms.php", true);
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
        xhr.open("POST", "ajax/rooms.php", true);

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

    window.onload = function(){
        get_all_rooms();
    }



/*


    console.log("start");

    let add_room_form = document.getElementById('add-room-form');

    add_room_form.addEventListener('submit', function(e){
        e.preventDefault();
        add_rooms();
    });

    function add_rooms(){
        let data = new FormData();

        console.log("123");

        data.append('add_room', '');
        data.append('name', add_room_form.elements['name'].value);
        data.append('area', add_room_form.elements['area'].value);
        data.append('price', add_room_form.elements['price'].value);
        data.append('quantity', add_room_form.elements['quantity'].value);
        data.append('adult', add_room_form.elements['adult'].value);
        data.append('children', add_room_form.elements['children'].value);
        
        console.log("22");

        let features = [];

        add_room_form.elements['features'].forEach(el =>{
            if(el.checked){
                features.push(el.value);
            }
        });

        console.log("33");

        data.append('features', JSON.stringify(features));

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/rooms.php", true);

        xhr.onload = function(){
            console.log("44");
            var myModal =  document.getElementById('add-room');
            var modal = bootstrap.Modal.getInstance(myModal);
            modal.hide();
            if(this.responseText == 1){
                console.log("88");
           //     alert('success', 'New Room added!');
                add_room_form.reset();
                //get_features();
            }
            else{
                console.log("99");
              //  alert('error','Server Down!');
                add_room_form.reset();
            }
        }

        
        console.log("77");
     //   console.log("Data= "+data);
        xhr.send(Data);
        console.log("66");
    }
    */

</script>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>