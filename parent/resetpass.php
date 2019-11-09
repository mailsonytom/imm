<?php include 'connect.php' ?>
<?php session_start();
if (!isset($_SESSION['parent'])) {
    echo '<script type="text/javascript">
                window.location = "signin.php"
                 </script>';
} else {
    $password = $error = "";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (empty($_POST['password'])) {
            $error = "Password cannot be empty";
        } else {
            $id = $_SESSION['parent'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $sql = "UPDATE students SET parent_pass='$password' WHERE id=".$id;
            mysqli_query($conn, $sql);
            echo '<script type="text/javascript">
                window.location = "signin.php"
                 </script>';
        }
    }
    ?>
    <html>
    <title>Internal Mark Management</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg bg-dark p-3">
            <div class="container">
                <a class="navbar-brand brand font-weight-bold" href="">IMM</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mr-2">
                            <a href="logout.php" class="btn btn-danger">Sign out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-4 cred-container">
                    <div class="col-md-12 text-center text-info">
                        <h3>Reset Password</h3>
                    </div>
                    <span class="error"><?php echo $error; ?></span>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Enter new password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter new password ">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit" />
                    </form>
                </div>

            </div>
        </div>
        </div>

    </body>
<?php
}
?>

    </html>