<?php

class Application_Form_Alterar extends Zend_Form
{

   public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    }

    
    public function setStatusSelect($nome) {
        $status = new Zend_Form_Element_Select($nome);
        $status->setMultiOptions(array(
            '1' => 'Em Prospecção',
            '2' => 'Em Andamento',
            '3' => 'Recusado',
            '4' => 'Finalizado'
        ))->addValidator(new Zend_Validate_Int(), false)->setAttrib('class', 'styled-select');
        return $status;
    }
    
    public function setText($name, $size = 18, $add = false, $op = array()) {
        $texto = new Zend_Form_Element_Text($name);
        $texto->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->setAttrib('size', $size)
                ->addValidator('NotEmpty')
                ->addErrorMessage('Valor não pode ser vazio');
        if(!$add)
            return $texto;
        if($add) {
            foreach($op as $k => $v) {
                $texto->setAttrib($k, $v);
            }
            return $texto;
        }
    }
    
    public function setUnidadeSelect($nome){
        $unidade = new Zend_Form_Element_Select($nome);
        $unidade->setMultiOptions(array(
            '1' => 'UN Combustíveis',
            '2' => 'UN Metais/Cerâmicas',
            '3' => 'UN Polímeros',
            '4' => 'UN Sorocaba',
            '5' => 'Corporate'
        ))->addValidator(new Zend_Validate_Int(), false)->setAttrib('class', 'styled-select');
        return $unidade;
    }
    
    public function setTextArea($nome, $row, $col) {
        $area = new Zend_Form_Element_Textarea($nome);
        $area->setRequired(true)
             ->addValidator('NotEmpty')
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addErrorMessage('Escreva uma mensagem');
        $area->setAttrib('rows', $row);
        $area->setAttrib('cols', $col);
        return $area;
    }
    
    public function setRadioServico($name)  {
        $campo = new Zend_Form_Element_Radio($name);
        $campo->addMultiOptions(array(
            '1' => 'Projeto',
            '2' => 'Serviço Tecnológico'
        ))->setValue('1');
        return $campo;
    }
    
    public function setSubmit($name) {
        $campo = new Zend_Form_Element_Submit($name);
        $campo->setValue('Cadastrar');
        return $campo;
    }

    public function setButton($name) {
        $campo = new Zend_Form_Element_Button($name);
        $campo->setValue('Buscar');
        $campo->setAttrib('onclick','javascript:funciona();');
        $campo->setAttrib('id', 'submitBusca');
        return $campo;
    }


}

