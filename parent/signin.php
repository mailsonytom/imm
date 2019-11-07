<?php include 'connect.php' ?>
<?php
session_start();
if (isset($_SESSION['parent'])) {
    include 'logout.php';
} else {
    $username = $password = $error = "";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['admn_no'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM students WHERE admn_no = '$username'";
        $result = mysqli_query($conn, $sql);
        if ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['parent_pass'])) {
                $_SESSION['parent'] = $row['id'];
                $_SESSION['admno'] = $username;
                echo '<script type="text/javascript">
                window.location = "mark.php"
                 </script>';
            } else {
                $error = "Wrong password.";
            }
        } else {
            $error = "Wrong admission number.";
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
                        <a href="../student/" class="btn btn-outline-warning">I'm a student</a>
                    </li>
                    <li class="nav-item mr-2">
                        <a href="../teacher/" class="btn btn-outline-warning">I'm a teacher<a />
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-4 cred-container">
                <div class="col-md-12 text-center text-info">
                    <h3>Parent Sign in</h3>
                </div>
                <span class="error"><?php echo $error; ?></span>
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Admission number</label>
                        <input type="text" name="admn_no" class="form-control" placeholder="Enter admission number">
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