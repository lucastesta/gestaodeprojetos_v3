<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->view->pagina = 'cadastra';
        $model = new Application_Model_Cadastro();
        $form = new Application_Form_Cadastrar();
        
        
        $this->view->status = $form->setStatusSelect('status');
        $this->view->cliente = $form->setText('cliente', 35);
        $this->view->tituloProjeto = $form->setText('tituloProjeto', 55);
        $this->view->subProjetoFAI = $form->setText('subProjetoFAI', 35);
        $this->view->unidade = $form->setUnidadeSelect('unidade');
        $this->view->resumo = $form->setTextArea('resumo', 12, 50);
        $this->view->origem = $form->setTextArea('origem', 12, 50);
        $this->view->dataAprovacao = $form->setText('dataAprovacao', 25,true,  array('class' => 'data'));
        $this->view->duracaoProjeto = $form->setText('duracaoProjeto', 25,true,  array('onkeypress' => 'return SomenteNumero(event)'));
        $this->view->dataPrevistaIni = $form->setText('dataPrevistaIni', 25,true, array('class' => 'data'));
        $this->view->dataPrevistaTer = $form->setText('dataPrevistaTer', 25, true, array('class' => 'data'));
        $this->view->valorProposto = $form->setText('valorProposto', 20, true, array('class' => 'money'));
        $this->view->ProjetoServico = $form->setRadioServico('categoria');
        $this->view->ob = $form->setTextArea('ob', 12, 55);
        $this->view->submit = $form->setSubmit('cadastrar');
        
        $form->addElements(array($this->view->cliente
                            ,$this->view->status,
                            $this->view->tituloProjeto,
                            $this->view->subProjetoFAI,
                            $this->view->unidade,
                            $this->view->resumo,
                            $this->view->origem,
                            $this->view->dataAprovacao,
                            $this->view->duracaoProjeto,
                            $this->view->dataPrevistaIni,
                            $this->view->dataPrevistaTer,
                            $this->view->valorProposto,
                            $this->view->ProjetoServico,
                            $this->view->ob,
                            $this->view->submit));
        
        if($this->getRequest()->isPost()) {
            $dados = $this->getRequest()->getPost();
            $requisicao = $this->getRequest();
            if($form->isValid($dados)) {
                $inserir = array(
               'status' => $requisicao->getPost('status'),
               'cliente' => $requisicao->getPost('cliente'),
               'titulo' => $requisicao->getPost('tituloProjeto'),
               'subprojetofai' => $requisicao->getPost('subProjetoFAI'),
               'unidade' => $requisicao->getPost('unidade'),
               'resumo' => $requisicao->getPost('resumo'),
               'origem' => $requisicao->getPost('origem'),
               'dataaprovacao' => $model->dataToMysql($requisicao->getPost('dataAprovacao')),
               'duracao' => $requisicao->getPost('duracaoProjeto'),
               'dataprevistainicio' => $model->dataToMysql($requisicao->getPost('dataPrevistaIni')),
               'dataprevistatermino' => $model->dataToMysql($requisicao->getPost('dataPrevistaTer')),
               'valorproposto' => $model->arrumaValor($requisicao->getPost('valorProposto')),
               'categoria' => $requisicao->getPost('categoria'),
               'ob' => $requisicao->getPost('ob')
            );
        
        
        
            $res = $model->Inserir($inserir);
        
            if($res) {
                echo "<script>alert('Cadastrado com sucesso !');window.location='index';</script>";
            }else 
                echo "<script>alert('Oppps, This shoudl not happen. Contact Lucas Testa');</script>";
          }
          else {
              echo "<script>alert('Campos inválidos');</script>";
              $form->populate($dados);
          }
        }      
    }

    public function alterarAction()
    {
        // action body
    }

    public function acompanharAction()
    {
        // action body
    }

    public function buscarAction()
    {
        // action body
    }


}







