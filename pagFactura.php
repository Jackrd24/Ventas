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
        $nom = $_REQUEST["nom"];
        $vector = $obj->listadoFactura($cod);
        ?>
    <center>
        <h2 class="text-blue">Facturas del Cliente <?= $nom ?></h2>
        <table class="table table-hover">
            <thead>
                <tr class="text-white bg-black">
                    <th>Número de Factura</th>
                    <th>Fecha</th>
                    <th>IGV</th>
                    <th>Detalle</th>
                </tr>
            </thead>
            <?php
            $total = 0;
            foreach ($vector as $key => $dato) {
                echo "<tr><td>$dato[0]</td><td>$dato[1]</td><td>$dato[2]</td>";
                $total++;
                ?>
                <td><a href="pagDetalle.php?id=<?= $dato[0] ?>">Ver</a></td></tr>
                <?php
            }
            ?>
            <tr><th colspan="3">Total de Facturas</th><td><?= $total ?></td></tr>
        </table>
    </center>
</body>
</html>
