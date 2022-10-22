<?php
class Fc extends BaseDatos
{
    private $id;
    private $letra;
    private $fecha;
    private $cuitEmisor;
    private $ptovta;
    private $cbtetipo;
    private $numero;
    private $importe;
    private $moneda;
    private $cotizacion;
    private $doctipo;
    private $docnro;
    private $codTipoAut;
    private $cae;
    private $mensajeoperacion;


    public function __construct()
    {
        parent::__construct();
        $this->id = '';
        $this->letra = '';
        $this->fecha = '';
        $this->cuitEmisor = '';
        $this->ptovta = '';
        $this->cbtetipo = '';
        $this->numero = '';
        $this->importe = '';
        $this->moneda = '';
        $this->cotizacion = '';
        $this->doctipo = '';
        $this->docnro = '';
        $this->codTipoAut = '';
        $this->cae = '';
        $this->mensajeoperacion = '';
    }

    public function setear($id, $letra, $fecha, $cuitEmisor, $ptovta, $cbtetipo, $numero, $importe, $moneda, $cotizacion, $doctipo, $docnro, $codTipoAut, $cae)
    {
        $this->setId($id);
        $this->setLetra($letra);
        $this->setFecha($fecha);
        $this->setCuitEmisor($cuitEmisor);
        $this->setPtovta($ptovta);
        $this->setCbtetipo($cbtetipo);
        $this->setNumero($numero);
        $this->setImporte($importe);
        $this->setMoneda($moneda);
        $this->setCotizacion($cotizacion);
        $this->setDoctipo($doctipo);
        $this->setDocnro($docnro);
        $this->setCodTipoAut($codTipoAut);
        $this->setCae($cae);
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setLetra($letra)
    {
        $this->letra = $letra;
    }
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }
    public function setCuitEmisor($cuitEmisor)
    {
        $this->cuitEmisor = $cuitEmisor;
    }
    public function setPtovta($ptovta)
    {
        $this->ptovta = $ptovta;
    }
    public function setCbtetipo($cbtetipo)
    {
        $this->cbtetipo = $cbtetipo;
    }
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }
    public function setImporte($importe)
    {
        $this->importe = $importe;
    }
    public function setMoneda($moneda)
    {
        $this->moneda = $moneda;
    }
    public function setCotizacion($cotizacion)
    {
        $this->cotizacion = $cotizacion;
    }
    public function setDoctipo($doctipo)
    {
        $this->doctipo = $doctipo;
    }
    public function setDocnro($docnro)
    {
        $this->docnro = $docnro;
    }
    public function setCodTipoAut($codTipoAut)
    {
        $this->codTipoAut = $codTipoAut;
    }
    public function setCae($cae)
    {
        $this->cae = $cae;
    }
    public function setMensajeoperacion($mensajeoperacion)
    {
        $this->mensajeoperacion = $mensajeoperacion;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getLetra()
    {
        return $this->letra;
    }
    public function getFecha()
    {
        return $this->fecha;
    }
    public function getCuitEmisor()
    {
        return $this->cuitEmisor;
    }
    public function getPtovta()
    {
        return $this->ptovta;
    }
    public function getCbtetipo()
    {
        return $this->cbtetipo;
    }
    public function getNumero()
    {
        return $this->numero;
    }
    public function getImporte()
    {
        return $this->importe;
    }
    public function getMoneda()
    {
        return $this->moneda;
    }
    public function getCotizacion()
    {
        return $this->cotizacion;
    }
    public function getDoctipo()
    {
        return $this->doctipo;
    }
    public function getDocnro()
    {
        return $this->docnro;
    }
    public function getCodTipoAut()
    {
        return $this->codTipoAut;
    }
    public function getCae()
    {
        return $this->cae;
    }
    public function getMensajeoperacion()
    {
        return $this->mensajeoperacion;
    }

    public function cargar()
    {
        $resp = false;
        $sql = "SELECT * FROM fc WHERE id = " . $this->getId();
        if ($this->Iniciar()) {
            $res = $this->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $this->Registro();
                    $this->setear($row['id'], $row['letra'], $row['fecha'], $row['cuitEmisor'], $row['ptovta'], $row['cbtetipo'], $row['numero'], $row['importe'], 
                    $row['moneda'], $row['cotizacion'], $row['doctipo'], $row['docnro'], $row['codTipoAut'], $row['cae']);
                }
            }
        } else {
            $this->setmensajeoperacion("Tabla->cargar: " . $this->getError());
        }
        return $resp;
    }
    public function insertar()
    {
        $resp = false;
        $sql = "INSERT INTO fc (id, letra, fecha, cuitEmisor, ptovta, cbtetipo, numero, importe, moneda, cotizacion, doctipo, docnro, codTipoAut, cae) VALUES 
        ('{$this->getId()}', '{$this->getLetra()}', '{$this->getFecha()}', '{$this->getCuitEmisor()}', '{$this->getPtovta()}', '{$this->getCbtetipo()}',
         '{$this->getNumero()}', '{$this->getImporte()}', '{$this->getMoneda()}', '{$this->getCotizacion()}', '{$this->getDoctipo()}', '{$this->getDocnro()}',
          '{$this->getCodTipoAut()}', '{$this->getCae()}');";
        if ($this->Iniciar()) {
            if ($elid = $this->Ejecutar($sql)) {
                $this->setId($elid);
                $resp = true;
            } else {
                $this->setmensajeoperacion("Tabla->insertar: " . $this->getError());
            }
        } else {
            $this->setmensajeoperacion("Tabla->insertar: " . $this->getError());
        }
        return $resp;
    }

    public function modificar()
    {
        $resp = false;
        $sql = "UPDATE fc SET letra='{$this->getLetra()}', fecha='{$this->getFecha()}', cuitEmisor='{$this->getCuitEmisor()}', ptovta='{$this->getPtovta()}',
         cbtetipo='{$this->getCbtetipo()}', numero='{$this->getNumero()}', importe='{$this->getImporte()}', moneda='{$this->getMoneda()}',
          cotizacion='{$this->getCotizacion()}', doctipo='{$this->getDoctipo()}', docnro='{$this->getDocnro()}', codTipoAut='{$this->getCodTipoAut()}',
           cae='{$this->getCae()}' WHERE id='{$this->getId()}'";
        if ($this->Iniciar()) {
            if ($this->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Tabla->modificar: " . $this->getError());
            }
        } else {
            $this->setmensajeoperacion("Especie->modificar: " . $this->getError());
        }
        return $resp;
    }

    public function eliminar()
    {
        $resp = false;
        $sql = "DELETE FROM fc WHERE id='{$this->getId()}'";
        if ($this->Iniciar()) {
            if ($this->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("Tabla->eliminar: " . $this->getError());
            }
        } else {
            $this->setmensajeoperacion("Tabla->eliminar: " . $this->getError());
        }
        return $resp;
    }

    public function listar($parametro = "")
    {
        $arreglo = array();
        $sql = "SELECT * FROM fc ";
        if ($parametro != "") {
            $sql .= 'WHERE ' . $parametro;
        }
        if ($this->Iniciar()) {
            $res = $this->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    while ($row = $this->Registro()) {
                        $obj = new Fc();
                        $obj->setear($row['id'], $row['letra'], $row['fecha'], $row['cuitEmisor'], $row['ptovta'], $row['cbtetipo'],
                         $row['numero'], $row['importe'], $row['moneda'], $row['cotizacion'], $row['doctipo'],
                          $row['docnro'], $row['codTipoAut'], $row['cae']);
                        array_push($arreglo, $obj);
                    }
                }
            } else {
                $this->setmensajeoperacion("Tabla->listar: " . $this->getError());
            }
        }

        return $arreglo;
    }

    public function buscar($parametro)
    {
        $consulta = "SELECT * FROM auto WHERE $parametro";
        $resp = false;
        if ($this->Iniciar()) {
            if ($this->Ejecutar($consulta)) {
                if ($row = $this->Registro()) {
                    $this->setear($row['id'], $row['letra'], $row['fecha'], $row['cuitEmisor'], $row['ptovta'], $row['cbtetipo'],
                     $row['numero'], $row['importe'], $row['moneda'], $row['cotizacion'], $row['doctipo'],
                      $row['docnro'], $row['codTipoAut'], $row['cae']);

                    /* EMEMPLO DELEGACION 
                    $objPersona=new Persona;
                    if ($objPersona->buscar($this->getDniDuenio())){
                        $this->setObjPersona($objPersona);
                    }
                    FIN EJEMPLO DELEGACION */

                    $resp = true;
                }
            } else {
                $this->setMensajeoperacion($this->getError());
            }
        } else {
            $this->setMensajeoperacion($this->getError());
        }
        return $resp;
    }
}
