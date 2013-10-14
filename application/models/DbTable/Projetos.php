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
    
    public function Alterar($fields = array(), $where = -1) {
        if(count($fields) == 0 || $where == -1)
            return false;
        //$this->update(array('cliente' => 'Tessta'), "id =" . 4);
        return $this->update($fields, "id =" . $where);
        
        
    }
    
    public function buscarTodos() {
        return $this->fetchAll();
    }
    
    public function buscaPorId($id = '') {
             if($id == '') 
                throw new Exception("ID PASSADO É INVÁLIDO");
             else {
                 $w = "id = " . $id;
                 $sql = $this->select()->where($w);
                 return $this->fetchAll($sql);
             }
    }
    
    public function Busca($status = 0, $unidade = 0) {
        if($status == 0 && $unidade == 0){
            return $this->buscarTodos();
        }
        else
        if($status == 0 && $unidade != 0) {
            $w = "unidade = ". $unidade;
            $sql = $this->select()->where($w);
            return $this->fetchAll($sql);
        }
        else
        if($status !=0 && $unidade == 0) {
            $w = "status = " . $status;
            $sql = $this->select()->where($w);
            return $this->fetchAll($sql);
        }
        else
        if($status != 0 && $unidade != 0) {
            $w = "unidade = " . $unidade . " AND status = " . $status;
            $sql = $this->select()->where($w);
            return $this->fetchAll($sql);
        }
    }

}

