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

}

