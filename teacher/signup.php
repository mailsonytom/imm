<?php include 'connect.php' ?>
<?php
    $name = $gender = $age = $email = $password = $phone = $qual = $rank = "";
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $flag = 0;
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $qual = $_POST['qual'];
        $rank = $_POST['rank'];
        $select_query = "SELECT * FROM teacher_details";
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
        $sql = "INSERT INTO teacher_details (name, gender, age, email, password, phone, qualification, rank) VALUES ('$name', '$gender', '$age', '$email', 'password', '$phone', '$qual', '$rank')";
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