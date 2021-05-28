
<?php
session_start();
require_once 'db.php';
$id = base64_decode($_GET['id']);
$data = "SELECT * FROM task_table WHERE id=$id";
$data_from_db = $dbcon->query($data);
$f_result = $data_from_db->fetch_assoc();
$f_result1 = $data_from_db->fetch_assoc();
$f_result2 = $data_from_db->fetch_assoc();
$f_result3 = $data_from_db->fetch_assoc();

if(isset($_POST['update'])){
  $update_text = $_POST['update_text'];
  $update_text1 = $_POST['update_text1'];
  $update_date_begin = $_POST['update_date_begin'];
  $update_date_end = $_POST['update_date_end'];
  $update_query = "UPDATE task_table SET task_name='$update_text', task_description ='$update_text1',
                                          date_begin = '$update_date_begin', date_end = '$update_date_end'
                                           WHERE id=$id";
  $update_date = $dbcon->query($update_query);
  if($update_date){
    $_SESSION['upadate_success'] = "Task updated successfully!";
  }
  header('location: index.php');
}

?>

<?php 
require_once 'header.php';
?>

<div class="container" >
  <div class='row'>
  
    <div class='col-8 mx-auto mt-5'>
    <h2 class="display-4 mx-auto mt-2 text-center">Update Task</h2>
    <form class="" action="" method="post">
    <div class='form-group'>
    <input class="form-control form-control-lg" type="text" name="update_text" value="<?=$f_result['task_name'] ?>">
    </div>
    <div class='form-group'>
    <input class="form-control form-control-lg" type="text" name="update_text1" value="<?=$f_result1['task_description'] ?>">
    </div>
    <div class='form-group'>
    <input class="form-control form-control-lg" type="date" name="update_date_begin" value="<?=$f_result2['date_begin'] ?>">
    </div>
    <div class='form-group'>
    <input class="form-control form-control-lg" type="date" name="update_date_end" value="<?=$f_result3['date_end'] ?>">
    </div>
    <div class='form-group'>
    <input class="btn btn-warning btn-block" type="submit" name="update" value="update">
    </div>
  </form>
    </div>
  </div>
</div>
    
  </body>
</html>
