<?php
    $ruta = '../css';
    require('../html/header.html');
    require("conexion.php");
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    setlocale(LC_ALL, 'spanish');
    $fechaActual = strftime('%A %d de %B de %Y');
?>
<header>
    <p><?php echo ucfirst($fechaActual) ?></p>
    <a href="">Ver registros</a>
</header>
<main>
    <section>
        <form action="cargar_reserva_ok.php" method="post" enctype="multipart/form-data" class="formulario">
            <legend>Cargar reserva - Lugar <?php echo $_GET['lugar'] ?></legend>
            <input type="hidden" name="lugar" value="<?php echo $_GET['lugar'] ?>">
            <label for="patente">Patente</label>
            <input type="text" id="patente" name="patente" maxlength="7">
            <label for="vehiculo">Vehiculo</label>
            <select id="vehiculo" name="tipo-vehiculo">
                <option value="moto">Moto</option>
                <option value="auto" selected>Auto</option>
                <option value="camioneta">Camioneta</option>
            </select>
            <input type="submit" name="enviar" value="Confirmar" class="formulario-boton">
        </form>
    </section>
</main>
<?php
require('../html/footer.html');
?>