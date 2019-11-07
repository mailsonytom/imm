<?php include 'connect.php' ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admn_no = $_POST['admno'];
    $sql = "SELECT * FROM marks INNER JOIN students ON marks.student_id=students.id INNER JOIN subject 
    ON marks.subject_id=subject.id WHERE students.admn_no='$admn_no' AND subject.sem_id=students.sem_id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
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
                        <a href="../teacher/" class="btn btn-warning">Teacher sign in</a>
                    </li>
                    <li class="nav-item mr-2">
                        <a href="../parent/" class="btn btn-warning">Parent sign in</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class=" col-md-4 mt-5 form-group">
                <form action="" method="POST">
                    <input class="form-control" placeholder="Enter admission number" type="text" name="admno" value="<?php echo $admn_no; ?>">
                    <input type="submit" class="form-control btn btn-primary mt-2" value="Get marks" />
                </form>
            </div>
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

</body>
<?php
?>

</html>