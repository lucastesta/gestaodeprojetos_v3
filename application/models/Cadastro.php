<?php

class Application_Model_Cadastro
{
    public function arrumaValor($valor) {
        $resultado = str_replace('.', '', $valor);
        $resultado = str_replace(',', '.', $resultado);
        return $resultado;
    }
    
    public function dataToMysql($data) {
        $retorno = explode('/', $data);
        $retorno = $retorno[2] . "-" . $retorno[1] . "-" . $retorno[0];
        return $retorno;
    }
    
    public function Inserir($dados) {
        $db_table = new Application_Model_DbTable_Projetos();
        if($db_table->Cadastrar($dados))
            return true;
        return false;
    }

}

