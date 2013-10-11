<?php

class Application_Model_DbTable_Projetos extends Zend_Db_Table_Abstract
{

    protected $_name = 'projeto';
    protected $_primary = 'id';

    public function Cadastrar($values = array()) {
        if(count($values) == 0)
            return;
        $res = $this->insert($values);
        if($res)
            return true;
        return false;
    }
    
    public function buscarTodos() {
        return $this->fetchAll();
    }
    
    public function Busca($status = 0, $unidade = 0) {
        if($status == 0 && $unidade == 0){
            $resultado = $this->select();
            return $resultado->fetchAll();
        }
        else
        if($status == 0 && $unidade != 0) {
            $w = "unidade = ". $unidade;
            $sql = $this->select()->where($w);
            return $this->fetchAll($sql);
        }
        else
        if($status !=0 && $unidade == 0) {
            //return $this->fetchAll($this->select()->where('status = ?', $status));
            return 'kk2';
        }
        else
        if($status != 0 && $unidade != 0) {
            //return $this->fetchAll($this->select()->where('status = ? AND unidade = ?', $status, $unidade));
            return 'kk3';
        }
    }

}

