<?php 
 $title = "error"; 
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Layouts' . DIRECTORY_SEPARATOR . 'htmlhead.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Database' . DIRECTORY_SEPARATOR . 'DB.php'; 
if(isset($_POST['db']) ) {
    
    $db = htmlspecialchars($_POST['db']); 
    
} 
     
       DB::createDatabase($db); 
  
   ?>
   <body>
   <div class="py-5" align="center">
   <p class="mt-5 mb-3 text-muted">&copy;2021 - By yassine bouabadi</p>
   </div>
   </body>