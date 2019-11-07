<?php include 'connect.php' ?>
<?php
session_start();
if (!isset($_SESSION['admin'])) {
    echo '<script type="text/javascript">
                window.location = "signin.php"
                 </script>';
} else {
    if (isset($_GET['id']) && isset($_GET['sem'])) {
        $id = $_GET['id'];
        $sem_id = $_GET['sem'];
        $semsql = "SELECT id FROM semester where id =" . $sem_id;
        $semresult = mysqli_query($conn, $semsql);
        $row = mysqli_fetch_assoc($semresult);
        $sem = $row['id'];
        $sem++;
        $sql = "UPDATE students SET sem_id='$sem' WHERE id=" . $id;
        $result = mysqli_query($conn, $sql);
        echo '<script type="text/javascript">
                window.location = "updatesem.php"
                </script>';
    } else {
        echo '<script type="text/javascript">
                window.location = "selectsem.php"
                </script>';
    }
}
?>