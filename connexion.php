<?php
   try{
      $pdo=new PDO("mysql:host=localhost;dbname=pointage","root","");
   }
   catch(PDOException $e){
      echo $e->getMessage();
   }
?>