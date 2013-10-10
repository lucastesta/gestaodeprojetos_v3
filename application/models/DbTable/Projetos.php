<?php

class Application_Model_DbTable_Projetos extends Zend_Db_Table_Abstract
{

    protected $_name = 'projeto';

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
        if($status == 0 && $unidade == 0)
            return $this->buscarTodos ();
        else
        if($status == 0 && $unidade != 0) {
            return $this->fetchAll($this->select()
                    ->where('unidade = ?', $unidade));
        }
        else
        if($status !=0 && $unidade == 0) {
            return $this->fetchAll($this->select()->where('status = ?', $status));
        }
        else
        if($status != 0 && $unidade != 0) {
            return $this->fetchAll($this->select()->where('status = ? AND unidade = ?', $status, $unidade));
        }
    }

}

