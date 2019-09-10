<?php include 'connect.php'?>
<?php session_start();
if (!isset($_SESSION['user_id'])) {
    echo '<script type="text/javascript">
                window.location = "signin.php"
                 </script>';
} else {
      $teacher_id = $_SESSION['user_id'];
      $sql = "SELECT subject, subject.id, sem, course_name, sem_id, course_id, teacher_id FROM subject 
      INNER JOIN teacher_subject ON subject.id = teacher_subject.subject_id 
      INNER JOIN semester ON subject.sem_id = semester.id
      INNER JOIN course ON subject.course_id = course.id
      WHERE teacher_subject.teacher_id='$teacher_id'";
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
      }
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      $_SESSION['course'] = $_POST[course];
      $_SESSION['sem'] = $_POST[sem];
      $_SESSION['subject'] = $_POST[subject];
      echo '<script type="text/javascript">
                    window.location = "addmarks.php"
                    </script>';
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
                        <button class="btn btn-outline-warning">Sign up</button>
                    </li>
                    <li class="nav-item mr-2">
                        <button class="btn btn-outline-warning">I'm a student</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<div class="container">
  <div class="row">
    <div class="col-md-6 offset-3 mt-5">
      <h3 class="text-center">Select Course, Semester, and Subject</h3>
    </div>
  </div>
  <form action="" method="POST">
    <div class="row form-group mt-5">      
      <label class="col-md-3 mt-5">Course</label>
      <select class="col-md-3 mt-5 form-control" name="course">
        <?php
          $last_course = 0;
          foreach ($data as $row){
            if($last_course == $row['course_id']){
              continue;
            }
            echo "<option value='".$row['course_id']."'>".$row['course_name']."</option>";
            $last_course = $row['course_id'];
          }
        ?>
      </select>
      <label class="col-md-3 mt-5">Semester</label>
      <select class="col-md-3 mt-5 form-control" name="sem">
        <?php
          $last_sem = 0;
          foreach ($data as $row){
            if($last_sem == $row['sem_id']){
              continue;
            }
            echo "<option value='".$row['sem_id']."'>".$row['sem']."</option>";
            $last_sem = $row['sem_id'];
          }
        ?>
      </select>
      <label class="col-md-3 mt-5">Subject</label>
      <select class="col-md-3 mt-5 form-control" name="subject">
        <?php
          foreach ($data as $row){
            echo "<option value='".$row['id']."'>".$row['subject']."</option>";
          }
        ?>
      </select>
      <div class="col-md-4 mt-5">
      <input type="submit" class="btn btn-primary" value="Submit" />
      </div>
    </div>
  </form>
</div>
</body>
<?php
}
?>

</html>
