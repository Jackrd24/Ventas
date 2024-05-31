<?php

include_once './Conexion.php';

class Negocio {

    public function listadoClientes() {
        $obj = new Conexion();
        $sql = "SELECT cli_cod, cli_nom, cli_cre FROM clientes";
        $result = mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
        $vector = array();

        while ($f = mysqli_fetch_array($result)) {
            $vector[] = $f;
        }

        return $vector;
    }
    
    public function listadoFactura($id) {
        $obj = new Conexion();
        $sql = "SELECT fac_num, fac_fec, fac_igv FROM fac_cabe WHERE cli_cod='$id'";
        $result = mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
        $vector = array();
        
        while ($f = mysqli_fetch_array($result)) {
            $vector[] = $f;
        }
        
        return $vector;
    }
    
    public function listadoDetalle($id) {
        $obj = new Conexion();
        $sql = "SELECT d.art_cod, art_nom, art_pre, art_can FROM fac_deta d JOIN articulos a ON d.art_cod=a.art_cod WHERE fac_num='$id'";
        $result = mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
        $vector = array();
        
        while ($f = mysqli_fetch_array($result)) {
            $vector[] = $f;
        }
        
        return $vector;
    }

}
