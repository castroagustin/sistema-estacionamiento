<?php
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    setlocale(LC_ALL, 'spanish');
    $fechaHoraActual = date('Y-m-d H:i:s');

    if (!empty($_POST['lugar']) && !empty($_POST['patente']) && !empty($_POST['tipo-vehiculo'])) {
        $consulta = 'INSERT INTO reserva VALUES(NULL,\''.strtoupper($_POST['patente']).'\', \''.$_POST['tipo-vehiculo'].'\', \''.$fechaHoraActual.'\', '.$_POST['lugar'].', NULL, NULL)';
        // echo $consulta;
        include('conexion.php');
        $conexion = conectar();
        if ($conexion) {
            $q = mysqli_query($conexion, $consulta);
            desconectar($conexion);
        }
    }
    header('refresh:1;url=../index.php');
?>