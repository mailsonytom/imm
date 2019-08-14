<?php include 'connect.php' ?>
<?php
    $name = $batch = $email = $password = $phone = "";
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $flag = 0;
        $name = $_POST['name'];
        $batch = $_POST['batch'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $select_query = "SELECT * FROM student_details";
    $result = mysqli_query($conn, $select_query);
    while($row=mysqli_fetch_assoc($result)){
        if($row['email'] == $username){
        $flag = 1;
            echo '<script type="text/javascript">
                    window.location = "user_duplicate_error.php"
                    </script>';
        }
    }
    if($flag == 0){
        $sql = "INSERT INTO student_details (name, batch, email, password, phone) VALUES ('$name', '$batch', '$email', 'password', '$phone')";
        if ($conn->query($sql) === TRUE) {
            echo '<script type="text/javascript">
                    window.location = "signin.html"
                    </script>';
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }
    }
}

?>