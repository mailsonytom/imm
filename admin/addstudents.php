<?php include 'connect.php' ?>
<?php session_start();
if (!isset($_SESSION['admin'])) {
    echo '<script type="text/javascript">
                window.location = "signin.php"
                 </script>';
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (!isset($_SESSION['course']) || $_SESSION['course'] < 1) {
    echo '<script type="text/javascript">
    window.location = "selectcourse.php"
     </script>';
} else {
    $course_id = $_SESSION['course'];
    $name = $admno = $father = $mother = $address = $phone = $error = "";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $flag = 0;
        if (empty($_POST["name"])) {
            $error = "Name is required";
            $flag = 1;
        } else {
            $name = test_input($_POST['name']);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $flag = 1;
                $error = "Only letters and white space allowed";
            }
        }
        if (empty($_POST["admno"])) {
            $error = "Admission number is required";
            $flag = 1;
        } else {
            $admno = test_input($_POST['admno']);
            if (!preg_match("/^[1-9][0-9]*$/", $admno)) {
                $flag = 1;
                $error = "Invalid admission number";
            }
            $select_query = "SELECT admn_no FROM students";
            $result = mysqli_query($conn, $select_query);
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['admn_no'] == $_POST['admno']) {
                    $error = "Admission number already exist";
                    $flag = 1;
                }
            }
        }
        if (empty($_POST["father"])) {
            $error = "Father's name is required";
            $flag = 1;
        } else {
            $father = test_input($_POST['father']);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $father)) {
                $flag = 1;
                $error = "Only letters and white space allowed";
            }
        }
        if (empty($_POST["mother"])) {
            $error = "Mother's name is required";
            $flag = 1;
        } else {
            $mother = test_input($_POST['mother']);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $mother)) {
                $flag = 1;
                $error = "Only letters and white space allowed";
            }
        }
        if (empty($_POST["address"])) {
            $error = "Address is required";
            $flag = 1;
        } else {
            $address = test_input($conn->real_escape_string($_POST['address']));
            // check if name only contains letters and whitespace
        }
        if (empty($_POST["phone"])) {
            $error = "Phone number is required";
            $flag = 1;
        } else {
            $phone = test_input($_POST['phone']);
            $parent_pass = password_hash($_POST['phone'], PASSWORD_DEFAULT);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[1-9][0-9]{9}$/", $phone)) {
                $flag = 1;
                $error = "Wrong phone number format";
            }
        }
        if (empty($_POST["email"])) {
            $error = "Email is required";
            $flag = 1;
        } else {
            $email = test_input($_POST['email']);
            // check if name only contains letters and whitespace
            if (!filter_var($email, FILTER_VALIDATE_EMAIL, $email)) {
                $flag = 1;
                $error = "Wrong email format";
            }
        }
        if ($flag == 0) {
            $sql = "INSERT INTO students (name, admn_no, father_name, mother_name, address, phone, email, course_id, sem_id, parent_pass)
            VALUES ('$name', '$admno', '$father', '$mother', '$address', '$phone', '$email', '$course_id', '1', '$parent_pass')";
            if (mysqli_query($conn, $sql)) {
                $error = $name . " entered successfully into records";
                $student_id = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id from students WHERE admn_no='$admno'"))['id'];
                $result = mysqli_query($conn, "SELECT id from subject WHERE sem_id=1");
                while ($row = mysqli_fetch_assoc($result)) {
                    $marksql = "INSERT INTO marks (student_id, subject_id, marks) VALUES ('$student_id', '" . $row['id'] . "', 0)";
                    mysqli_query($conn, $marksql);
                }
            } else {
                $error = "Something failed. Please try again.";
            }
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
        <?php include '../footer.php'; ?>
    </body>
<?php
}
?>

    </html>