<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <h1>Liste des randonnées</h1>
    <table>




    <?php
   echo "<table style='border: solid 1px black;'>";
   echo "<tr>
   <th>Id</th>
   <th>Name</th>
   <th>distance</th>
   <th>difficulty</th>
   <th>duration</th>
   <th>height_difference</th>
   </tr>";

   class TableRows extends RecursiveIteratorIterator {
       function __construct($it) {
           parent::__construct($it, self::LEAVES_ONLY);
       }

       function current() {
           return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
       }

       function beginChildren() {
           echo "<tr>";
       }

       function endChildren() {
           echo "</tr>" . "\n";
       }
   }

   $servername = "localhost";
   $username = "root";
   $password = "root";
   $dbname = "reunion_island";

   try {
       $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $stmt = $conn->prepare("SELECT id, name, difficulty, distance, duration, height_difference FROM hiking");
       $stmt->execute();

       // set the resulting array to associative
       $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
       foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
           echo $v;
       }
   }
   catch(PDOException $e) {
       echo "Error: " . $e->getMessage();
   }
   $conn = null;
   echo "</table>";
   ?>




   </table>
  </body>
</html>
