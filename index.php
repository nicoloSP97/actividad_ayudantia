<?php 
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "ayudantia";
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);


if(mysqli_connect_errno()){
    echo "Error al conectar a la base de datos";
}

$idImagen = 3;
$Consulta = $con->query("SELECT url FROM imagenes where id = $idImagen");
$dato = $Consulta->fetch_assoc();
$Imagen = $dato["url"];

$q="SELECT* from imagenes";
$consulta2 = mysqli_query($con,$q);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad Listar</title>
</head>
<!-- style="display:flex;justify-content:center;align-items:center; background:#000;flex-direction:column;  margin:0" -->
<body style="display:flex;justify-content:center;align-items:center; background:#000;flex-direction:column;  margin:0">
    <h1 style="color: white; margin:5px 0 0 0">Actividad Listar</h1>
    <!-- <img src="<?php echo $Imagen ?>"> -->
    <table border="1"></table>

    <table style="color: white; ">
        <tr>
            <tr>
                <td>id</td>
                <td>url</td>
            </tr>
            <?php
                while($reg = mysqli_fetch_array($consulta2)){           
            ?>
            <tr>
                <td><?php echo $reg['id'] ?></td>
                <td><img src="<?php echo $reg['url'] ?>" alt=""></td>
            </tr>
            <?php
            }
            ?>
        </tr>
    </table>
    
    <!-- consulta sql imagen segun el id -->
    <?php
    echo "<br>"."Imagen segun consulta por id: "."<br>";
    ?>
    <img src="<?php echo $Imagen ?>">
    
</body>
</html>