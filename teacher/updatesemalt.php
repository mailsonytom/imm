<?php include 'connect.php'?>
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    echo '<script type="text/javascript">
                window.location = "signin.php"
                 </script>';
}
else{
    $id = $_GET['id'];
    $sem_id = (int)$_GET['sem'] + 1;
    $sem_id ++;
    $sql = "UPDATE students SET sem_id='$sem_id' WHERE id=".$id;
    $result = mysqli_query($conn, $sql);
    echo '<script type="text/javascript">
            window.location = "updatesem.php"
            </script>';

}
?>