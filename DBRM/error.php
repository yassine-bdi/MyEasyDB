<?php 
 $title = "error"; 
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Layouts' . DIRECTORY_SEPARATOR . 'htmlhead.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Database' . DIRECTORY_SEPARATOR . 'DB.php'; 

?>
 <div align="center" >

<?php  if(isset($_GET['e'])) : ?>
    <div class="alert alert-danger" role="alert">
      could not <?= $_GET['action'] ?> the database <?= $_GET['db'] ?>
    </div>
    <h2 style="color:red">ERROR!</h2>
    <img src="../Layouts/undraw_warning_cyit.svg" width="450px">
 <h2> SQL MESSAGE : <br> <?= $_GET['e'] ?> 
  <?php  endif ?>
 </h2>
 
 