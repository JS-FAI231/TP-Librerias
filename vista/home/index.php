<?php
include_once("../../configuracion.php");
include_once("../estructura/encabezado.php");
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
                <h1>PAGINA PRINCIPAL TP LIBRERIAS</h1>
                <h4>Libreria: Generador de Codigo QR</h4>
                
                <h4>Recurso: phpqrcode</h4>

                <br><br>
                <div id="home">
				<h1>Datos generales</h1>
				<p>PHP QR Code es una biblioteca de código abierto (LGPL) para generar código QR, código de barras bidimensional. Basado en la biblioteca libqrencode C, proporciona API para crear imágenes de códigos de barras QR Code (PNG, JPEG gracias a GD2). Implementado puramente en PHP, sin dependencias externas (excepto GD2 si es necesario).</p>
				<p>Caracteristicas de la libreria: 
				</p><ul>
					<li>Admite versiones de código QR (tamaño) 1-40</li>
					<li>Codificación numérica, alfanumérica, de 8 bits</li>
					<li>Implementado completamente en PHP.</li>
					<li>Exporta a formatos de imagen PNG, JPEG</li>
					<li>Facil de configurar</li>
					<li>100% Open Source, Licencia LGPL</li>
				</ul>
				<p></p>
				<h1>Forma de Uso</h1>
				<p>La instalacion requerie solamente incluir la clase:</p>
                    <ul><li><b>qrlib.php</b></li></ul>
                    
                    <p>en este proyecto la libreria se encuentra ubicada en /utiles/phpcode/ :</p>
                    <tt>include_once("/utiles/phpqrcode/qrlib.php"); </tt>
                    <br><br>
				<p>Luego se invoca de la siguiente manera: <br><br>
					<tt>QRcode::png('Texto a codificar', 'nombre_del_archivo.png'); // Crea un archivo de tipo PBG </tt><br>
					<tt>QRcode::png('Texto a codificar'); // crea una imagen y la envía directamente al navegador</tt></p>
				
                    <p>Forma de uso en este proyecto</p>
                    <tt>QRcode::png('Texto a codificar', $filename, $errorCorrectionLevel, $matrixPointSize, 2);  </tt><br>
                    <p>donde: </p>
                    <ul>
                        <li><b>$filename: </b>Contiene la ubicacion y el nombre del archivo png</li>
                        <li><b>$errorCorrectionLevel: </b>Especifica el nivel de correccion de errores (L,M,Q,H) </li>
                        <li><b>$matrixPointSize: </b>Tamaño de la matriz (1-10)</li>
                    </ul>

                <p>Para mas informacion consultar <a href="https://phpqrcode.sourceforge.net/examples/index.php" title="Usage examples">Ejemplos detallados</a></p>
                
                <h4>La libreria la podes descargar aqui: </h4>
                    <p><a href="https://sourceforge.net/projects/phpqrcode/files/releases/">DESCARGAR phpQrCode</a></p>
			
			</div>



            </div>
        </div>
    </div>
</body>

</html>


