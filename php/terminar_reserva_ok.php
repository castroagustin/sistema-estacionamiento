<?php
    if (!empty($_POST['lugar']) && !empty($_POST['precio-final']) && !empty($_POST['hora-fin'])) {
        $consulta = 'UPDATE reserva
                     SET `hora-fin` = \''.$_POST['hora-fin'].'\', `precio-final` = '.$_POST['precio-final'].'
                     WHERE lugar = '.$_POST['lugar'].' AND `hora-fin` IS NULL';
        include('conexion.php');
        $conexion = conectar();
        if ($conexion) {
            $q = mysqli_query($conexion, $consulta);
            desconectar($conexion);
        }
    }
    header('refresh:1;url=../index.php');
?>