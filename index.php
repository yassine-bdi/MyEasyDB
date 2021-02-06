<?php 
 $title = "Home & Login"; 
 require_once __DIR__ . DIRECTORY_SEPARATOR . 'Layouts' . DIRECTORY_SEPARATOR . 'htmlhead.php'; 
 require_once __DIR__ . DIRECTORY_SEPARATOR . 'Database' . DIRECTORY_SEPARATOR . 'DB.php'; 
 ?>
<body>
    <!-- Custom styles for this template -->
    <link href="Layouts/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
   
<main class="form-signin"> 
<h3>Welcome to our Database Management Web portal </h3>
  <form action="DBRM/Tables show.php" method="POST">
    <img class="mb-4" src="https://www.flaticon.com/svg/vstatic/svg/2906/2906274.svg?token=exp=1612630376~hmac=8e86f84a375e7c094fbd3f8d2d050b4a" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please Log in to your database</h1>
    <label for="inputEmail" class="visually-hidden">Username</label>
    <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Username " required autofocus>
    <label for="" class="visually-hidden">db name</label>
    <select class="form-select" name="db">
    <?php DB::getDatabases(); ?>
    </select>
    <label for="" class="visually-hidden">server adress</label>
    <input type="text" id="inputEmail" name="adress" class="form-control" placeholder="server adress " required autofocus>
    <label for="inputPassword" class="visually-hidden">Password</label>
    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" >
    <div class="checkbox mb-3">
      <label>
    
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Log in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2021</p>
  </form>
</main>


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