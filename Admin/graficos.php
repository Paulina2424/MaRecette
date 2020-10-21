<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MySQL con PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
include ("db_conection.php");

  $sql =  "SELECT count(*) as cont FROM users";
$result = $dbcon->query($sql);
$valores = mysqli_fetch_array($result);
    
$sql2 =  "SELECT count(*) as cont FROM items";
$result2 = $dbcon->query($sql2);
$valores2 = mysqli_fetch_array($result2);

$sql3 =  "SELECT count(*) as cont FROM recetas";
$result3 = $dbcon->query($sql3);
$valores3 = mysqli_fetch_array($result3);
 

$total = $valores['cont'] * 1000;
?>



    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="bg-success text-white text-center m-1">
                    <div class="card-header">Total de usuarios</div>
                    <div class="card-body">
                        <h5 class="h1 card-title"><span id="idVendidos"><?php echo ($valores['cont']) ?></span></h5>
                        <p class="card-text">Desde la creación del sitio</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-warning text-white text-center m-1">
                    <div class="card-header">Total en almacen</div>
                        <div class="card-body">
                        <h5 class="h1 card-title"><span id="idAlmacen"><?php echo ($valores2['cont']) ?></span></h5>
                        <p class="card-text">Inventario mayor vs el mes pasado.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-info text-white text-center m-1">
                    <div class="card-header">Total Ingresos</div>
                        <div class="card-body">
                        <h5 class="h1 card-title"><span id="idIngreso"><?php echo ($valores3['cont']) ?></span></h5>
                        <p class="card-text">Disminución de ingresos vs mes anterior.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-12 text-center">
                <h2>Reporte de ventas</h2>
                <p>Cantidad generada por los usuarios: <?php echo $total ?> CLP </p>
                <canvas id="idGrafica" class="grafica"></canvas>
            </div>
        </div>
        <div class="row  my-3">
            <div class="col-md-12 text-center">
                <div id="idContTabla"></div>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="js/index.js"></script>
</body>
</html>