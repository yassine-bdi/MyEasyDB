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
?>

<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
   <div class="container-fluid">
    <a class="navbar-brand" href="#">Top navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
   <ul class="navbar-nav me-auto mb-2 mb-md-0">
    <li class="nav-item active">
      <a class="nav-link" aria-current="page" href="#">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
    </li>
  </ul>
  <form class="d-flex">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
  </form>
 </div>
</div>
</nav>

<main class="container">
   <div class="bg-light p-5 rounded">
     <h1>RDB Management web portal</h1>
     <p class="lead">DB name : <?php echo $_SESSION['db']; ?></p>
     <p class="lead"> Username : <?= $_SESSION['user'] ?></p>
   </div>
  
    <?php $Database->getTables($db); ?>
</main>

  
</body>
