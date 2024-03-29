<?php include 'connect.php' ?>
<?php session_start();
if (!isset($_SESSION['parent'])) {
    echo '<script type="text/javascript">
                window.location = "signin.php"
                 </script>';
} else {
    $student_id = $_SESSION['parent'];
    $teacher_id = 0;
    $comment_result = mysqli_query($conn, "SELECT * FROM comments WHERE student_id=" . $student_id);
    while ($row = mysqli_fetch_assoc($comment_result)) {
        $data[] = $row;
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $comment = $conn->real_escape_string($_POST['comment']);
        date_default_timezone_set("Asia/Calcutta");
        $commentdate = date('d-m-Y H:i:s');
        $sql = "INSERT INTO comments (student_id, teacher_id, comment, date, comment_by) 
        VALUES ('$student_id', '$teacher_id', '$comment', '$commentdate', 'Parent')";
        $result = mysqli_query($conn, $sql);
        $comment_result = mysqli_query($conn, "SELECT * FROM comments WHERE student_id=" . $student_id);
        while ($row = mysqli_fetch_assoc($comment_result)) {
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
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item mr-2">
                                <a href="logout.php" class="btn btn-danger">Sign out</a>
                            </li>
                        </ul>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-6">
                    <?php foreach ($data as $a) {
                            ?>
                        <div class="card mt-1">
                            <div class="card-body">
                                <p class="card-text"><?php echo $a['comment']; ?></p>
                                <small><span class="text-info"><?php echo $a['comment_by']; ?></span><span class="text-info ml-5"><?php echo $a['date']; ?></span></small>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-md-6">
                    <form action="" method="POST">
                        <input type="text" name="comment" class="form-control comment-box" placeholder="You can type your comment here and submit" />
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