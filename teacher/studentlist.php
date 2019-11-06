<?php include 'connect.php'?>
<?php session_start();
if (!isset($_SESSION['user_id'])) {
    echo '<script type="text/javascript">
                window.location = "signin.php"
                 </script>';
}
else{
    $course_id = $_SESSION['course'];
    $sem_id = $_SESSION['sem'];
    $subject_id = $_SESSION['subject'];
    $sql = "SELECT id, name FROM students WHERE course_id='$course_id' AND sem_id='$sem_id'";
    $result = mysqli_query($conn, $sql);  
    while($row = mysqli_fetch_assoc($result)){
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
                        <button class="btn btn-outline-warning">Sign out</button>
                    </li>
                    <li class="nav-item mr-2">
                        <button class="btn btn-outline-warning">Add students</button>
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
                                <th class="text-center">Add comment</th>
                            </tr>
                        </thead>
                        
                        <tbody class="form-group">
                            <?php
                            foreach ($data as $row){
                            ?>
                            <tr>
                                <td class="col-md-6">
                                    <label class="form-control"><?php echo $row['name']; ?></label>
                                </td>
                                <td class="col-md-6">
                                    <a href="comment.php?id=<?php echo $row['id']?>" class="btn btn-primary form-control">Add comment</a>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>

</body>
<?php
}
?>
</html>