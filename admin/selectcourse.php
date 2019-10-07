<?php include 'connect.php'?>
<?php session_start();
if (!isset($_SESSION['admin'])) {
    echo '<script type="text/javascript">
                window.location = "signin.php"
                 </script>';
}
else{
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $_SESSION['course'] = $_POST['course'];
        echo '<script type="text/javascript">
                    window.location = "addstudents.php"
                     </script>';
       }
    else{
        $course_sql = "SELECT * FROM course";
        $course_result = mysqli_query($conn, $course_sql);
        while($row = mysqli_fetch_assoc($course_result)){
            $course_data[] = $row;
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
        <div class="row mt-5">
            <div class="col-md-6 offset-3 text-center">
                <h3>Select the course</h3>
            </div>
            <div class="col-md-6 offset-3 form-group mt-5">
                <form action="" method="POST">
                    <select class="form-control" name="course">
                        <?php
                        foreach($course_data as $a){
                            echo "<option value='".$a['id']."'>".$a['course_name']."</option>";
                        }
                        ?>
                    </select>
                    <input type="submit" value="Submit" class="form-control btn btn-primary mt-4" />
                </form>     
            </div>
        </div>
    </div>
</body>
<?php
}
?>
</html>