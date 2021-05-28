<?php
require_once 'db.php';
 

if(isset($_POST['addtask'])){
  $task_add = $_POST['task_name'];
  $task_add1 = $_POST['task_description'];
  $task_add_date_begin = $_POST['date_begin'];
  $task_add_date_end = $_POST['date_end'];
  
  if(!empty($task_add)){
    if(!empty($task_add1)){
      if(!empty($task_add_date_begin)){
        if(!empty($task_add_date_end)){

          
              $task_add_query = "INSERT INTO task_table (task_name, task_description, date_begin, date_end) 
                  VALUES  ('$task_add', '$task_add1', '$task_add_date_begin', '$task_add_date_end')";

                  $add_query = $conn -> query($task_add_query);

        }
       }
    }
  }

  
  header('location: index.php');
  

  

}




?>
