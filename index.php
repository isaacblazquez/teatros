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
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

//preparar y cegar
$sth = $conn->prepare("SELECT idTeatro,teatro,imagen FROM teatros");
$sth->execute();
$rs = $sth->fetchAll(PDO::FETCH_ASSOC);
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
        <?php if (!isset($_GET['idTeatro'])){ ?>
          <h1> Trassierra Tickes </h1>
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
                      <a href='index.php?idTeatro=".$value['idTeatro']."'> 
                        <img src='img/".$value['imagen']."' class=' img-fluid rounded' style='width:500px;height:174px;'/>
                      </a>
                    </td>"; 
              ?>
            </tr> 
            <?php } ?>
          </tbody>
        </table>
          <?php
        }else{
          $id_teatro=$_GET["idTeatro"];
          //preparar y cegar
          $sth = $conn->prepare("SELECT t.filas,t.columnas,t.teatro,s.fecha, s.hora,s.idSesion FROM `sesiones` as s
          LEFT JOIN `teatros` as t
          ON s.teatro=t.idTeatro Where s.teatro=$id_teatro");
          $sth->execute();
          $rs = $sth->fetchAll(PDO::FETCH_ASSOC);
          if (count($rs)>0){
            $nombre_teatro=$rs[0]['teatro'];

          ?>

          <h2> Sesiones <?php echo $nombre_teatro; ?> </h2>
           <table class="table table-striped">
          <thead>
          <tr><th class="text-center">Fecha</th><th>Hora</th><th>Entradas disponibles</th></tr>
          </thead>
          <tbody>
          <?php foreach($rs as $value){ ?>
            <tr>
              <?php 
              $totalButacasTeatro=$value['filas']*$value['columnas'];
              $idSesion=$value['idSesion'];
              $sth1 = $conn->prepare("SELECT * FROM entradas WHERE idSesion=$idSesion");
              $sth1->execute();
              $rs1=$sth1->fetchAll(PDO::FETCH_ASSOC);
             ?>
              <td><?php echo $value['fecha']; ?> </td>
              <td><?php echo $value['hora']; ?> </td>
              <td><?php
                    if (count($rs1)>=$totalButacasTeatro){
                      ?>
                      <img src="img/agotadas.jpeg">
                      <?php
                    }else{
                      ?>
                      <a href="butacas.php?idTeatro=<?php echo $id_teatro; ?>&idSesion=<?php echo $idSesion; ?>">
                        <img src="img/tickets.jpeg">
                      </a>
                      <?php
                    }
                    ?>
                    </td> 
              <?php }   ?>
            </tr> 
          </tbody>
        </table> 
        <?php
          }else{
            echo "<h2>NO HAY SESIONES PARA EL TEATRO SELECCIONADO</h2>";
          }
          ?>
                
        <a href="index.php">Volver a seleccion de Teatro</a>
        <?php
        }
        ?>      
      </div>
    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
