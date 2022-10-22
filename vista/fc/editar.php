<?php
include_once("../../configuracion.php");
include_once("../estructura/encabezado.php");

$datos = data_submitted();

$objFactura = new ABMFc();
$obj = NULL;

if (isset($datos['id']) && $datos['id'] <> -1) {
    $listaTabla = $objFactura->buscar($datos);
    if (count($listaTabla) == 1) {
        $obj = $listaTabla[0];
    }
}

$btnValue=($datos['accion'] != null) ? $datos['accion'] : "nose";
$h1_Titulo="";
$btnAccion="";
if ($datos['accion']=='editar'){
    $btnAccion= '<input type="submit" class="btn btn-success" value='.$btnValue.'>';
    $h1_Titulo="<h1>Editar Factura</h1>";
}elseif ($datos['accion']=='borrar'){
    $btnAccion= '<input type="submit" class="btn btn-danger" value='.$btnValue.'>';
    $h1_Titulo="<h1>Borrar Factura</h1>";
}

?>


<html>

<head>

    <link rel="stylesheet" type="text/css" href="../bootstrap-5.2.1-dist/css/bootstrap.min.css" title="style" />

    <script src="../bootstrap-5.2.1-dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container-fluid p-5 my-5 border">
        <?php
            echo $h1_Titulo;
        ?>
        <div class="col-md-6 col-sm-6 col-xs-12">
            
            <form method="post" action="accion.php" class="was-validated">
                <input id="id" name="id" type="hidden" value="<?php echo ($obj != null) ? $obj->getId() : "-1" ?>" readonly required>
                <input id="letra" name="letra" type="hidden" value="<?php echo ($obj != null) ? $obj->getLetra() : "-1" ?>" readonly required>
                <input id="fecha" name="fecha" type="hidden" value="<?php echo ($obj != null) ? $obj->getFecha() : "-1" ?>" readonly required>
                <input id="cuitEmisor" name="cuitEmisor" type="hidden" value="<?php echo ($obj != null) ? $obj->getCuitEmisor() : "-1" ?>" readonly required>
                <input id="ptovta" name="ptovta" type="hidden" value="<?php echo ($obj != null) ? $obj->getPtovta() : "-1" ?>" readonly required>
                <input id="cbtetipo" name="cbtetipo" type="hidden" value="<?php echo ($obj != null) ? $obj->getCbtetipo() : "-1" ?>" readonly required>
                <input id="doctipo" name="doctipo" type="hidden" value="<?php echo ($obj != null) ? $obj->getDoctipo() : "-1" ?>" readonly required>
                <input id="docnro" name="docnro" type="hidden" value="<?php echo ($obj != null) ? $obj->getDocnro() : "-1" ?>" readonly required>
                <input id="codTipoAut" name="codTipoAut" type="hidden" value="<?php echo ($obj != null) ? $obj->getCodTipoAut() : "-1" ?>" readonly required>

                <input id="accion" name="accion" value="<?php echo ($datos['accion'] != null) ? $datos['accion'] : "nose" ?>" type="hidden">


                <div class="form-group">
                    <label class="form-label">Numero</label>
                    <input id="numero" name="numero" type="text" class="form-control" value="<?php echo ($obj != null) ? $obj->getNumero() : "" ?>" required>
                    <div class="valid-feedback">Valido.</div>
                    <div class="invalid-feedback">Por favor, complete este campo.</div>
                </div>

                <div class="form-group">
                    <label class="form-label">Importe</label>
                    <input id="importe" name="importe" type="text" class="form-control" value="<?php echo ($obj != null) ? $obj->getImporte() : "" ?>" required>
                    <div class="valid-feedback">Valido.</div>
                    <div class="invalid-feedback">Por favor, complete este campo.</div>
                </div>

                <div class="form-group">
                    <label class="form-label">Numero</label>
                    <input id="moneda" name="moneda" type="text" class="form-control" value="<?php echo ($obj != null) ? $obj->getMoneda() : "" ?>" required>
                    <div class="valid-feedback">Valido.</div>
                    <div class="invalid-feedback">Por favor, complete este campo.</div>
                </div>
                <div class="form-group">
                    <label class="form-label">Numero</label>
                    <input id="cotizacion" name="cotizacion" type="text" class="form-control" value="<?php echo ($obj != null) ? $obj->getCotizacion() : "" ?>" required>
                    <div class="valid-feedback">Valido.</div>
                    <div class="invalid-feedback">Por favor, complete este campo.</div>
                </div>
                <div class="form-group">
                    <label class="form-label">Numero</label>
                    <input id="cae" name="cae" type="text" class="form-control" value="<?php echo ($obj != null) ? $obj->getCAE() : "" ?>" required>
                    <div class="valid-feedback">Valido.</div>
                    <div class="invalid-feedback">Por favor, complete este campo.</div>
                </div>

                <br/><br/>

                <?php
                echo $btnAccion;
                ?>
                
                <a class="btn btn-primary" role="button" href="index.php">Volver</a>
            </form>


        </div>
    </div>


</body>

</html>