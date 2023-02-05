<?php 

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
     if((isset($_REQUEST['comprar']))||(isset($_REQUEST['cancelar']))) {
        if (isset($_REQUEST['comprar'])){
            //SI VENGO DE PULSAR BOTON COMPRAR
            $idSesion=$_REQUEST['sesion'];
            $id_teatro=$_REQUEST['idTeatro'];
            foreach($_REQUEST as $key=>$value){
                if (str_starts_with($key,'butaca')){
                    $sql="INSERT INTO `entradas` (`idSesion`, `fila`, `columna`) VALUES (:sesion, :fila, :columna)";            
                    $butaca=(explode("-",$value));
                    $sth = $conn->prepare($sql);
                    $sth->bindParam(":sesion", $idSesion);
                    $sth->bindParam(":fila", $butaca[0]);
                    $sth->bindParam(":columna", $butaca[1]);
                    $sth->execute();
                }
            }
            goto mostrar_butacas;
        }
    }else{
    mostrar_butacas:
    if(!isset($_REQUEST['comprar'])){

        $id_teatro=$_GET["idTeatro"];
        $idSesion=$_GET['idSesion'];
    }
    //preparar y cegar
    $sth0 = $conn->prepare("SELECT teatro,filas,columnas FROM teatros 
    WHERE idTeatro=$id_teatro");
    $sth0->execute();
    $rs0 = $sth0->fetchAll(PDO::FETCH_ASSOC);
    //  var_dump($rs0);

    //preparar y cegar
    $sth = $conn->prepare("SELECT s.fecha,s.hora,t.teatro,e.fila,e.columna FROM teatros as t 
    LEFT JOIN sesiones as s 
    ON s.teatro=t.idTeatro
    LEFT JOIN entradas as e
    ON s.idSesion=e.idSesion
    WHERE (t.idTeatro=$id_teatro AND s.idSesion=$idSesion)");
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
        <div class="row justify-content-center" >
            <h2><?php echo $rs[0]['teatro']; ?></h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <input type="hidden" name="sesion" value="<?php echo $idSesion; ?>">
                <input type="hidden" name="idTeatro" value="<?php echo $id_teatro; ?>">
                <table>
                    <tbody>
                        <?php 
                        for($i=1;$i<=$rs0[0]['filas'];$i++)
                            {
                            echo " <tr>";
                            for($j=1;$j<=$rs0[0]['columnas'];$j++){   ?>
                                <td>
                                    <?php 
                                        $ocupada = FALSE;
                                        foreach($rs as $value){
                                        if (($value['fila']==$i)&&($value['columna']==$j)){
                                                    $ocupada = TRUE;
                                            }
                                        }
                                        if ($ocupada) {echo "<input type='checkbox' name='butaca-$i.$j' value='$i-$j' disabled checked='checked'>";}
                                        else{ echo "<input type='checkbox' name='butaca-$i.$j' value='$i-$j' >";}
                                    ?> 
                                </td> 
                                <?php
                            }
                            echo " </tr>";
                            }
                        ?>
                    </tbody>
                </table>
                <input type="reset" name="cancelar" value="cancelar">
                <input type="submit" name="comprar" value="comprar">
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>

<?php
}
?>

<?php

?>
