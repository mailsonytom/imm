<?php include 'connect.php' ?>
<?php session_start();
if (!isset($_SESSION['admin'])) {
    echo '<script type="text/javascript">
                window.location = "signin.php"
                 </script>';
}

$course_id = $_SESSION['course'];
$sem_id = $_SESSION['sem'];
$sql = "SELECT id, name, verified FROM teachers";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['verified'] == 1) {
        $verfied_teachers[] = $row;
    } else {
        $unverfied_teachers[] = $row;
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
                <h3 class="text-center">List of Teachers</h3>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-6">
                <h4>Unapproved list</h4>
                <?php
                foreach($unverfied_teachers as $u){ 
                    ?>
                    <div class="alert alert-info" role="alert">
                    <?php echo $u['name']; ?>
                    <a href="approveteacher.php?id=<?php echo $u['id'];?>" class="badge badge-success ml-5">Click here to approve</a>
                </div>
                <?php 
                }
                ?>
            </div>
            <div class="col-md-6">
            <h4>Approved list</h4>
            <?php
                foreach($verfied_teachers as $u){?>
                    <div class="alert alert-success" role="alert">
                    <?php echo $u['name']; ?>
                </div>
                <?php }
                ?>
            </div>
        </div>
    </div>

</body>
<?php
?>

</html>