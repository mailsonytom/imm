<?php include 'connect.php' ?>
<?php session_start();
if (!isset($_SESSION['teacher'])) {
    echo '<script type="text/javascript">
                window.location = "signin.php"
                 </script>';
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $count = 0;
        foreach ($_POST['id'] as $a) {
            $sql = "UPDATE marks SET 
            marks=" . $_POST['marks'][$count] . " WHERE id=" . $a;
            $count++;
            $result = mysqli_query($conn, $sql);
        }
    }
    $course_id = $_SESSION['course'];
    $sem_id = $_SESSION['sem'];
    $subject_id = $_SESSION['subject'];
    $sql = "SELECT marks, marks.id, name, student_id FROM students 
    INNER JOIN marks ON students.id = marks.student_id
    WHERE course_id='$course_id'
    AND sem_id='$sem_id'
    AND marks.subject_id='$subject_id'";
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
            <div class="row">
                <div class="col-md-8 offset-2">
                    <form action="" method="POST">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Marks</th>
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
                                        <input type="hidden" name="id[]" value="<?php echo $row['id']; ?>" />
                                        <td class="col-md-6">
                                            <input type="text" name="marks[]" value="<?php echo $row['marks']; ?>" class="form-control" />
                                        </td>
                                    </tr>
                                <?php
                                    }
                                    ?>
                            </tbody>
                        </table>
                        <input type="submit" class="btn btn-primary" value="Submit" />
                    </form>
                </div>
            </div>
        </div>

    </body>
<?php
}
?>

    </html>