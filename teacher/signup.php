<?php include 'connect.php' ?>
<?php
	session_start();
    $email = $password = $name = $gender = $dob = $error ="";
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $error = "";
        if(empty($_POST['name']) || empty($_POST['gender']) || empty($_POST['dob']) || empty($_POST['email']) || empty($_POST['password'])){
            $error = "Please fill in all the details";
        }
        if($error == ""){
            $email = $_POST['email'];
            $name = $_POST['name'];
            $gender = $_POST['gender'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $dob = $_POST['dob'];
            $sql = "INSERT INTO teachers (name, username, password, verified, gender, dob) VALUES ('$name', '$email', '$password', '0', '$gender', '$dob')";
            $result = mysqli_query($conn, $sql);
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
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark p-3">
        <div class="container">
            <a class="navbar-brand brand font-weight-bold" href="">IMM</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mr-2">
                        <button class="btn btn-outline-warning">Sign up</button>
                    </li>
                    <li class="nav-item mr-2">
                        <button class="btn btn-outline-warning">I'm a student</button>
                    </li>
                    <li class="nav-item mr-2">
                        <a href ="../admin/signin.php"><button class="btn btn-outline-warning">Admin</button></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container ">
        <div class="row">
            <div class="col-md-4 offset-4 cred-container">
                <div class="col-md-12 text-center text-info">
                    <h3>Teacher Sign up</h3>
                </div>
                <span class="error"><?php echo $error; ?></span>
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label>Gender</label><br>
                        <input type="radio" name="gender" value="male" checked> Male
                        <input type="radio" name="gender" value="female"> Female
                    </div>
                    <div class="form-group">
                        <label>Date of birth</label>
                        <input type="text" name="dob" class="form-control" placeholder="Enter date of birth">
                    </div>
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