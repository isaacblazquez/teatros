<?php
$servername = "localhost:3308";
$username = "root";
$password = "";
$db="teatros";
$rs = array();

try {
  $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfullyyyyyyyyyyyyy";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}



//preparar y cegar
$sth = $conn->prepare("SELECT idTeatro,teatro,imagen FROM teatros");
$sth->execute();
$rs = $sth->fetchAll(PDO::FETCH_ASSOC);
 //var_dump($rs);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="container text-center">
      <div class="row">
        <h1> Trassierra Tickes </h1>
        <form method="post" action=<?php echo $_SERVER['PHP_SELF']; ?>>
        <table class="table table-striped">
          <thead>
          <tr><th class="text-center">Nombre</th><th>Imagen</th></tr>
          </thead>
          <tbody>
          <?php foreach($rs as $value){ ?>
            <tr>
              <?php 
              echo "<td>
                      <h2>".$value['teatro']."</h2>
                    </td>
                    <td>
                      <input type='image' src='img/".$value['imagen']."' style='width:500px;height:174px;' name='teatro' value='".$value['idTeatro']."'>
                    </td>"; 
              ?>
            </tr> 
            <?php } ?>
          </tbody>
        </table>
        </form>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
