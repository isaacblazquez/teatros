<?php 
    $id_teatro=$_GET["idTeatro"];
    $idSesion=$_GET['idSesion'];
?>
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
?>

<?php
//preparar y cegar
$sth0 = $conn->prepare("SELECT filas,columnas FROM teatros 
WHERE idTeatro=$id_teatro");
$sth0->execute();
$rs0 = $sth0->fetchAll(PDO::FETCH_ASSOC);
 var_dump($rs0);

//preparar y cegar
$sth = $conn->prepare("SELECT e.fila,e.columna FROM teatros as t 
LEFT JOIN sesiones as s 
ON s.teatro=t.idTeatro
LEFT JOIN entradas as e
ON s.idSesion=e.idSesion
WHERE (t.idTeatro=$id_teatro AND s.idSesion=$idSesion)");
$sth->execute();
$rs = $sth->fetchAll(PDO::FETCH_ASSOC);
//var_dump($rs);

// $data = json_encode($rs);
// echo $data;
// $array = array();
// foreach ($rs as $value){
    
     
    
// }
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
        <form>
            <table>
                <tbody>
                    <?php
                        for($i=0;$i<$rs0[0]['filas'];$i++){
                            echo " <tr>";
                            for($j=0;$j<$rs0[0]['columnas'];$j++){
                                ?>
                                <td>
                                    <?php 
                                        $ocupada=false;
                                        foreach($rs as $value){
                                           if (($value['fila']==$i)&&($value['columna']==$j)){
                                                $ocupada=true;
                                           }
                                        }
                                        if ($ocupada) echo "<input type='checkbox' name='butaca' value='' >";
                                        else{ echo "<input type='checkbox' name='butaca' value='' disabled checked='checked'>";}
                                    ?> 
                                </td> 
                                <?php
                            }
                            echo " </tr>";
                        }
                        ?>
                </tbody>
            </table>
    </form>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
