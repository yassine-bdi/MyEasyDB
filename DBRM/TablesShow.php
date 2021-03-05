<?php 
session_start(); 
$title = "Tables show"; 
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Layouts' . DIRECTORY_SEPARATOR . 'htmlhead.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Database' . DIRECTORY_SEPARATOR . 'DB.php'; 

  if(isset($_POST['username']) && isset($_POST['db']) && isset($_POST['password']) ) {
  $username =htmlspecialchars( $_POST['username']); 
  $db = htmlspecialchars($_POST['db']); 
  $addr = htmlspecialchars($_POST['adress']); 
  $password = htmlspecialchars($_POST['password']); 
  $Database = new DB('mysql:dbname=' . $db .';host=' . $addr . '', $username, $password ); 
  $_SESSION['db'] = $db; 
  $_SESSION['user'] = $username;  
}
 if(isset($_GET['success'])) 
    {
      echo '<div class="alert alert-success" role="alert">
        Database created successfully
    </div>'; 
    $Database = new DB('mysql:dbname=' . $_GET['db'] .';host=127.0.0.1', 'root', '' );
    $_SESSION['user'] = 'root'; 
    $_SESSION['db'] = $_GET['db']; 
    $db= $_GET['db']; 
    $_GET['success'] = null; 
    }
?>

<body>



<main class="container">
   <div class="bg-light p-5 rounded">
     <h1>MY EASY DB</h1>
     <p class="lead">DB name : <?php echo $_SESSION['db']; ?></p>
     <p class="lead"> Username : <?= $_SESSION['user'] ?></p>
     <p>Actions : </p> <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal1">Delete </button>
     <!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Drop Database</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
  <form action="db_drop.php" method="POST">
    <div align="center">
    <img class="mb-4 " src="../Layouts/database-svgrepo-com (5).svg" alt="" width="72" height="57" >

    <h1 class="h3 mb-3 fw-normal">Are you sure you want to delete this database ?</h1>
    <input type="text" name="db" value="<?php echo $_SESSION['db']; ?>" hidden>
   
  
    <div class="py-2">
   
    <button class="w-100 btn btn-lg btn-danger" name="delete" type="submit">Delete</button>
    </div>
    </div>
    
  </form>
  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
   </div>
     <div align="center" class="py-4">
    <?php $Database->getTables($db); ?>
     </div>
</main>

  
</body>
