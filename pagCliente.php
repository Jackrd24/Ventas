<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/adminlte.min.css" rel="stylesheet" type="text/css"/>
        <title>Lista de Clientes</title>
    </head>
    <body>
        <?php
        include_once './Negocio.php';
        $obj = new Negocio();
        $vector = $obj->listadoClientes();
        ?>
    <center>
        <h2 class="text-blue">Lista de Clientes</h2>
        <table class="table table-hover">
            <thead>
                <tr class="text-white bg-black">
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Crédito</th>
                    <th>Factura</th>
                </tr>
            </thead>
            <?php
            foreach ($vector as $key => $dato) {
                if ($dato[2] != null) {
                    echo "<tr><td>$dato[0]</td><td>$dato[1]</td><td>S/.$dato[2]</td>";
                } else {
                    echo "<tr><td>$dato[0]</td><td>$dato[1]</td><td>S/.0</td>";
                }
                ?>
                <td><a href="pagFactura.php?id=<?= $dato[0] ?>&nom=<?= $dato[1] ?>">Ver</a></td></tr>
                <?php
            }
            ?>
        </table>
    </center>
</body>
</html>
