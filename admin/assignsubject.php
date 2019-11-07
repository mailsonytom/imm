<?php include 'connect.php' ?>
<?php session_start();
if (!isset($_SESSION['admin'])) {
    echo '<script type="text/javascript">
                window.location = "signin.php"
                 </script>';
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $teacher = $_POST['teacher'];
    $subject = $_POST['subject'];
    $sql = "SELECT * FROM teacher_subject WHERE teacher_id = '$teacher' AND subject_id = '$subject'";
    if(mysqli_num_rows(mysqli_query($conn, $sql)) == 0){
        $insert_sql = "INSERT INTO teacher_subject (teacher_id, subject_id) VALUES ('$teacher', '$subject')";
        mysqli_query($conn, $insert_sql);
    }
    
}
$course_id = $_SESSION['course'];
$sem_id = $_SESSION['sem'];
$teachers_sql = "SELECT * FROM teachers WHERE verified = 1";
$sub_sql = "SELECT * FROM subject";
$teachers_result = mysqli_query($conn, $teachers_sql);
$sub_result = mysqli_query($conn, $sub_sql);
while ($teacher_row = mysqli_fetch_assoc($teachers_result)) {
    $teachers_data[] = $teacher_row;
}
while ($sub_row = mysqli_fetch_assoc($sub_result)) {
    $sub_data[] = $sub_row;
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
            <div class="col-md-8 offset-2 mt-5">
                <h3 class="text-center">Assign subjects for teachers</h3>
            </div>
            <div class="col-md-8 offset-2">
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Select teacher</label>
                        <select class="form-control" name="teacher">
                            <?php
                            foreach ($teachers_data as $t) {
                                ?>
                                <option value="<?php echo $t['id']; ?>"><?php echo $t['name']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Select subject</label>
                        <select class="form-control" name="subject">
                            <?php
                            foreach ($sub_data as $s) {
                                ?>
                                <option value="<?php echo $s['id']; ?>"><?php echo $s['subject']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="form-control btn btn-success" type="submit" value="Add">
                    </div>
                </form>
            </div>
        </div>

    </div>

</body>
<?php
?>

</html>