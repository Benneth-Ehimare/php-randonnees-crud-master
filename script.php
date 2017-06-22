

    <?php
  include("connect.php");

  $name = $_POST['name'];
  $difficulty = $_POST['difficulty'];
  $distance = $_POST['distance'];
  $duration = $_POST['duration'];
  $height_difference = $_POST['height_difference'];
  // var_dump($name, $difficulty, $distance, $duration, $height_difference);

  $req = $pdo->prepare("INSERT INTO hiking (name, difficulty,  distance, duration, height_difference)
  VALUES (:name, :difficulty, :distance, :duration, :height_difference)");

  $req->execute(array(
      'name' => $name,
      'difficulty' => $difficulty,
      'distance' =>(int)$distance,
      'duration' => (int)$duration,
      'height_difference' => (int)$height_difference
    ));

    header("Location: read.php");
    ?>
