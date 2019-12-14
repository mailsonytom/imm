<?php include 'connect.php' ?>
<?php
session_start();
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (isset($_SESSION['teacher'])) {
    include 'logout.php';
} else {
    $email = $password = $name = $gender = $dob = $error = "";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $error = "";
        if (empty($_POST["name"])) {
            $error = "Name is required";
            $flag = 1;
        } else {
            $name = test_input($_POST['name']);
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $flag = 1;
                $error = "Only letters and white space allowed";
            }
        }
        if (empty($_POST["email"])) {
            $error = "Email is required";
            $flag = 1;
        } else {
            $email = test_input($_POST['email']);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL, $email)) {
                $flag = 1;
                $error = "Wrong email format";
            }
        }
        $gender = $_POST['gender'];
        if (empty($_POST["password"])) {
            $error = "Password is required";
            $flag = 1;
        } else {
            $password = test_input($_POST['password']);
        }
        $dob = $_POST['dob'];
        if (!$flag) {
            $sql = "INSERT INTO teachers (name, username, password, verified, gender, dob) VALUES ('$name', '$email', '$password', '0', '$gender', '$dob')";
            $result = mysqli_query($conn, $sql);
            echo '<script type="text/javascript">
                window.location = "signin.php"
                    </script>';
        }
    }
}
?>
<html>
<title>Internal Mark Management</title>
<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
<link href="../assets/css/bootstrap-datepicker.min.css" rel="stylesheet" />
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark p-3">
        <div class="container">
            <a class="navbar-brand brand font-weight-bold" href="">IMM</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mr-2">
                        <a href="signin.php" class="btn btn-outline-warning">Sign in<a />
                    </li>
                    <li class="nav-item mr-2">
                        <a href="../student/" class="btn btn-outline-warning">I'm a student<a />
                    </li>
                    <li class="nav-item mr-2">
                        <a href="../parent/" class="btn btn-outline-warning">I'm a parent<a />
                    </li>
                    <li class="nav-item mr-2">
                        <a href="../admin/" class="btn btn-outline-warning">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid teacher-bg-signup">
        <div class="row">
            <div class="col-md-4 offset-4 cred-container">
                <div class="col-md-12 text-center text-light">
                    <h3>Teacher Sign up</h3>
                </div>
                <span class="error"><?php echo $error; ?></span>
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label>Gender</label><br>
                        <input type="radio" name="gender" value="male" checked> Male
                        <input type="radio" name="gender" value="female"> Female
                    </div>
                    <div class="form-group">
                        <label>Date of birth</label>
                        <input type="text" name="dob" class="form-control w-100" data-date-format="yyyy/mm/dd" id="dob_datepicker" placeholder="Enter date of birth">
                    </div>
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit" />
                </form>
            </div>
        </div>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap-datepicker.min.js"></script>
    <script src="../assets/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <style type="text/css">
        .datepicker {
            font-size: 0.875em;
        }

        .datepicker .table-condensed {
            color: black;
        }

        /* solution 2: the original datepicker use 20px so replace with the following:*/

        .datepicker td,
        .datepicker th {
            width: 1.5em;
            height: 1.5em;
        }
    </style>
    <script type="text/javascript">
        $('#dob_datepicker').datepicker({
            weekStart: 1,
            daysOfWeekHighlighted: "6,0",
            autoclose: true,
            todayHighlight: true,
            endDate: '+1d'
        });
        
        $('#dob_datepicker').datepicker("setDate", new Date());
        var date_diff_indays = function(date1, date2) {
            dt1 = new Date(date1);
            dt2 = new Date(date2);
            return Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate())) / (1000 * 60 * 60 * 24));
        }
    </script>
    <?php include '../footer.php'; ?>
</body>

</html>