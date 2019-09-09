<?php include 'connect.php' ?>
<?php
	session_start();
    $username = $password = "";
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $username = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM teachers WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        if($row=mysqli_fetch_assoc($result)){
            if(password_verify($password, $row['password'])){
                $_SESSION['user_id'] = $row['id'];
                echo '<script type="text/javascript">
                window.location = "selectsub.php"
                 </script>';
            }
            else{
                    echo "Wrong password. <a href='signin.php'>Click here to try again.</a>";  
            }
        }
        else{
                echo "Wrong username. <a href='signin.php'>Click here to try again.</a>";
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
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid home-cover">
        <div class="row">
            <div class="col-md-4 offset-4 cred-container">
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