<?php
include_once("../../configuracion.php");
include_once("../estructura/encabezado.php");

$datos = data_submitted();
$obj= new ABMFc();
$lista = $obj->buscar(null);
$respuesta="";
if(count($lista)>0){
    foreach ($lista as $objTabla) {
        $respuesta .= '<tr>';
        $respuesta .= '<td>'.$objTabla->getId().'</td>';
        $respuesta .= '<td>'.$objTabla->getDocnro().'</td>';
        $respuesta .= '<td>'.$objTabla->getFecha().'</td>';
        $respuesta .= '<td>'.$objTabla->getNumero().'</td>';
        $respuesta .= '<td>'.$objTabla->getletra().'</td>';
        $respuesta .= '<td>'.$objTabla->getImporte().'</td>';
        $respuesta .= '<td>'.$objTabla->getMoneda().'</td>';
        $respuesta .= '<td>'.$objTabla->getCotizacion().'</td>';
        $respuesta .= '<td>'.$objTabla->getCae().'</td>';
        $respuesta .= '<td><a class="btn btn-primary" role="button" href="editar.php?accion=editar&id='.$objTabla->getId().'">Editar</a>';
        $respuesta .= ' <a class="btn btn-danger" role="button" href="editar.php?accion=borrar&id='.$objTabla->getId().'">Borrar</a>';
        $respuesta .= ' <a class="btn btn-success" role="button" href="../reporte/imprimir.php?accion=qr&id='.$objTabla->getId().'">Generar QR</a></td>';
        $respuesta .= '</tr>';
	}
}
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../bootstrap-5.2.1-dist/css/bootstrap.min.css" title="style" />
        <script src="../bootstrap-5.2.1-dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
    <div class="container-fluid p-5 my-5">
        <div class="row">
            <div class="col-sm-12">

                <h2>LISTA DE FACTURAS</h2>
                <p>Informacion de facturas grabadas en la base de datos:</p>
                <div class="input-group custom-search-form">
                <form method="post" action="index.php">
                    <input type="hidden" class="form-control" id="txtBuscar" name="txtBuscar" placeholder="Search...">
                </form>
                </div>
                <br>
                <table class="table table-bordered table-dark">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>DNI o CUIT</th>
                            <th>Fecha</th>
                            <th>Numero</th>
                            <th>Letra</th>
                            <th>Importe</th>
                            <th>Moneda</th>
                            <th>Cotizacion</th>
                            <th>CAE</th>
                            <th>Acciones</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        <?php
                            echo $respuesta;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </body>
</html>

