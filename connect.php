<?php
try{
   $pdo = new PDO('mysql:host=localhost;dbname=reunion_island','root','root');
   $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
   $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
}
catch(PDOException $e){
   echo 'Connexion impossible';
}

?>
