<?php
    $ruta = '../css';
    require('../html/header.html');
    require("conexion.php");
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    setlocale(LC_ALL,'spanish');
    $fechaActual = strftime('%A %d de %B de %Y');
?>
<header>
    <p><?php echo ucfirst($fechaActual) ?></p>
    <a href="../index.php">Inicio</a>
</header>
<main>
    <section>
        <h3 class="title">Registros</h3>
    </section>
    <section class="item-container">
        <!-- CORREGIR TIPO VEHICULO -->
        <section class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Patente</th>
                        <th>Tipo vehiculo</th>
                        <th>Lugar</th>
                        <th>Hora inicio</th>
                        <th>Hora fin</th>
                        <th>Precio final</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                $conexion = conectar();
                // $consulta = 'SELECT * FROM reserva WHERE `hora-fin` IS NULL UNION (SELECT * FROM reserva WHERE `hora-fin` IS NOT NULL ORDER BY `hora-fin` DESC)';
                $consulta = 'SELECT * FROM reserva WHERE `hora-fin` IS NULL ORDER BY `hora-inicio` DESC';
                
                $q = mysqli_query($conexion, $consulta);

                while ($reserva = mysqli_fetch_array($q)) {
                    echo '<tr>';
                    echo '<td>'.$reserva['id'].'</td>';
                    echo '<td>'.$reserva['patente'].'</td>';
                    echo '<td>'.$reserva['tipo-vehiculo'].'</td>';
                    echo '<td>'.$reserva['lugar'].'</td>';
                    echo '<td>'.$reserva['hora-inicio'].'</td>';
                    echo '<td>'.$reserva['hora-fin'].'</td>';
                    echo '<td>'.$reserva['precio-final'].'</td>';
                    echo '</tr>';
                }

                $consulta = 'SELECT * FROM reserva WHERE `hora-fin` IS NOT NULL ORDER BY `hora-fin` DESC';
                
                $q = mysqli_query($conexion, $consulta);

                while ($reserva = mysqli_fetch_array($q)) {
                    echo '<tr>';
                    echo '<td>'.$reserva['id'].'</td>';
                    echo '<td>'.$reserva['patente'].'</td>';
                    echo '<td>'.$reserva['tipo-vehiculo'].'</td>';
                    echo '<td>'.$reserva['lugar'].'</td>';
                    echo '<td>'.$reserva['hora-inicio'].'</td>';
                    echo '<td>'.$reserva['hora-fin'].'</td>';
                    echo '<td>'.$reserva['precio-final'].'</td>';
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </section>
    </section>
</main>

<?php
    require('../html/footer.html');
?>