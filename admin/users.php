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


    <title>Admin Panel-Room</title>
  
</head>

<body class="bg-light">

    <?php require('inc/header.php');?>

    <div class="container-fluid" id ="main-content">
        <div class="row">
            <div class="col-lg-10 ml-auto p-4 overflow-hidden" style="color: black;">
                <h3 class="mb-4" style="color: black;">Passengers</h3>
                <!-- Floors -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="text-end mb-4">
                        </div>
                        <div class="table-responsive-lg" style="height: 450px; overflow-y:scroll;">
                            <table class="table table-hover border text-center">
                                <thead>
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                         <th scope="col" style="width:200px;">Name</th>
                                        <th scope="col">NID</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Email</th>
                                        <th scope="col"style="width:120px;">birthdate</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="room-data">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
           
            <!-- Edit room modal -->
            <div class="modal fade" id="edit-room" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <form id="edit-room-form" autocomplete="off">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" style="color: black;">Edit User</h5>
                            </div>
                            
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Name</label>
                                        <input type="text" name="name1" class="form-control shadow-none" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">NID</label>
                                        <input type="text" name="nid1" class="form-control shadow-none" pattern="[0-9]{10}" required> 
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Phone</label>
                                        <input type="text" name="phone1" class="form-control shadow-none" pattern="[0-9]{11}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Address</label>
                                        <input type="text" name="add1" class="form-control shadow-none" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Email</label>
                                        <input type="text" name="email1" class="form-control shadow-none" required>
                                    </div>

                                    
                                    <input type="hidden" name="room_id">
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                            <button name="submit" type="submit"  class="btn custom-bg text-white">Submit</button>
                            </div>
                        </div>
                    </form>
                
                </div>
            </div>


            </div>
        </div>
    </div>

<script>
    let add_room_form = document.getElementById('add_room_form');
 //   console.log("!21");

 

    function get_all_rooms()
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/users.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


        xhr.onload = function(){
            document.getElementById('room-data').innerHTML = this.responseText;
        }

        xhr.send('get_all_rooms');

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
      xhr.open("POST", "ajax/users.php", true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      xhr.onload = function(){

        var data=xhr.responseText;
        console.log(data);
        var data = JSON.parse(data);
        console.log(data.name);

        edit_room_form.elements['name1'].value = data.name;
        edit_room_form.elements['nid1'].value = data.NID;
        edit_room_form.elements['phone1'].value = data.phone;
      //  console.log("data.quality: ", data.quality);
        edit_room_form.elements['add1'].value = data.address;
        edit_room_form.elements['email1'].value = data.email;
    //    console.log("data.floor: ", data.floor);
     //   edit_room_form.elements['birth1'].value = data.birth;
    //    console.log("room_id: ", data.room_id);
        edit_room_form.elements['room_id'].value = data.p_id;
        

      }

      xhr.send('get_room='+id);
    }

    function submit_edit_room()
    {
        console.log("@@@@@@@");
   //     console.log(document.getElementById("floor1").value);

        let data = new FormData();
        data.append('edit_user','');
        data.append('room_id',edit_room_form.elements['room_id'].value);
        data.append('name',edit_room_form.elements['name1'].value);
        data.append('nid',edit_room_form.elements['nid1'].value);
        data.append('p',edit_room_form.elements['phone1'].value);
        data.append('add',edit_room_form.elements['add1'].value);
        data.append('e',edit_room_form.elements['email1'].value);
     //   data.append('b',edit_room_form.elements['birth1'].value);


       // console.log(edit_room_form.elements['area'].value);

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/users.php", true);
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