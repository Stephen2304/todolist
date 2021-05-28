<?php
session_start();
require_once "header.php";
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
}
?>

<div class="container">
  <div class="row">
    <div class="col-12 m-auto">

    <h2 class="display-4 text-center" >HISTORIQUE</h2>
    <h5 class="display-5 text-center"><a href="logout.php" style="color:red">Déconnexion</a></h5>
    <h5  class="display-5 text-center"> <a href="index.php">Acceuil</a></h5>
    <div class="form-group row">
      <label for="example-date-input" class="col-2 col-form-label" id="date_send">Date</label>
      <div class="col-3">
        <form method="GET" action="historique.php" >
          <input class="form-control" type="date" name="date" id="example-date-input">
          <input type="submit" value="Envoyer">
        </form>
      </div>
    </div>

    <table style="width:96%;" class="table table-sm table-borderless table-striped text-center mx-auto mt-3" > 
    <thead class="bg-dark text-white text-center">
      <tr>
        <th>Serial</th>
        <th>action</th>
        <th>date action</th>
        <th>version</th>
        <th>id originale</th>
        <th>task name</th>
        <th>task description</th>
        <th>statut</th>
        <th>added_tiime</th>
        <th>date_begin</th>
        <th>date_end</th>
      </tr>
    </thead>

<?php
require_once "db.php";

if(isset($_GET['date'])){
  $date = $_GET['date'];
$task_show_query = "SELECT * FROM `historique` WHERE `date_action` = '$date'";

$result = $conn -> query($task_show_query);
if($result->num_rows!=0){
  $serial = 1;
  foreach ($result as $row) {
    $temp_date_time=(explode(' ',$row['added_tiime']));
    $date = $temp_date_time[0];



?>

    <tr>
      <td><?=$serial++?></td>
      <td ><?=$row['action'] ?></td>
      <td ><?=$row['date_action'] ?></td>
      <td ><?=$row['version'] ?></td>
      <td ><?=$row['id_original'] ?></td>
      <td ><?=$row['task_name'] ?></td>
      <td ><?=$row['task_description'] ?></td>
      <td ><?=$row['statut']='A faire' ?></td>

      <td><?=$date?> </td>
      <td ><?=$row['date_begin'] ?></td>
      <td ><?=$row['date_end'] ?></td>

    </tr>





<?php



}
}
}
// ========================== if no data found ========================
else{
?>
  <tr>
  <td colspan="20" class="text-center display-4" >Selectionner une date</td>
  </tr>
<?php
}


?>


</table>

</div>
</div>
</div>

