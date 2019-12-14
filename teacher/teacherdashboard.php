<?php include 'connect.php' ?>
<?php session_start();
if (!isset($_SESSION['teacher'])) {
    echo '<script type="text/javascript">
                window.location = "signin.php"
                 </script>';
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $_SESSION['course'] = $_POST['course'];
        $_SESSION['sem'] = $_POST['sem'];
        echo '<script type="text/javascript">
                    window.location = "updatesem.php"
                     </script>';
    } else {
        $course_sql = "SELECT * FROM course";
        $sem_sql = "SELECT * FROM semester";
        $course_result = mysqli_query($conn, $course_sql);
        $sem_result = mysqli_query($conn, $sem_sql);
        while ($row = mysqli_fetch_assoc($course_result)) {
            $course_data[] = $row;
        }
        while ($row = mysqli_fetch_assoc($sem_result)) {
            $sem_data[] = $row;
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
                <div class="col-md-6 offset-3 text-center mt-4">
                    <h2>Teachers' Dashboard</h2>
                </div>
                <div class="row mt-5">
                    <div class="card col-md-5">
                        <div class="card-body">
                            <h5 class="card-title">Add marks</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Add marks to each student in your class</h6>
                            <p class="card-text">As a teacher you will be able to add marks for subjects assigned to you to each student in your class.
                                The marks will be seen by the students as well as the parents. </p>
                            <a href="selectsub.php" class="card-link btn btn-info">Students list</a>
                        </div>
                    </div>
                    <div class="card col-md-5 offset-2">
                        <div class="card-body">
                            <h5 class="card-title">View students</h5>
                            <h6 class="card-subtitle mb-2 text-muted">You can view the list of students</h6>
                            <p class="card-text">As a teacher you will be able to make comments on students' performances, which can be seen by their parents.
                                Also, you'll be able to view the list of students in each course, semester wise. </p>
                            <a href="selectsem.php" class="card-link btn btn-info">Students list</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include '../footer.php'; ?>
    </body>
<?php
}
?>

    </html>