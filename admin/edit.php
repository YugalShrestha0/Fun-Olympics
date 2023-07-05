<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("location:index.php");
    exit();
}

include 'connection.php';

if (isset($_POST['update'])) {
    $user_id = $_POST['user_id'];
    $role = $_POST['role'];
    $password = $_POST['password'];

    // Get the current role of the user
    $role_query = "SELECT role FROM usertable WHERE id = '$user_id'";
    $role_result = mysqli_query($con, $role_query);
    $current_role = mysqli_fetch_assoc($role_result)['role'];

    // Update the user details in the database
    $update_query = "UPDATE usertable SET password = '$password', role = '$role' WHERE id = '$user_id'";
    $update_result = mysqli_query($con, $update_query);

    if ($update_result) {
        // If the role was not changed, set it back to the current role
        if ($role == '') {
            $role = $current_role;
        }

        // User details updated successfully
        header("Location: user.php");
        exit();
    } else {
        // Error updating user details
        echo "Error updating user details.";
    }
}

if (isset($_POST['delete'])) {
    $user_id = $_POST['user_id'];

    // Delete the user from the database
    $delete_query = "DELETE FROM usertable WHERE id = '$user_id'";
    $delete_result = mysqli_query($con, $delete_query);

    if ($delete_result) {
        // User deleted successfully
        header("Location: user.php");
        exit();
    } else {
        // Error deleting user
        echo "Error deleting user.";
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <title>Main Dashboard</title>
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
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
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
            </div>
            <div class="col-md-8">
                <h2 class="display-4">View All Users</h2>

                <table class="table table-dark table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>user ID</th>
                            <th>email</th>
                            <th>password</th>
                            <th>status</th>
                            <th>role</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php
    $query = "SELECT * FROM usertable WHERE role = 'subscriber'";
    $run = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($run)) {
        $user_id = $row['id'];
        $email = $row['email'];
        $password = $row['password'];
        $status = $row['status'];
        $role = $row['role'];
    ?>
        <tr>
            <td scope="row"><?php echo $user_id; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $password; ?></td>
            <td><?php echo $status; ?></td>
            <td><?php echo $role; ?></td>

            <td>
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#editModal<?php echo $user_id; ?>">Edit</button>
    <!-- Edit Modal -->
    <div class="modal fade" id="editModal<?php echo $user_id; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password">
                        </div>
                        <div class="form-group">
                            <label for="role">Role:</label>
                            <select class="form-control" id="role" name="role">
                                <option value="subscriber" <?php if ($role == 'subscriber') echo 'selected'; ?>>Subscriber</option>
                                <option value="admin" <?php if ($role == 'administrator') echo 'selected'; ?>>Administrator</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <input type="text" class="form-control" id="status" name="status" value="<?php echo $status; ?>" readonly>
                        </div>
                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="update">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</td>
            <td>
                <form method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                    <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                </form>
            </td>
        </tr>
    <?php
    }
    ?>
</tbody>
                </table>

            </div>
        </div>
    </div>
    <!-- dashboard end -->
</body>

</html>
