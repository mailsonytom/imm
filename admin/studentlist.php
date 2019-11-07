<?php include 'connect.php' ?>
<?php session_start();
if (!isset($_SESSION['admin'])) {
    echo '<script type="text/javascript">
                window.location = "signin.php"
                 </script>';
}
if (!isset($_SESSION['previous']) || !$_SESSION['previous']) {
    echo '<script type="text/javascript">
    window.location = "semstudentlist.php"
     </script>';
} else {
    $_SESSION['previous'] = 0;
    $course_id = $_SESSION['course'];
    $sem_id = $_SESSION['sem'];
    $sql = "SELECT admn_no, name FROM students 
        WHERE course_id='$course_id'
        AND sem_id='$sem_id'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
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
                            <a href="dashboard.php" class="btn btn-warning">Admin Dashboard</a>
                        </li>
                        <li class="nav-item mr-2">
                            <a href="logout.php" class="btn btn-danger">Sign out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-2">
                    <div class="col-md-12 text-center">
                        <h3>List of Semester <?php echo $sem_id; ?> Students</h3>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">Name</th>
                                <th class="text-center">Admission number</th>
                            </tr>
                        </thead>

                        <tbody class="form-group">
                            <?php
                                foreach ($data as $row) {
                                    ?>
                                <tr>
                                    <td class="col-md-6">
                                        <label class="form-control"><?php echo $row['name']; ?></label>
                                    </td>
                                    <td class="col-md-6">
                                        <label class="form-control"><?php echo $row['admn_no']; ?></label>
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

    </body>
<?php
}
?>

    </html>