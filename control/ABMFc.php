<?php
class ABMFc
{
    public function abm($datos)
    {
        $resp = false;
        if ($datos['accion'] == 'editar') {
            if ($this->modificacion($datos)) {
                $resp = true;
            }
        }
        if ($datos['accion'] == 'borrar') {
            if ($this->baja($datos)) {
                $resp = true;
            }
        }
        if ($datos['accion'] == 'nuevo') {
            if ($this->alta($datos)) {
                $resp = true;
            }
        }
        return $resp;
    }

    private function cargarObjeto($param)
    {
        $obj = null;

        if (array_key_exists('id', $param) and array_key_exists('letra', $param) and 
        array_key_exists('fecha', $param) and array_key_exists('cuitEmisor', $param) and 
        array_key_exists('ptovta', $param) and array_key_exists('cbtetipo', $param) and 
        array_key_exists('numero', $param) and array_key_exists('importe', $param) and 
        array_key_exists('moneda', $param) and array_key_exists('cotizacion', $param) and 
        array_key_exists('doctipo', $param) and array_key_exists('docnro', $param) and 
        array_key_exists('codTipoAut', $param) and array_key_exists('cae', $param)) {
            $obj = new Fc;
            $obj->setear($param['id'], $param['letra'], $param['fecha'], $param['cuitEmisor'], $param['ptovta'], $param['cbtetipo'], $param['numero'], 
            $param['importe'], $param['moneda'], $param['cotizacion'], $param['doctipo'], $param['docnro'], $param['codTipoAut'], $param['cae']);
        }
        return $obj;
    }

    private function cargarObjetoConClave($param)
    {
        $obj = null;

        if (isset($param['id'])) {
            $obj = new Fc();
            $obj->setId($param['id']);
        }
        return $obj;
    }

    private function seteadosCamposClaves($param)
    {
        $resp = false;
        if (isset($param['id']))
            $resp = true;
        return $resp;
    }

    public function alta($param)
    {
        $resp = false;
        $param['id'] = null;
        $elObjtTabla = $this->cargarObjeto($param);
        //verEstructura($elObjtTabla);
        if ($elObjtTabla != null and $elObjtTabla->insertar()) {
            $resp = true;
        }
        return $resp;
    }
    public function baja($param)
    {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $elObjtTabla = $this->cargarObjetoConClave($param);
            if ($elObjtTabla != null and $elObjtTabla->eliminar()) {
                $resp = true;
            }
        }

        return $resp;
    }

    public function modificacion($param)
    {
        //echo "Estoy en modificacion";
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $elObjtTabla = $this->cargarObjeto($param);
            if ($elObjtTabla != null and $elObjtTabla->modificar()) {
                $resp = true;
            }
        }
        return $resp;
    }

    public function buscar($param)
    {
        $where = " true ";
        if ($param <> NULL) {
            if (isset($param['id'])) {
                $where .= " and id =" . $param['id'];
            }
            if (isset($param['letra'])) {
                $where .= " and letra =" . $param['letra'];
            }
            if (isset($param['fecha'])) {
                $where .= " and fecha =" . $param['fecha'];
            }
            if (isset($param['cuitEmisor'])) {
                $where .= " and cuitEmisor =" . $param['cuitEmisor'];
            }
            if (isset($param['ptovta'])) {
                $where .= " and ptovta =" . $param['ptovta'];
            }
            if (isset($param['cbtetipo'])) {
                $where .= " and cbtetipo =" . $param['cbtetipo'];
            }
            if (isset($param['numero'])) {
                $where .= " and numero =" . $param['numero'];
            }
            if (isset($param['importe'])) {
                $where .= " and importe =" . $param['importe'];
            }
            if (isset($param['moneda'])) {
                $where .= " and moneda =" . $param['moneda'];
            }
            if (isset($param['cotizacion'])) {
                $where .= " and cotizacion =" . $param['cotizacion'];
            }
            if (isset($param['doctipo'])) {
                $where .= " and doctipo =" . $param['doctipo'];
            }
            if (isset($param['docnro'])) {
                $where .= " and docnro =" . $param['docnro'];
            }
            if (isset($param['codTipoAut'])) {
                $where .= " and codTipoAut =" . $param['codTipoAut'];
            }
            if (isset($param['cae'])) {
                $where .= " and cae =" . $param['cae'];
            }
        }
        $obj = new Fc();
        $arreglo = $obj->listar($where);
        //echo "Van ".count($arreglo);
        return $arreglo;
    }
}
