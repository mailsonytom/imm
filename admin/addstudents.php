<?php include 'connect.php' ?>
<?php session_start();
if (!isset($_SESSION['admin'])) {
    echo '<script type="text/javascript">
                window.location = "signin.php"
                 </script>';
}
if (!isset($_SESSION['course']) || $_SESSION['course'] < 1) {
    echo '<script type="text/javascript">
    window.location = "selectcourse.php"
     </script>';
} else {
    $course_id = $_SESSION['course'];
    $name = $admno = $father = $mother = $address = $phone = $error = "";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (empty($_POST['name']) || empty($_POST['admno']) || empty($_POST['father']) || empty($_POST['mother']) || empty($_POST['address']) || empty($_POST['phone']) || empty($_POST['email'])) {
            $error = "Please fill out all the fields";
        } else {
            $name = $_POST['name'];
            $admno = $_POST['admno'];
            $father = $_POST['father'];
            $mother = $_POST['mother'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $sql = "INSERT INTO students (name, admn_no, father_name, mother_name, address, phone, email, course_id, sem_id)
            VALUES ('$name', '$admno', '$father', '$mother', '$address', '$phone', '$email', '$course_id', '1')";
            $result = mysqli_query($conn, $sql);
            $error = $name." entered successfully into records";
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
            <div class="row">
                <div class="col-md-6 offset-3 text-center mt-4">
                    <h2>Enter Student Details</h2>
                </div>
                <div class="col-md-8 offset-2 form-group mt-2">
                    <span class="error"> <?php echo $error; ?></span>
                    <form action="" method="POST">
                        <label class="mt-3">Student Name</label>
                        <input type="text" name="name" value="" class="form-control" />
                        <label class="mt-3">Admission Number</label>
                        <input type="text" name="admno" value="" class="form-control" />
                        <label class="mt-3">Father's Name</label>
                        <input type="text" name="father" value="" class="form-control" />
                        <label class="mt-3">Mother's Name</label>
                        <input type="text" name="mother" value="" class="form-control" />
                        <label class="mt-3">Home Address</label>
                        <input type="text" name="address" value="" class="form-control" />
                        <label class="mt-3">Phone</label>
                        <input type="text" name="phone" value="" class="form-control" />
                        <label class="mt-3">Email</label>
                        <input type="email" name="email" value="" class="form-control" />
                        <br>
                        <input type="submit" name="submit" value="Submit and enter next" class="form-control btn btn-secondary" />
                    </form>
                </div>
            </div>
        </div>
    </body>
<?php
}
?>

    </html>