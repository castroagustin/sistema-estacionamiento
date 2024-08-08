<?php
    $ruta = '../css';
    require('../html/header.html');
    require("conexion.php");
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    setlocale(LC_ALL, 'spanish');
    $fechaActual = strftime('%A %d de %B de %Y');

    $conexion = conectar();
    $consulta = 'SELECT * FROM reserva WHERE lugar = '.$_GET['lugar'].' AND `hora-fin` IS NULL';
    $q = mysqli_query($conexion, $consulta);
    $resultado = mysqli_fetch_array($q);
    $horaInicio = new DateTime($resultado['hora-inicio']);

    $consultaPrecios = 'SELECT * FROM precios';
    $qPrecios = mysqli_query($conexion, $consultaPrecios);
    $precios = mysqli_fetch_array($qPrecios);

    $currentDate = new DateTime();
    $currentDateTime = $currentDate->format('Y-m-d H:i:s');
    $interval = $currentDate->diff($horaInicio);
    $hoursDiff = ceil(($interval->days * 24) + $interval->h + ($interval->i / 60));

    $precioFinal = $hoursDiff * $precios[$resultado['tipo-vehiculo']];
?>
<header>
    <p><?php echo ucfirst($fechaActual) ?></p>
    <a href="">Ver registros</a>
</header>
<main>
    <section>
        <form action="terminar_reserva_ok.php" method="post" enctype="multipart/form-data" class="formulario">
            <legend>Cobrar - Lugar <?php echo $resultado['lugar'] ?></legend>
            <p>Patente: <?php echo $resultado['patente'] ?></p>
            <p>Hora inicio: <?php echo date_format($horaInicio, 'H:i') ?></p>
            <p>Tipo vehiculo: <?php echo $resultado['tipo-vehiculo'] ?></p>
            <p>------------------------------</p>
            <p>Horas facturadas: <?php echo $hoursDiff ?></p>
            <h4>Precio final: $<?php echo $precioFinal ?></h4>
            <input type="hidden" name="lugar" value="<?php echo $resultado['lugar'] ?>">
            <input type="hidden" name="precio-final" value="<?php echo $precioFinal ?>">
            <input type="hidden" name="hora-fin" value="<?php echo $currentDateTime ?>">
            <input type="submit" name="enviar" value="Confirmar" class="formulario-boton">
        </form>
    </section>
</main>
<?php
require('../html/footer.html');
?>