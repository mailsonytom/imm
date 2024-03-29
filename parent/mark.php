<?php include 'connect.php' ?>
<?php session_start();
if (!isset($_SESSION['parent'])) {
    echo '<script type="text/javascript">
                window.location = "signin.php"
                 </script>';
} else {
    $admn_no = $_SESSION['admno'];
    $namesql = "SELECT name FROM students WHERE admn_no='$admn_no'";
    $nameresult = mysqli_query($conn, $namesql);
    $namerow = mysqli_fetch_assoc($nameresult);
    $sname = $namerow['name'];
    $sql = "SELECT * FROM marks INNER JOIN students ON marks.student_id=students.id INNER JOIN subject 
    ON marks.subject_id=subject.id WHERE students.admn_no='$admn_no' AND subject.sem_id=students.sem_id";
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
                            <a href="comment.php" class="btn btn-outline-warning">Comment</a>
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
                <h3>Student Name: <?php echo $sname; ?></h3>
            </div>
            <div class="row">

                <table class="table">
                    <div class="col-md-8 offset-2 mt-5">
                        <h3 class="text-center">Marks</h3>
                    </div>
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Subject</th>
                            <th scope="col" class="text-center">Mark</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($data as $d) {
                                ?>
                            <tr>
                                <td class="text-center"><?php echo $d['subject'] ?></td>
                                <td class="text-center"><?php echo $d['marks'] ?></td>
                            </tr>
                        <?php
                            }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
        <?php include '../footer.php'; ?>
    </body>
<?php
}
?>

    </html>