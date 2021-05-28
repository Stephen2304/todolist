<?php
session_start();
require_once "header.php";
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
}

 ?>



<div class="container">
  <div class="row">
    <div class="col-8 m-auto">
    <h1 class="display-3 text-center">Bienvenue <?php echo $_SESSION['username']; ?>!</h1>
    <h2 class="display-6 text-center">C'est votre To Do List By DsrPro</h2>
    <h5 class="display-5 text-center"><a href="logout.php" style="color:red">Déconnexion</a></h5>
    <h5 class="display-5 text-center"> <a href="historique.php">HISTORIQUE</a></h5>
    
      <form class="mt-4" action="index_valid.php" method="post">
        <div class="form-group">
          <input class= "form-control form-control-lg" type="text" name="task_name" placeholder="Enter your task"  >

        </div>
        <div class="form-group">
          <input class= "form-control form-control-lg" type="text" name="task_description" placeholder="Enter description of task"  >

        </div>
        <div class="form-group">
          <label>date create task</label><input class= "form-control form-control-lg" type="date" name="date_begin" placeholder="Enter date to create your task"  >

        </div>
        <div class="form-group">
        <label>date end task</label><input class= "form-control form-control-lg" type="date" name="date_end" placeholder="Enter date to end of your task"  >

        </div>
        <div class="">
          <input class="btn btn-success btn-block" type="submit" name="addtask" value="Add Task">
          

        </div>
      </form>
    </div>
  </div>
<!-- ===================== show delete alert message ============= -->
<?php 
  if(isset($_SESSION['delete_success'])) { ?>

<div class="alert alert-warning text-dark  mx-auto mt-4" role="alert" style="width:66%;">
  <?=$_SESSION['delete_success'];?>
</div>



<?php
  unset($_SESSION['delete_success']);

}

?>

<!-- ========================== update alert message ==================== -->

<?php 
  if(isset($_SESSION['upadate_success'])) { ?>

<div class="alert alert-warning text-dark  mx-auto mt-4" role="alert" style="width:66%;">
  <?=$_SESSION['upadate_success'];?>
</div>



<?php
  unset($_SESSION['upadate_success']);

}

?>

<!-- =================================== table =========================== -->

<table style="width:96%;" class="table table-sm table-borderless table-striped text-center mx-auto mt-3" > 
<thead class="bg-dark text-white text-center">
  <tr>
    <th>Serial</th>
    <th>task</th>
    <th>description</th>
    <th>added date</th>
    <th>added time</th>
    <th>time begin</th>
    <th>time end</th>
    <th>statut</th>
    <th>action </th>
  </tr>
</thead>

<?php
require_once "db.php";
$task_show_query = "SELECT * FROM task_table";
$result = $conn -> query($task_show_query);
if($result->num_rows!=0){
  $serial = 1;
  foreach ($result as $row) {
    $temp_date_time=(explode(' ',$row['added_tiime']));
    $date = $temp_date_time[0];
    $time = $temp_date_time[1];

?>

<tr>
  <td><?=$serial++?></td>
  <td ><?=$row['task_name'] ?></td>
  <td ><?=$row['task_description'] ?></td>
  <td><?=$date?></td>
  <td><?=$time?></td>
  <td ><?=$row['date_begin'] ?></td>
  <td ><?=$row['date_end'] ?></td>
  <?php if($row['statut']==1){
    echo"<td>En cours</td>";
  }else if ($row['statut']==2){
    echo"<td>Achevée</td>";
  }else{
    echo"<td>En retard</td>";
  }?>


  <td>
  <div class="btn-group">
    <a class="btn btn-sm btn-warning" href="update.php?id=<?php echo base64_encode($row['id']); ?>">update</a>
    <a class="btn btn-sm btn-danger" href="delete.php?id=<?php echo base64_encode($row['id']); ?>">delete</a>
    </div>
  </td>
</tr>





<?php



}
}
// ========================== if no data found ========================
else{
?>
  <tr>
  <td colspan="20" class="text-center display-4" >No task</td>
  </tr>
<?php
}
?>


</table>




     <!-- </div>
  </div> -->

<!-- </div> -->




  </body>
</html>
