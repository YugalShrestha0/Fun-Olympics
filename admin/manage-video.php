<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("location:login-user.php");
    exit;
}

$message = '';

if (isset($_GET['video'])) {
    $video = $_GET['video'];
    $video_directory = "../assets/video/";

    // Delete the video file
    if (file_exists($video_directory . $video)) {
        unlink($video_directory . $video);
        $message = "Video deleted successfully!";
    } else {
        $message = "Video not found!";
    }
}

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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
        
        <style>
        body {
            background-color: #f1f5f8;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #2c3e50;
        }

        .navbar-brand {
            color: #fff;
            font-size: 24px;
        }

        .navbar-brand:hover {
            color: #ccc;
        }

        .navbar-nav .nav-link {
            color: #fff;
            font-size: 16px;
            text-transform: uppercase;
            padding-right: 15px;
        }

        .navbar-nav .nav-link:hover {
            color: #ccc;
        }

        .dashboard-container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .dashboard-title {
            font-size: 36px;
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .dashboard-button {
            display: block;
            width: 100%;
            max-width: 300px;
            margin: 0 auto;
            margin-bottom: 20px;
            text-align: center;
            padding: 15px;
            font-size: 18px;
            color: #fff;
            background-color: #2c3e50;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .dashboard-button:hover {
            background-color: #233140;
        }

        .dashboard-button i {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <!-- navbar start -->
    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: darkblue;">
        <a class="navbar-brand" href="upload-video.php">Upload Video/</a>
        <a class="navbar-brand" href="manage-video.php">Manage Video</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
            data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
            aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#"><?php echo $_SESSION['email']; ?> <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout-user.php">Log Out</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- navbar end -->

    <!-- dashboard start -->
    <div class="container-fluid" style="padding: 20px;">
        <h2 class="display-4">Uploaded Videos</h2>
        <div class="row">
            <?php
            $video_directory = "../assets/video/";
            $videos = scandir($video_directory);
            foreach ($videos as $video) {
                if ($video != "." && $video != "..") {
            ?>
            <div class="col-md-4">
                <div class="card mb-3">
                    <video controls style="width: 100%; height: 200px;">
                        <source src="<?php echo $video_directory . $video; ?>" type="video/mp4">
                    </video>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $video; ?></h5>
                        <a href="manage-video.php?video=<?php echo urlencode($video); ?>"
                            class="btn btn-danger btn-sm">Delete</a>
                    </div>
                </div>
            </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
    <!-- dashboard end -->
</body>

</html>
