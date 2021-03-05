<?php 
 $title = "error"; 
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Layouts' . DIRECTORY_SEPARATOR . 'htmlhead.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Database' . DIRECTORY_SEPARATOR . 'DB.php'; 
if(isset($_POST['db']) ) {
    
    $db = htmlspecialchars($_POST['db']); 
    
   } 
     DB::deleteDatabase($db); 
