<?php 
session_start();
if(!isset($_SESSION['email']))
{
    header("location:login-user.php");
}
else
{
?>
<!doctype html>
<html lang="en">
  <head>
    
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Welcome to FunOlympics 2023 - Yokyo</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Gp
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Introduction of Coderly Media Creation, Services, Contact, Online Order, Online Payment">
    <meta name="keywords" content="Coderly Media Creation, Services, Contact, Online Order, Online Payment">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/favicon.PNG" type="image/x-icon">
    <link rel="stylesheet" href="css/mystyle.css">
  </head>



  <body>
    <!-- navbar start -->
   

<body>

    <!-- ======= Header ======= -->
    
    <!-- ======= Breadcrumbs ======= -->
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Video Gallery</h2>
          <ol>
            <li><a href="home.php">Home</a></li>
            <li>Video</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->


              
    <!-- navbar end -->

    <!-- content start -->
    <div class="container" style="padding: 40px;">
    <div class="row">
        <div class="col-md-9">
            <?php
            $dir = glob('assets/video/{*.mp4}', GLOB_BRACE);
            $count = 0;
            foreach ($dir as $value) {
                if ($count % 2 == 0) {
                    // Start a new row for every even count
                    echo '<div class="row">';
                }
                ?>
                <div class="col-md-6" style="margin-bottom: 20px;">
                    <a href="<?php echo $value; ?>" target="_blank">
                        <video src="<?php echo $value; ?>" alt="HNP" width="100%" height="300px" controls>
                            <source src="<?php echo $value; ?>" type="video/mp4">
                            <source src="<?php echo $value; ?>" type="video/ogg">
                        </video>
                    </a>
                </div>

                <?php
                if ($count % 2 != 0 || $count == count($dir) - 1) {
                    // Close the row for every odd count or when reaching the last video
                    echo '</div>';
                }
                $count++;
            }
            ?>
        </div>
    </div>
</div>


    <div class="container">
    <h2 class="display-4"> Comment:</h2>
    </div>
    <!-- comment to start display -->
    <?php
                include 'connection.php';
                $query="select * from comment order by rand() LIMIT 5";
                $run=mysqli_query($con,$query);
                while($row=mysqli_fetch_array($run))
                {
                    $a=$row['id'];
                    $b=$row['email'];
                    $c=$row['date'];
                    $d=$row['comment'];
                    $e=$row['rate'];
                ?>
      <div class="container">
        
        <div class="row" style="margin:20px 0px; border:2px solid gray;">
          <div class="col-sm-2" style="text-transform:uppercase; display:block; background-color:#000; padding:10px; font-size:12px; font-weight:bold; color:#fff; text-align:center; border:2px solid gray;"><?php echo $b; ?></div>
          <div class="col-sm-6" style="text-transform:uppercase; display:block; background-color:gray; padding:10px; font-size:12px; font-weight:bold; color:#fff; border:2px solid gray;"><?php echo $d; ?></div>
          <div class="col-sm-2" style="text-transform:uppercase; display:block; background-color:gray; padding:10px; font-size:12px; font-weight:bold; color:#fff; border:2px solid gray;"><?php echo $c; ?></div>
          <div class="col-sm-2" style="text-transform:uppercase; display:block; background-color:black; padding:10px; font-size:12px; font-weight:bold; color:#fff; border:2px solid gray;" ><?php 
          if($e==1)
          {
          ?>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
          <?php
          }
          else if($e==2)
          {
          ?>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
          <?php 
          }
          else if($e==3)
          {
          ?>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
          <?php 
          }
          else if($e==4)
          {
          ?>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star"></span>
          <?php  
          }
          else if($e==5)
          {
          ?>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <?php 
          }
          ?>

        </div>
        </div>
      </div>
      <?php 
                }
                ?>
    <!-- comment end to display -->
    <!-- comment start  -->
    <div class="container" style="padding:10px">
    <h2> Review:</h2>
    <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="content"></label>
                  <textarea class="form-control" name="comment" id="content" rows="3" placeholder="Comment" required></textarea>
                </div>
                <div class="form-group">
                  <label for="Rating">Rating:</label>
                  <input type="text" class="form-control" name="rate" id="" aria-describedby="helpId" placeholder="1 to 5">
                </div>
                <button type="submit" class="btn btn-primary btn-lg" name="submit">Comment</button>
                <button type="reset" class="btn btn-danger btn-lg">Cancel</button>
    </form>
    <?php
    if(isset($_POST['submit']))
    {
      include 'connection.php';
      $email=$_SESSION['email'];
      $date=date('Y/m/d');
      $com=$_POST['comment'];
      $rate=$_POST['rate'];
      $query="insert into comment(email,date,comment,rate)values('$email','$date','$com','$rate')";
      $run=mysqli_query($con,$query);
      if($run)
                {
                    echo "<script>window.alert('Comment Added Successfully!')</script>";
                    echo "<script>window.open('video-gallery.php','_self')</script>";
                    
                }
                else
                {
                    echo "<script>window.alert('Error Found!')</script>";
                }
    }
    ?>
    </div>
    <!-- comment end -->
  
  </body>
</html>
<?php 
}
?>