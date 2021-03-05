<?php 

 /* 

author : @yassine bouabadi 

********** database management class ********* 

 */
    
class DB 

{

    private $adress; 
    private $username; 
    private $password; 
    private $db; 

   //constructor 

    public function __construct(String $adress,String $username,String $password)
    {   

        $this->adress = $adress; 
        $this->username = $username; 
        $this->password = $password; 
        try {
           $this->db = $dbh = new PDO($adress, $username, $password);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
        
    }

    //getting database's tables 

    public function getTables(String $db) 
    {   
        try {
        $dbb = new PDO($this->adress, $this->username, $this->password); 
        $request1 = $dbb->prepare("SELECT Table_name  from information_schema.tables where table_schema = ?");
        $request1->execute(array($db));
        if($result1 = $request1->fetch() == FALSE) {
          echo  '<img class="mb-4" src="../Layouts/database-svgrepo-com (1).svg" alt="" width="300" height="200">'; 
          echo "<h2>This database is empty </h2> "; 
        }
        while( $result1 = $request1->fetch()) {
          echo   '<h5>table name : ' . $result1['TABLE_NAME'] . '</h5>'; 
          ?>
           <h6> table content </h6>
           <table cellpadding="1" border="1px" class="table table-striped table-light table-bordered table-responsive align-middle">
             <tr> 
              <?php 
                $request2 = $dbb->prepare("SHOW COLUMNS FROM " . $result1['TABLE_NAME']);
                $request2->execute(array($db));
                //start columns counter $colcounter 
                $colcounter = 0;  
                while( $result2 = $request2->fetch()) {
                  echo' <td>' .  $result2[0] . ' </td>';
                  ;
                  $colcounter++; 
                }
                echo '</tr>'; 
                $request3 = $dbb->prepare("SELECT * FROM " . $result1['TABLE_NAME']);
                $request3->execute();
                while( $result3 = $request3->fetch()) {
                    echo '<tr>'; 
                    //each table has a different number of columns so we need to loop it to get the table's results
                    for($i=0; $i<$colcounter;$i++) {
                       echo' <td>' .  $result3[$i] . ' </td>';
                    }
                } 
                echo '</tr>';
            
             echo '</table>'; 
        }
        }
        catch(PDOException $e) {
          header('Location:error.php?e='. $e->getMessage() . '&db=' . $db . '&action=connect%20to'); 
   
        }
        
    }

  //static method to get databases names from information schema 
    public static function getDatabases() 
    {
      $dbb = new PDO('mysql:dbname=information_schema', 'root', ''); 
      $req = $dbb->prepare("SELECT schema_name FROM information_schema.schemata;");
      $req->execute();
       
      while( $res = $req->fetch()) {
        echo   '<option >' . $res['0'] . '</option>';   
      } 
      
    }
    
    public static function createDatabase(String $db) 
    {
      try {
      $dbb = new PDO("mysql:dbname=", 'root', ''); 
      // setting the PDO error mode to exception
    $dbb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE " . $db ;
    // using exec() because no results are returned
    $dbb->exec($sql);
    header('Location:TablesShow.php?success=1&db=' . $db);
    
     

    }
    catch(PDOException $e)
    {

      header('Location:error.php?e='. $e->getMessage() .'&db=' . $db . '&action=create' );  
    }
    $dbb = null;

}

    public static function deleteDatabase(String $db) 
    {
      try {
        $dbb = new PDO("mysql:dbname=", 'root', ''); 
        // setting the PDO error mode to exception
      $dbb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "DROP DATABASE " . $db ;
      // using exec() because no results are returned
      $dbb->exec($sql);
      header('Location:../index.php?success=1&db=' . $db);
      
       
  
      }
      catch(PDOException $e)
      {
  
        header('Location:error.php?e='. $e->getMessage() .'&db=' . $db . '&action=delete' ); 
      }
      $dbb = null;
    }
  }
