<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Home</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">

    
        <link href="https://fonts.googleapis.com/css2?family=MonteCarlo&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css">
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

<!-- footer start -->
<footer class="footer" id="footer">
    <div class="container" style="color: white;">
        <div class="row">
            <div class="footer-item" data-aos="fade-up">
                <h3>Our Location</h3>
                <p>xyz Street, sector-12, <br> New Delhi - 000 ****</p>
            </div>
            <div class="footer-item" data-aos="fade-up">
                <h3>opening hours</h3>
                <p>Monday to Sunday <br> 9:00 AM - 10:00 PM </p>
            </div>
            <div class="footer-item" data-aos="fade-up" ">
                <h3>contact us</h3>
                <p>91 9654 293 ***</p>
                <p>info@gmail.com</p>
                <div class="social-links">
                    <a href="">
                        <i class="fab fa-facebook-f">
                        </i>
                    </a>
                    <a href="Home.html">
                        <i class="fab fa-twitter">
                        </i>
                    </a>
                    <a href="#">
                        <i class="fab fa-linkedin-in">
                        </i>
                    </a>
                    <a href="#">
                        <i class="fab fa-instagram">
                        </i>
                    </a>
                    <a href="#">
                        <i class="fab fa-youtube">
                        </i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="copyright">
                &copy; 2021 - Designed by The Webshale
            </div>
        </div>
    </div>
</footer>
<!-- footer end -->

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