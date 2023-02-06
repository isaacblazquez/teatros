<?php
include_once 'autoload.php';

?>

<?php
$teatro = new teatros();
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
        <?php 
            if (!isset($_GET['idTeatro'])){ 
        ?>
        <h1> Trassierra Tickes </h1>
        <table class="table table-striped">
            <thead>
                <tr><th class="text-center">Nombre</th><th>Imagen</th></tr>
            </thead>
            <tbody>
                <?php
                    $arrayTeatros = json_decode($teatro->getAllTeatros(),true);
                    foreach($arrayTeatros as $item){
                        foreach($item as $teatro){
                ?>
                <tr>
                    <?php 
                    echo "  <td>
                                <h2>".$teatro['teatro']."</h2>
                            </td>
                            <td>
                                <a href='nuevoindex.php?idTeatro=".$teatro['idTeatro']."'> 
                                    <img src='img/".$teatro['imagen']."' class=' img-fluid rounded' style='width:500px;height:174px;'/>
                                </a>
                            </td>"; 
                    ?>
                </tr> 
                <?php 
                        }
                    }
                ?>
            </tbody>
        </table>
        <?php
        }else{
            $teatro->carga($_GET["idTeatro"]);
            $sesiones = new sesiones();
            if ($teatro->getNumberOfSesiones()>0){



            
            ?>
            <h2> Sesiones <?php echo $teatro->getTeatro(); ?> </h2>
            <table class="table table-striped">
                <thead>
                    <tr><th class="text-center">Fecha</th><th>Hora</th><th>Entradas disponibles</th></tr>
                </thead>
                <tbody>
                    <?php 
                        foreach($teatro->getSesiones() as $item){
                            foreach($item as $sesion){
                                $sesiones->carga($sesion['idSesion']);
                        ?>
                    <tr>
                        <td><?php echo $sesiones->getFecha(); ?> </td>
                        <td><?php echo $sesiones->getHora(); ?> </td>
                        <td><?php echo $sesiones->getEntradasDisponiblesEnSesion();
                                if ($sesiones->getEntradasDisponibles()){
                            ?>
                                <a href="butacas.php?idTeatro=<?php echo $teatro->getIdTeatro(); ?>&idSesion=<?php echo $sesiones->getIdSesion(); ?>">
                                    <img src="img/tickets.jpeg">
                                </a>
                            <?php
                                }else{
                            ?>
                                <img src="img/agotadas.jpeg">
                            <?php
                                }
                            ?>
                        </td> 
                        <?php 
                        }
                        }       
                        ?>
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