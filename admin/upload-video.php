<?php 
session_start();
if(!isset($_SESSION['email']))
{
    header('location:login-user.php');
}
else
{
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Dashboard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
   <!-- navbar start -->
   <nav class="navbar navbar-expand-sm navbar-dark" style="background-color:darkblue;">
       <a class="navbar-brand" href="main.php">Dashboard</a>
       <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
           aria-expanded="false" aria-label="Toggle navigation"></button>
       <div class="collapse navbar-collapse" id="collapsibleNavId">
           <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
               
               
           </ul>
           <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#" style="text-transform:uppercase"><?php echo $_SESSION['email']; ?> <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout-user.php">Log Out</a>
            </li>
           </ul>
           
           
       </div>
   </nav>
   <!-- navbar end -->
    <!-- dashboard start -->
    <div class="container-fluid" style="padding:20px">
    <div class="row">
        <div class="col-md-4" style="background-color:lightblue;">
            <h2 class="display-4 text-center">Dashboard</h2>
            
            <a href="user.php" class="btn btn-danger btn-block btn-lg">User</a>            
            <a href="view-comment.php" class="btn btn-danger btn-block btn-lg">View Comments</a>
            <a href="upload-video.php" class="btn btn-danger btn-block btn-lg">Upload Video</a>
            <a href="manage-video.php" class="btn btn-primary btn-block btn-lg mt-4">manage Video</a>
        </div>
        <div class="col-md-8">
            <h2 class="display-4">Upload Video</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="select">Select Video:</label>
                  <input type="file" class="form-control-file" name="video" id="video" placeholder="../video-gallery.php" aria-describedby="fileHelpId">
                </div>
                <button type="submit" class="btn btn-primary btn-lg" name="submit">Upload</button>
                <button type="reset" class="btn btn-danger btn-lg">Cancel</button>
            </form>
           <?php
           if (isset($_POST['submit'])) {
               if ($_FILES['video']['error'] === UPLOAD_ERR_NO_FILE) {
                   echo "Please upload a video.";
               } else {
                   $video_name = $_FILES['video']['name'];
                   $video_type = $_FILES['video']['type'];
                   $video_tmp = $_FILES['video']['tmp_name'];
                   $category = $_POST['category'];
                   $destination_folder = strtolower($category) . "_video/";

                   $existing_file_path = "../assets/video/$destination_folder/$video_name";
                   if (file_exists($existing_file_path)) {
                       unlink($existing_file_path); // Delete the existing file
                   }

                   move_uploaded_file($video_tmp, $existing_file_path);
                   echo "Video uploaded successfully!" . "<br>";
                   echo "$video_name";
               }
           }
           ?>
           
        </div>
    </div>        
    </div>
    <!-- dashboard end -->
  </body>
</html>
<?php
}
?>