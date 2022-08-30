<?php

 //   echo"2222";
    
    require('inc/essentials.php');
    require('inc/db_config.php');
 //   session_start();
    adminLogin();
/*
    if(isset($_GET['seen']))
    {
        $frm_data =  filteration($_GET);

        if($frm_data['seen']=='all'){
            $q = "UPDATE `user_queries SET` `seen`=?";
            $values = [1];
            if(update($q, $values, 'i')){
                alert('success', 'Marked all as read!');
            }
            else{
                alert('error', 'Operation Failed!');
            }
        }
        else{
            $q = "UPDATE `user_queries` SET `seen`=? WHERE `sr_no`=?";
            $values = [1, $frm_data['seen']];
            if(update($q, $values, 'ii')){
                alert('success', 'Marked as read!');
            }
            else{
                alert('error', 'Operation Failed!'); 
            }
        }

    }
    */
    //if(isset($_GET['del']))
?>
<!DOCTYPE html>
<html lang="en">
<head>
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

    <title>Welcome</title>
    <?php require('inc/links.php');?>
</head>
<body class="bg-light">
    <?php require('inc/header.php'); ?>
    <div class="container-fluid" id ="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4" style="color: black;">FEATURES & FACILITIES</h3>
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-tatle m-0" style="color: black">Features</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#feature-s">
                                <i class="bi bi-plus-square"></i>Add
                            </button>
                        </div>

                        <div class="table-responsive-md" style="height: 350px; overflow-y:scroll;">
                            <table class="table table-hover border">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Feature</th>
                                        <th scope="col">Room Type</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody id="features_data">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
<!--
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-tatle m-0" style="color: black">Facilities</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#facility-s">
                                <i class="bi bi-plus-square"></i>Add
                            </button>
                        </div>

                        <div class="table-responsive-md" style="height: 350px; overflow-y:scroll;">
                            <table class="table table-hover border">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="facilities_data">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                -->
            </div>
        </div>
    </div>

    <!-- Feature Modal -->

<div class="modal fade" id="feature-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="feature-s-form">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: black;">Add Features</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Feature</label>
                        <input type="text" name="feature_name" class="form-control shadow-none" required>
                        <label class="form-label fw-bold">Room Type</label>
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
                </div>
                <div class="modal-footer">
                    <button type="reset"  class='btn text-secondary shadow-none' data-bs-dismiss="modal">CANCEL</button>
                    <button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
                </div>
            </div>
        </form>
    </div>
</div>



 <?php require('inc/scripts.php'); ?>


<script>
    let feature_s_form =  document.getElementById('feature-s-form');
    let facility_s_form =  document.getElementById('facility_s_form');

 //   console.log(feature_s_form);
    
    feature_s_form.addEventListener('submit', function(e){
    //    e.preventDefault();
        add_feature();
    });
    
    function add_feature()
    {
        let data = new FormData();
        data.append('name', feature_s_form.elements['feature_name'].value);
        data.append('quantity', document.getElementById("roomType").value);
        data.append('add_feature', '');

        console.log('!!!1');


        var xhr = new XMLHttpRequest();

        xhr.open("POST", "ajax/features_facilities.php", false);
        

        console.log(xhr.onload);

        xhr.onload = function(){

            var myModal =  document.getElementById('feature-s');

            var modal = bootstrap.Modal.getInstance(myModal);

            modal.hide();

            console.log("this.responseText= ", this.responseText);

            if(this.responseText == 1){
                console.log("$");
                alert('success', 'New feature added!');
                feature_s_form.elements['feature_name'].value='';
                get_features();
            }
            else{
                console.log("Data1= "+data);
                console.log("33");
                alert('error','Login failed - Invalid Credentials!');//'success', 'New feature added!');
                console.log("44");
                feature_s_form.elements['feature_name'].value='';
                console.log("55");
                get_features();

            }
        }

        

        console.log("Data= "+data);
        xhr.send(data);

    }

    function get_features()
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/features_facilities.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        
        xhr.onload = function(){
         //   console.log("100");
         //   console.log(this.responseText);
            document.getElementById('features_data').innerHTML = this.responseText;
          //  console.log("99");
        }

        xhr.send('get_features');
    }

    function rem_features(val){
        console.log("22");
        let xhr = new XMLHttpRequest();
     //   console.log("33");
        xhr.open("POST", "ajax/features_facilities.php", true);
     //   console.log("44");
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
     //   console.log("55");

        xhr.onload = function(){
            console.log(this.responseText);
            if(this.responseText == 1){
                console.log("456");
             //   alert('success', 'New feature added!');
                get_features();
            }
            else{

           //     console.log("123");
            //    alert('success', 'New feature added!');
                get_features();
             //   console.log("321");
             //   alert('error','Login failed - Invalid Credentials!');
            }
        }
     //   console.log("1");
        console.log('rem_feature='+val);
        xhr.send("rem_feature="+val);
        
    //    console.log("2");
  //  xhr.send('get_features');
    }

/*
    facility_s_form.addEventListener('submit', function(e){
    //    e.preventDefault();
        add_facility();
    });


    function add_facilities()
    {
        let data = new FormData();
        data.append('name', facility_s_form.elements['facility_name'].value);
        data.append('add_facility', '');

        var xhr = new XMLHttpRequest();
 
        xhr.open("POST", "ajax/features_facilities.php", false);

        console.log(xhr.onload);

        xhr.onreadystatechange = function(){
            var myModal =  document.getElementById('facility-s');
            var modal = bootstrap.Modal.getInstance(myModal);

            modal.hide();
            if(this.responseText == 1){
                alert('success', 'New feature added!');
                facility_s_form.elements['facility_name'].value='';
                get_facilities();
            }
            else{
    
                alert('error','Login failed - Invalid Credentials!');//'success', 'New feature added!');
         
                facility_s_form.elements['facility_name'].value='';
            
                get_facilities();
            }
        }
        xhr.send(data);
    }

    function get_facilities()
    {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/features_facilities.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        
        xhr.onload = function(){
            document.getElementById('facilities_data').innerHTML = this.responseText;
        }

        xhr.send('get_facilities');
    }

    function rem_facilities(val){
 
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/features_facilities.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function(){
            if(this.responseText == 1){
                alert('success', 'New feature added!');
                get_facilities();
            }
            else if(this.responseTect == 'room_added'){
                alert('error', 'Feature is added in room!');
            }
            else{
                 get_facilities();
            }
        }
        console.log('rem_feature='+val);
        xhr.send("rem_facilitie="+val);
    }
*/

    window.onload =  function(){
        get_features();
  //      get_facilities();
    }


</script>


</body>
</html>