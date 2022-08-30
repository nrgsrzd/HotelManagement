<?php
    require('inc/essentials.php');
    adminLogin();
  //  session_regenerate_id(true);
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
    <link href="https://fonts.googleapis.com/css2?family=MonteCarlo&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <title>Admin Panel-Dashboard</title>
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
      
<canvas id="myChart" style="width:100%;max-width:600px; margin-left:530px; margin-top:120px;"></canvas>


      <!--
        <button type="button" class="btn btn-secondary btn-square-xl">Button</button>
        <button type="button" class="btn btn-secondary btn-square-xl">Button</button>
        <button type="button" class="btn btn-secondary btn-square-xl">Button</button>
        <button type="button" class="btn btn-secondary btn-square-xl">Button</button>
        <button type="button" class="btn btn-secondary btn-square-xl">Button</button>
        <button type="button" class="btn btn-secondary btn-square-xl">Button</button>-->
      <!--  <div class="col-lg-10 ml-auto p-4 overflow-hidden" style="color: black;">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt officiis nulla ex earum quia, accusantium animi minus repellendus a, eius molestias ducimus officia, voluptates tempore aperiam? Neque et aliquam, mollitia enim nobis incidunt reiciendis suscipit voluptatum adipisci voluptas tempora dicta magni maxime ipsa, quae rem labore quod veniam eos aspernatur excepturi commodi! Veritatis aperiam id obcaecati ipsa officia vel ducimus maiores. Quia quam ipsum ut harum tenetur et amet doloremque ab nam iste modi dolorum earum exercitationem voluptatibus delectus rerum autem obcaecati repellendus porro non necessitatibus temporibus, reiciendis facilis magnam. Exercitationem voluptatibus maxime assumenda perspiciatis voluptate sed, laborum corrupti fugiat voluptatum dolores magnam est totam iusto voluptates quas minus fuga rerum. Beatae, repellendus sint nemo maxime enim minima, nulla modi eos error fugiat explicabo commodi, voluptatem suscipit ut neque esse mollitia doloribus? Eos sapiente, iusto corrupti officiis sed ad in tempore maiores eligendi et distinctio alias atque, modi corporis dolor perferendis itaque? Temporibus illum sint quia voluptates voluptatem, corrupti nesciunt omnis neque minus molestiae excepturi reiciendis amet quo repudiandae adipisci magni hic dignissimos distinctio! Commodi sequi nesciunt nam neque error explicabo deserunt, quae exercitationem eligendi ipsa cum corrupti dolores deleniti. Illum, ab pariatur facere et deleniti reiciendis consequatur ipsa sint maiores est sit, enim saepe officiis reprehenderit voluptatem ad necessitatibus itaque asperiores unde! Quidem officiis aspernatur velit neque, rem quisquam recusandae ducimus blanditiis repellat quod amet, sunt beatae, harum voluptas atque veritatis cumque unde veniam iusto soluta esse corporis. Aliquam modi labore temporibus laborum possimus commodi accusamus optio, non amet maxime, id sed. Nemo animi placeat natus, rem alias earum fugit nulla aspernatur veritatis ex facere expedita. Minima modi esse dicta sequi totam perspiciatis odio hic ex fugit, mollitia id saepe voluptatum quod. Laborum numquam rem iusto eum minima possimus. Pariatur animi provident asperiores sed dolorum molestias, eius, praesentium expedita optio blanditiis omnis nesciunt impedit consequuntur consectetur itaque. Unde ipsa accusantium eaque. Incidunt officiis accusantium nisi nulla quisquam explicabo, doloremque blanditiis aspernatur libero mollitia officia consequuntur? Repellat dicta harum animi ducimus porro ex minima consectetur odio accusantium esse quod molestiae hic corrupti fugit molestias soluta perspiciatis at perferendis deleniti doloribus, tenetur expedita. Minima accusamus ipsum perspiciatis numquam qui, autem repudiandae ullam rerum molestiae provident iure itaque eligendi, culpa repellat delectus unde illum atque iste quod ratione sequi. Qui mollitia et repellat beatae rem similique corrupti eveniet quidem, itaque voluptatibus atque suscipit molestiae deleniti quae officia quasi cupiditate. Corporis soluta, porro natus suscipit doloribus earum! Atque quos ipsum, consequuntur ipsa, dolorum repellendus ipsam libero officiis aliquam voluptatem ducimus, molestias tenetur fugit. Harum animi ipsam quod repudiandae praesentium vel labore cupiditate dignissimos, illum accusamus ducimus fugiat doloremque dicta mollitia minus optio iste dolor eius facere veritatis rem illo natus. In dolore vero excepturi voluptas velit cumque itaque recusandae mollitia facere tenetur beatae eos obcaecati architecto, voluptate minus perspiciatis voluptates temporibus! Magnam facilis recusandae quidem mollitia repudiandae, rerum ipsam laborum ipsum architecto nobis omnis ea corporis, quos quas id quod veniam maxime consequatur magni? Adipisci in magni explicabo laborum neque fugit debitis nemo illum accusantium, perspiciatis id repellat enim commodi distinctio mollitia sit atque, quisquam vitae pariatur eius inventore tenetur. Similique asperiores quod dolores cumque quaerat neque odit, fuga qui sed excepturi velit in ullam optio. Molestias, porro? Dolores reiciendis tempora, provident obcaecati rerum nobis molestias, quaerat nam accusantium corporis mollitia officia ullam asperiores voluptatum debitis. Iste, beatae suscipit. Enim asperiores impedit quos nulla consequuntur animi optio repudiandae, voluptas rem labore distinctio, porro nisi deserunt alias quibusdam quam eligendi delectus nemo temporibus odio culpa. Libero error id reiciendis vel corrupti blanditiis, corporis quod ducimus quos voluptate quis, est soluta animi provident quaerat, molestiae voluptatem rem! Consectetur dolores nihil praesentium sit assumenda beatae velit alias, incidunt exercitationem harum non at dolorum possimus iure maxime odio ex vitae sed numquam suscipit a iste earum. Optio aliquam aliquid officiis molestias quibusdam eos illo ea quis non iure reiciendis qui magnam sint quo odit, saepe placeat sed accusamus repellendus nostrum numquam quae sit eum fuga! Numquam non nulla sed iure nesciunt blanditiis ad earum porro repellat optio perferendis nam corrupti voluptates amet quisquam dolor, ab quo autem quia dicta officia? Minima magnam assumenda nostrum libero sint ea ab, mollitia quod rem inventore ullam, quo laudantium, in reprehenderit eligendi soluta odit hic? Fugiat, ratione sapiente eos asperiores voluptatum nihil necessitatibus vel saepe vero delectus rerum dolore veritatis nam expedita officia laboriosam dignissimos quibusdam, quidem a! Laborum delectus itaque sapiente corporis expedita voluptas labore? Hic natus suscipit deleniti eos accusamus! Cumque sequi, incidunt mollitia iure minus facilis reprehenderit facere, atque non maxime placeat minima veritatis illum? Ipsum, maiores. Amet consequatur, nihil, a corporis nostrum cum laborum nam animi dignissimos quos eligendi nemo repudiandae iusto rem fuga doloremque officiis veritatis ratione ullam? Enim debitis eaque cum cumque inventore. Minima sunt, asperiores earum a deleniti enim dolorem dicta, aliquid eos incidunt quae nostrum tempora at? Eos deserunt quidem minima laborum similique facere impedit suscipit blanditiis qui quo! Iusto praesentium blanditiis repellat, unde veritatis a odio impedit tempore libero officiis aut distinctio fugit suscipit ad similique fugiat, reiciendis quas explicabo expedita quia incidunt ab, magnam harum! Assumenda cum excepturi praesentium cupiditate. Laudantium illo quibusdam assumenda asperiores iure, autem voluptas rerum dicta, aut iusto praesentium ex dignissimos, accusamus sint facere necessitatibus enim magnam. Repellendus, consectetur quos? Officia, maiores. Animi, impedit veniam. Porro doloribus atque, aspernatur delectus voluptas nostrum debitis aperiam aliquam ipsa iure soluta ea ipsum dolorem magni. Omnis placeat sapiente, quasi corporis cupiditate sint nam deserunt dolor, excepturi obcaecati, modi aliquam reiciendis est officia rerum temporibus debitis unde ut animi? Asperiores corrupti quidem quas similique, molestias eum autem nostrum libero consequatur dicta? Quisquam non fugit modi, suscipit asperiores enim amet facere ea praesentium iusto? Deleniti doloremque labore cumque sunt molestias dolorum minus dolores, magni ducimus nisi. Ea dolor hic sit totam nihil, beatae, animi culpa tenetur perferendis impedit quam vel eius numquam. Veritatis quas quisquam natus reprehenderit distinctio inventore magni! Ex iure voluptatem distinctio corrupti aperiam eos vero quaerat consequuntur sequi odio laudantium ipsam id maxime accusantium quisquam cum, commodi labore ducimus nostrum dignissimos sed natus quo. Recusandae optio officiis, modi iusto quae aut necessitatibus quas. Iusto, molestias! Tempora provident accusamus quo. Soluta est harum veritatis veniam sint non assumenda facere minima, sequi labore repudiandae consectetur ab iure officiis, quae esse necessitatibus commodi inventore libero beatae rem odit accusamus expedita! Ducimus atque doloribus corporis nemo voluptate magnam, incidunt animi harum voluptatibus aperiam minima non! Accusamus sed doloribus amet ducimus nemo excepturi debitis voluptatum molestiae minima, alias a maxime! Voluptatibus, sint repellat sunt in possimus ipsam nam libero, corrupti ipsa porro architecto quos rem esse exercitationem laboriosam. Quo harum, eius adipisci asperiores perferendis qui tenetur. A nostrum iure totam ad saepe blanditiis, eligendi et nisi perferendis laborum, ea quod incidunt temporibus! Quae eligendi beatae, eius temporibus ea nulla vitae molestias dolorem, eaque a unde mollitia expedita corporis aliquam voluptatem! Animi deserunt optio qui odio vero. Architecto, illum, veniam corrupti nam provident, quibusdam beatae doloribus iusto maxime deserunt sed recusandae cum odio nobis voluptatum quae eius impedit quidem eos tempore aliquid quaerat? Eos deleniti veritatis doloremque cum voluptatum obcaecati illo blanditiis labore qui, eveniet ipsa libero nostrum, tenetur odit optio ducimus consectetur! Asperiores, possimus? Et blanditiis ipsam in non ad, vero dolorem obcaecati, numquam qui quia animi! Mollitia qui perferendis nihil itaque ex ratione repellat excepturi ullam tenetur culpa? Iure excepturi voluptates necessitatibus sed pariatur, dignissimos quos modi magni enim illum, culpa voluptate neque eaque temporibus dolor nobis facere nam quidem voluptatem eos corrupti dicta. Deserunt amet voluptatum iure rerum necessitatibus earum consequatur iste ut. Rerum, laudantium. Ut laudantium nam debitis sapiente aspernatur, nihil repellendus. Ratione molestiae fuga soluta quaerat officiis dolorem odio delectus rem? Harum inventore placeat tenetur veniam, enim nostrum incidunt minus laudantium quaerat quis reprehenderit quas. At ab odit aut optio odio quisquam, veniam asperiores porro vero corrupti sint maxime ratione quas excepturi voluptatem. Veniam error quae atque aliquam! Saepe sit alias consectetur ducimus voluptas nesciunt culpa fuga fugiat corporis. Sunt explicabo ullam, tenetur minima ratione officia hic quis esse recusandae perspiciatis, dolorem iure ea voluptates cum magnam officiis earum vero facilis ut ex provident deserunt iusto natus commodi. Pariatur iste in ab a, cum architecto quidem dolores quam ducimus culpa excepturi illo ullam blanditiis omnis ipsum? Hic eum labore quod possimus numquam minima earum atque voluptatibus dolore, deserunt similique consequatur laudantium in nemo qui iure, iste quasi incidunt cum? Vitae beatae dolor odit, hic, numquam atque nam officiis esse distinctio ex perspiciatis recusandae voluptates? Explicabo odit officiis dignissimos distinctio nemo, obcaecati quo alias tempora, rerum minima cum repellendus blanditiis illum ex eum voluptas sint fugit aperiam. Tempore doloremque eligendi hic voluptatem ratione harum ab non nesciunt corrupti quidem aliquam natus, aspernatur quae, obcaecati eum, molestias consectetur sequi quaerat voluptates consequuntur tempora corporis soluta dolore illo! Soluta ratione, a eius reprehenderit tenetur quae nisi voluptatibus enim omnis sequi! Exercitationem deleniti soluta cumque aliquam nam expedita provident, cupiditate nihil adipisci quibusdam voluptatum. Dolor sed unde esse expedita obcaecati, magni porro cum eligendi? Qui recusandae quo voluptatum consequatur rerum eos placeat ea suscipit est quae dolor voluptate, consequuntur ipsum amet sit eius accusamus sunt ratione sint, aperiam dolorum porro obcaecati quis. Dolore, dolores numquam perspiciatis neque ab quos, a distinctio incidunt vitae quisquam, labore modi! Blanditiis culpa, reiciendis distinctio tempore perspiciatis et sequi! Cumque beatae impedit optio possimus modi asperiores tempora doloribus molestias, voluptates quia esse sit repellat rem nemo delectus quisquam aliquam! Iste animi aspernatur facere laudantium corporis veritatis expedita quos itaque dolor distinctio id nemo, nihil, explicabo vitae maxime sunt aliquam deserunt incidunt atque. Sunt ut dicta illum eos velit cumque fuga voluptatibus laudantium pariatur praesentium obcaecati qui laborum, amet iure voluptate eaque. Molestiae nemo quo mollitia, commodi libero reiciendis reprehenderit explicabo. Quas odit aliquid, ipsa, consectetur repudiandae quam sapiente illo laboriosam itaque tenetur ea voluptatibus in quis et obcaecati tempora doloribus id suscipit ratione. At fugit eveniet ducimus sed quod numquam doloribus aspernatur corrupti aliquam? Reiciendis laboriosam molestias vel at odio consectetur itaque qui, sint non, culpa voluptatem doloremque cumque eligendi iure? Commodi impedit facilis dolorem aliquam aut necessitatibus illo vero voluptate, a distinctio officiis cupiditate magni enim corporis veritatis ratione suscipit? Sapiente, excepturi inventore ad facere magni animi enim assumenda facilis! Quisquam hic nemo quia suscipit, ex dignissimos autem libero dolore ducimus sapiente deserunt error nobis nisi voluptatum cupiditate soluta reprehenderit qui earum provident, voluptatibus tenetur? Maiores dolorum amet optio illum quo! Unde similique laudantium quo incidunt dolore recusandae laborum atque dicta qui soluta magni provident commodi molestiae, ipsam, perferendis ipsa, iste tenetur expedita rerum velit magnam. Aliquam nobis vel id at ullam provident cumque fugiat et, fugit quae fuga nesciunt dolorem nemo possimus inventore vero ratione ad assumenda asperiores aliquid. Eaque possimus expedita quod eos dolores voluptatibus facilis nam amet inventore perspiciatis in eius, aliquid, repellat voluptas doloremque optio dolorem nulla facere. Temporibus ratione ipsum iusto id, nam assumenda dicta, beatae eaque et animi non quos laborum velit expedita quis quibusdam, saepe reprehenderit excepturi ab ipsam quasi? Tempore ipsam cumque reprehenderit necessitatibus fugiat, tenetur officia inventore eum consequuntur, error maiores nemo illo aut ducimus voluptates quis. Optio debitis ipsa, illo autem repellendus accusantium tempora, voluptas labore laudantium fugit quisquam praesentium neque doloribus distinctio sit hic, aliquam reprehenderit quo quas fugiat natus minima sapiente! Eius fuga dolore dignissimos nam tempore. Consequatur natus neque sunt necessitatibus maxime dolore, voluptates cumque laborum culpa iste dignissimos unde, nobis quos ipsam aliquam fugiat distinctio laboriosam voluptate magnam enim harum et adipisci at? Doloribus repellat tempora, amet dolore aut voluptate officia eius harum necessitatibus alias fugiat quisquam obcaecati earum, molestiae vel vitae tempore assumenda quia voluptates quaerat. Alias maiores nihil, dignissimos necessitatibus ducimus consectetur laudantium quo recusandae distinctio obcaecati ea ullam earum eveniet debitis libero consequuntur mollitia. Reprehenderit autem nisi debitis, corporis sapiente nemo et illo facere totam reiciendis quo aliquid corrupti nobis deleniti voluptatibus! Eum neque ut esse laborum. Animi impedit ipsa id totam, fugiat asperiores adipisci beatae suscipit explicabo quasi enim cupiditate, voluptates sed optio autem a incidunt quas architecto quo ut illum voluptas repellendus? Nisi maxime dolorem dolor, accusamus exercitationem possimus.
        </div>
        -->
    </div>
</div>


<script>
//console.log("%%@@");
     //   console.log(t.value);
      
  //   document.querySelector("#info .modal-title").innerText = Reserveid;
     //   console.log(name);
        
     let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/dash.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      var f=24;
      var e=21;

        xhr.onload = function(){
          console.log(this.responseText)
          myArray= this.responseText.split("f");
          console.log(myArray[0]);
          e = myArray[0];
          f =myArray[1];
      //      if(this.responseText!=0){
         //   document.getElementById('room-info-dataRo').innerHTML = this.responseText;
      //      }
       //     else{
         //       document.getElementById('room-info-dataRo').innerHTML = "NO Data!";
       //     }
        }

        xhr.send('dash='+"1");


var xValues = ["Empty", "Full",""];
var yValues = [e, f,0];
var barColors = ["red", "green", "yellow"];
console.log(yValues);

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Rooms"
    }
  }
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>