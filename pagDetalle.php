<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/adminlte.min.css" rel="stylesheet" type="text/css"/>
        <title>Lista de Factura</title>
    </head>
    <body>
        <?php
        include_once './Negocio.php';
        $obj = new Negocio();
        $cod = $_REQUEST["id"];
        $vector = $obj->listadoDetalle($cod);
        ?>
    <center>
        <h2 class="text-blue">Detalle de la Factura <?= $cod ?></h2>
        <table class="table table-hover">
            <thead>
                <tr class="text-white bg-black">
                    <th>Código del Artículo</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                </tr>
            </thead>
            <?php
            $totalt = 0;
            foreach ($vector as $key => $dato) {
                $totalc = $dato[2] * $dato[3];
                echo "<tr><td>$dato[0]</td><td>$dato[1]</td><td>S/.$dato[2]</td><td>$dato[3]</td><td>S/." . number_format($totalc, 2) . "</td>";
                $totalt += $totalc;
            }
            ?>
            <tr><th colspan="4">Total a Pagar</th><td>S/.<?= number_format($totalt, 2) ?></td></tr>
        </table>
    </center>
</body>
</html>
