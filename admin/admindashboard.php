<?php include 'connect.php' ?>
<?php session_start();
if (!isset($_SESSION['admin'])) {
    echo '<script type="text/javascript">
                window.location = "signin.php"
                 </script>';
} else {
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
                            <a href="logout.php"><button class="btn btn-outline-warning">Sign out</button></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-3 text-center mt-4">
                    <h2>Admin Dashboard</h2>
                </div>
                <div class="row mt-5">
                    <div class="card col-md-5">
                        <div class="card-body">
                            <h5 class="card-title">Add Students</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Add new students arrived in S1</h6>
                            <p class="card-text">As the admin of the protal you will be able to add new students to any course into the first semester of the course.
                            </p>
                            <a href="selectsub.php" class="card-link btn btn-primary">Click here to start</a>
                        </div>
                    </div>
                    <div class="card col-md-5 offset-2">
                        <div class="card-body">
                            <h5 class="card-title">Update Students</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Update the semester of the passed students</h6>
                            <p class="card-text">As the admin of the protal you will be able to update the students pass from one semester.
                            </p>
                            <a href="selectsem.php" class="card-link btn btn-primary">Click here to start</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </body>
<?php
}
?>

    </html>