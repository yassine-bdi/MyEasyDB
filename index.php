<?php 
 $title = "Home & Login"; 
 require_once __DIR__ . DIRECTORY_SEPARATOR . 'Layouts' . DIRECTORY_SEPARATOR . 'htmlhead.php'; 
 require_once __DIR__ . DIRECTORY_SEPARATOR . 'Database' . DIRECTORY_SEPARATOR . 'DB.php'; 
 ?>

    <!-- Custom styles for this template -->
    <?php
    if(isset($_GET['success'])) : ?>
    
      <div class="alert alert-success" role="alert">
        Database deleted successfully, Reconnect to another database
     </div>
    <?php endif ?>
  <body class="text-center">
  
   

<h1 class="py-4">MY EASY DB </h1>
<h4> Managing databases never been easier than we made it now! </h4>

<img src="Layouts/undraw_server_status_5pbv.svg" width="500px" class="py-2 ">
<!-- Button trigger modal -->
<div class="py-4 ">
<button type="button" class="btn btn-lg btn-success shadow 2px 2px" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Connect to an existing Database
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Database Access</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
  <form action="DBRM/TablesShow.php" method="POST">
    <img class="mb-4" src="Layouts/database-svgrepo-com (3).svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please Log in to your database</h1>
    <div class="py-2">
    <label for="inputEmail" class="visually-hidden">Username</label>
    <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Username " required autofocus>
    </div>
    <div class="py-2">
    <label for="" class="visually-hidden">db name</label>
    <select class="form-select" name="db">
    <?php DB::getDatabases(); ?>
    </select>
    </div>
    <div class="py-2">
    <label for="" class="visually-hidden">server adress</label>
    <input type="text" id="inputEmal" name="adress" class="form-control" placeholder="server adress " required autofocus>
    </div>
    <div class="py-2">
    <label for="inputPassword" class="visually-hidden">Password</label>
    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" >
    </div>
    <div class="py-2">
   
    <button class="w-100 btn btn-lg btn-success" type="submit">Log in</button>
    </div>
    
  </form>
  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>

</div> <h2 > OR </h2>
<button class="btn btn-lg px-4 btn-success shadow 3px 3px" data-bs-toggle="modal" data-bs-target="#exampleModal1"> Create a brand new Database </button>
<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Database</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
  <form action="DBRM/db_create.php" method="POST">
    <img class="mb-4" src="Layouts/database-svgrepo-com (6).svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Create a brand new database</h1>
   
    <div class="py-2">
    <label for="" class="visually-hidden">db name</label>
    <input type="text" name="db" placeholder="your db name" class="form-control" required>
    </div>
  
    <div class="py-2">
   
    <button class="w-100 btn btn-lg btn-success" type="submit">Create</button>
    </div>
    
  </form>
  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<p class="mt-5 mb-3 text-muted">&copy;2021 - By yassine bouabadi</p>
</div>
  
 
  



     <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
      

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </body>

</html>