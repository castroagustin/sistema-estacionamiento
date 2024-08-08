<?php
    $ruta = 'css';
    require('html/header.html');
    require("php/conexion.php");
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    setlocale(LC_ALL,'spanish');
    $fechaActual = strftime('%A %d de %B de %Y');
?>
<header>
    <p><?php echo ucfirst($fechaActual) ?></p>
    <a href="php/registros.php">Ver registros</a>
</header>
<main>
    <!-- CORREGIR MOTO -->
    <section>
        <h3 class="title">Lugares disponibles</h3>
    </section>
    <section class="item-container">
        <?php
            $conexion = conectar();
            $consulta = 'SELECT * FROM reserva WHERE `hora-fin` IS NULL';
            $q = mysqli_query($conexion, $consulta);
            $reservasAct = mysqli_fetch_all($q);
            
            for ($i = 1; $i <= 10; $i++) {
                $ocupado = false;
                foreach ($reservasAct as $res) {
                    if($res[4] == $i) {
                        echo '<a class="lugar-box ocupado" href="php/terminar_reserva.php?lugar='.$i.'">';
                        echo '<h5>' . $i . '</h5>';
                        $date = new DateTime($res[3]);
                        echo '<p>Hora inicio: ' . date_format($date, 'H:i') . '</p>';
                        echo '<p>Patente: ' . $res[1] . '</p>';
                        echo '<p>Tipo vehiculo: ' . $res[2] . '</p>';
                        echo '</a>';
                        $ocupado = true;
                    }
                }
                if (!$ocupado) echo '<a class="lugar-box libre" href="php/cargar_reserva.php?lugar='.$i.'">' . $i . '</a>';
            }
        ?>
    </section>
</main>

<?php
    require('html/footer.html');
?>