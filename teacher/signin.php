<?php include 'connect.php' ?>
<?php
session_start();
if (isset($_SESSION['teacher'])) {
    include 'logout.php';
} else {
    $username = $password = $error = "";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM teachers WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        if ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password']) && $row['verified'] == 1) {
                $_SESSION['teacher'] = $row['id'];
                echo '<script type="text/javascript">
                window.location = "teacherdashboard.php"
                 </script>';
            }elseif($row['verified'] == 0){
                $error = "Your account is not verified. Please contact the administrator";
            } 
            else {
                $error = "Wrong password.";
            }
        } else {
            $error = "Wrong username.";
        }
    }
}
?>
<html>
<title>Internal Mark Management</title>
<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark p-3">
        <div class="container">
            <a class="navbar-brand brand font-weight-bold" href="">IMM</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mr-2">
                        <a href="signup.php"><button class="btn btn-outline-warning">Sign up</button></a>
                    </li>
                    <li class="nav-item mr-2">
                        <a href="../student/" class="btn btn-outline-warning">I'm a student</a>
                    </li>
                    <li class="nav-item mr-2">
                        <a href="../admin/"><button class="btn btn-outline-warning">Admin</button></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-4 cred-container">
                <div class="col-md-12 text-center text-info">
                    <h3>Teacher Sign in</h3>
                </div>
                <span class="error"><?php echo $error; ?></span>
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit" />
                </form>
            </div>
        </div>
    </div>
</body>

</html>