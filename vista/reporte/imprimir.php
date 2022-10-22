<?php
include_once("../../configuracion.php");
include_once("../estructura/encabezado.php");
include_once("../../utiles/phpqrcode/qrlib.php");

$datos = data_submitted();

$objFc = new ABMFc();
$obj = NULL;

if (isset($datos['id']) && $datos['id'] <> -1) {
    $listaTabla = $objFc->buscar($datos);
    if (count($listaTabla) == 1) {
        $obj = $listaTabla[0];
    }
}

$btnValue = ($datos['accion'] != null) ? $datos['accion'] : "nose";
$h1_Titulo = "";
$btnAccion = "";
$imagenQR = "";
if ($datos['accion'] == 'qr') {
    $btnAccion = '<input type="submit" class="btn btn-success" value=' . $btnValue . '>';
    $h1_Titulo = "<h1>Comprobante QR (Factura)</h1>";

    $encodeData = generarQrLink($obj);

    $dirImagenes = "../img/";
    $nombreArchivo = $dirImagenes . "Factura_" . $obj->getLetra() . $obj->getNumero() . ".png";
    $imagenQR = '<img src="' . $nombreArchivo . '" class="mx-auto d-block">';
    $errorCorrectionLevel = 'Q';
    $matrixPointSize = 3;
    QRcode::png($encodeData, $nombreArchivo, $errorCorrectionLevel, $matrixPointSize, 2);
} else {
    $btnAccion = '<input type="submit" class="btn btn-danger" value=' . $btnValue . '>';
    $h1_Titulo = "<h1>ERROR</h1>";
}

function generarQrLink($objFactura)
{

    $json = '{"ver":1,
            "fecha":"' . $objFactura->getFecha() . '",
            "cuit":' . $objFactura->getCuitEmisor() . ',
            "ptoVta":' . $objFactura->getPtoVta() . ',
            "tipoCmp":' . $objFactura->getCbtetipo() . ',
            "nroCmp":' . $objFactura->getNumero() . ',
            "importe":' . $objFactura->getImporte() . ',
            "moneda":"' . $objFactura->getMoneda() . '",
            "ctz":' . $objFactura->getCotizacion() . ',
            "tipoDocRec":' . $objFactura->getDoctipo() . ',
            "nroDocRec":' . $objFactura->getDocnro() . ',
            "tipoCodAut":"' . $objFactura->getCodTipoAut() . '",
            "codAut":' . $objFactura->getCAE() . '}';

    $base64 = base64_encode($json);
    $qrLink = "https://www.afip.gob.ar/fe/qr/?p=" . $base64;
    return $qrLink;
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

            <form method="post" action="accion.php">

                <input id="accion" name="accion" value="<?php echo ($datos['accion'] != null) ? $datos['accion'] : "nose" ?>" type="hidden">


                <div class="form-group">
                    <label class="form-label">Letra</label>
                    <input id="letra" name="letra" type="text" class="form-control" value="<?php echo ($obj != null) ? $obj->getLetra() : "-1" ?>" readonly required>

                    <label class="form-label">Fecha</label>
                    <input id="fecha" name="fecha" type="text" class="form-control" value="<?php echo ($obj != null) ? $obj->getFecha() : "-1" ?>" readonly required>

                    <label class="form-label">Cuit Emisor</label>
                    <input id="cuitEmisor" name="cuitEmisor" class="form-control" type="text" value="<?php echo ($obj != null) ? $obj->getCuitEmisor() : "-1" ?>" readonly required>

                    <label class="form-label">Punto de Venta</label>
                    <input id="ptovta" name="ptovta" type="text" class="form-control" value="<?php echo ($obj != null) ? $obj->getPtovta() : "-1" ?>" readonly required>

                    <label class="form-label">Tipo de Comprobante</label>
                    <input id="cbtetipo" name="cbtetipo" type="text" class="form-control" value="<?php echo ($obj != null) ? $obj->getCbtetipo() : "-1" ?>" readonly required>


                    <label class="form-label">CUIT o DNI Cliente</label>
                    <input id="docnro" name="docnro" type="text" class="form-control" value="<?php echo ($obj != null) ? $obj->getDocnro() : "-1" ?>" readonly required>


                    <label class="form-label">Numero de Factura</label>
                    <input id="numero" name="numero" type="text" class="form-control" value="<?php echo ($obj != null) ? $obj->getNumero() : "" ?>" readonly required>

                    <label class="form-label">Importe</label>
                    <input id="importe" name="importe" type="text" class="form-control" value="<?php echo ($obj != null) ? $obj->getImporte() : "" ?>" readonly required>

                    <label class="form-label">Moneda</label>
                    <input id="moneda" name="moneda" type="text" class="form-control" value="<?php echo ($obj != null) ? $obj->getMoneda() : "" ?>" readonly required>

                    <label class="form-label">Cotizacion</label>
                    <input id="cotizacion" name="cotizacion" type="text" class="form-control" value="<?php echo ($obj != null) ? $obj->getCotizacion() : "" ?>" readonly required>

                    <label class="form-label">CAE</label>
                    <input id="cae" name="cae" type="text" class="form-control" value="<?php echo ($obj != null) ? $obj->getCAE() : "" ?>" readonly required>
                </div>


                <br /><br />

                <?php
                echo $imagenQR;
                ?>
                <br /><br />
                <a class="btn btn-primary" role="button" href="../fc/index.php">Volver</a>
                <a class="btn btn-primary" role="button" href="https://pageloot.com/es/lector-qr-online/#upload" target="_blank">Leer QR online</a>

            </form>


        </div>
    </div>


</body>

</html>