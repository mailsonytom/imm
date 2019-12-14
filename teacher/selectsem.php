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
                    window.location = "studentlist.php"
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
                            <a href="teacherdashboard.php" class="btn btn-warning">Teacher Dashboard</a>
                        </li>
                        <li class="nav-item mr-2">
                            <a href="logout.php" class="btn btn-danger">Sign out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-6 offset-3 text-center">
                    <h3>Select the course</h3>
                </div>
                <div class="col-md-6 offset-3 form-group mt-5">
                    <form action="" method="POST">
                        <select class="form-control" name="course">
                            <?php
                                foreach ($course_data as $a) {
                                    echo "<option value='" . $a['id'] . "'>" . $a['course_name'] . "</option>";
                                }
                                ?>
                        </select>
                        <select class="form-control mt-5" name="sem">
                            <?php
                                foreach ($sem_data as $b) {
                                    echo "<option value='" . $b['id'] . "'>" . $b['sem'] . "</option>";
                                }
                                ?>
                        </select>
                        <input type="submit" value="Submit" class="form-control btn btn-primary mt-4" />
                    </form>
                </div>
            </div>
        </div>
        <?php include '../footer.php'; ?>
    </body>
<?php
}
?>

    </html>