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
        $this->view->pagina = 'altera';
        $form = new Application_Form_Alterar();
        $model = new Application_Model_Alteracao();
        
        $this->view->unidadeBusca = $form->setUnidadeSelect('unidadeBusca', true);
        $this->view->statusBusca = $form->setStatusSelect('statusBusca', true);
        $this->view->submitBusca = $form->setButton('Buscar');
        $this->view->unidadeBusca = $form->setUnidadeSelect('unidadeBusca');
        $this->view->statusBusca = $form->setStatusSelect('statusBusca');
        $this->view->tabela = $model->parseToTable();
        
        $this->view->status = $form->setStatusSelect('status', false);
        $this->view->cliente = $form->setText('cliente', 35);
        $this->view->tituloProjeto = $form->setText('tituloProjeto', 55);
        $this->view->subProjetoFAI = $form->setText('subProjetoFAI', 35);
        $this->view->unidade = $form->setUnidadeSelect('unidade', false);
        $this->view->resumo = $form->setTextArea('resumo', 12, 50);
        $this->view->origem = $form->setTextArea('origem', 12, 50);
        $this->view->dataAprovacao = $form->setText('dataAprovacao', 25,true,  array('class' => 'data'));
        $this->view->duracaoProjeto = $form->setText('duracaoProjeto', 25,true,  array('onkeypress' => 'return SomenteNumero(event)'));
        $this->view->dataPrevistaIni = $form->setText('dataPrevistaIni', 25,true, array('class' => 'data'));
        $this->view->dataPrevistaTer = $form->setText('dataPrevistaTer', 25, true, array('class' => 'data'));
        $this->view->valorProposto = $form->setText('valorProposto', 20, true, array('class' => 'money'));
        $this->view->ProjetoServico = $form->setRadioServico('categoria');
        $this->view->ob = $form->setTextArea('ob', 12, 55);
        $this->view->submit = $form->setSubmit('Alterar');
        
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
                $alterar = array(
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
        
        
            $res = $model->Altera($alterar, $requisicao->getPost('id_altera'));
        
            if($res) {
                echo "<script>alert('Alterado com sucesso !');window.location='/alteracao';</script>";
            }else 
                echo "<script>alert('Oppps, This shoudl not happen. Contact Lucas Testa');</script>";
          }
          else {
              echo "<script>alert('Campos inválidos');</script>";
              $form->populate($dados);
          }
        }      
    }

    public function acompanharAction()
    {
        $this->view->pagina = 'acompanha';
        $form = new Application_Form_Acompanhar();
        $model = new Application_Model_Acompanhamento();
        
        $this->view->unidadeBusca = $form->setUnidadeSelect('unidadeBusca', true);
        $this->view->statusBusca = $form->setStatusSelect('statusBusca', true);
        $this->view->submitBusca = $form->setButton('Buscar');
        $this->view->unidadeBusca = $form->setUnidadeSelect('unidadeBusca');
        $this->view->statusBusca = $form->setStatusSelect('statusBusca');
        $this->view->tabela = $model->parseToTable();
        
        $this->view->status = $form->setStatusSelect('status', false);
        $this->view->cliente = $form->setText('cliente', 35);
        $this->view->tituloProjeto = $form->setText('tituloProjeto', 55);
        $this->view->subProjetoFAI = $form->setText('subProjetoFAI', 35);
        $this->view->unidade = $form->setUnidadeSelect('unidade', false);
        $this->view->dataPrevistaIni = $form->setText('dataPrevistaIni', 25,true,  array('class' => 'data'));
        $this->view->dataInicio = $form->setText('dataInicio', 25,true,  array('class' => 'data'));
        $this->view->dataPrevistaTer = $form->setText('dataPrevistaTer', 25,true,  array('class' => 'data'));
        $this->view->dataTermino = $form->setText('dataTermino', 25,true,  array('class' => 'data'));
        $this->view->valorPago = $form->setText('valorPago', 20, true, array('class' => 'money'));
        $this->view->investimentoFeito = $form->setText('investimentoFeito', 20, true, array('class' => 'money'));
        $this->view->ob = $form->setTextArea('ob', 12, 55);
        $this->view->submit = $form->setSubmit('Atualizar');
        
         $form->addElements(array($this->view->status,
             $this->view->dataInicio, $this->view->dataTermino, $this->view->valorPago,
                 $this->view->investimentoFeito, $this->view->ob, $this->view->submit));
         
         
      
        if($this->getRequest()->isPost()) {
            $dados = $this->getRequest()->getPost();
            $requisicao = $this->getRequest();
            if($form->isValid($dados)) {
                //echo "<script>alert('lucas');</script>";
                 $alterar = array('status' => $requisicao->getPost('status'),
                     'datarealinicio' => $model->dataToMysql($requisicao->getPost('dataInicio')),
                     'datarealtermino' => $model->dataToMysql($requisicao->getPost('dataTermino')),
                     'valorpago' => $model->arrumaValor($requisicao->getPost('valorPago')),
                     'investimentorelizado' => $model->arrumaValor($requisicao->getPost('investimentoFeito')),
                     'ob' => $requisicao->getPost('ob'));
                 
                 
                  $res = $model->Altera($alterar, $requisicao->getPost('id_altera'));
                  
                  if($res) {
                      echo "<script>alert('Atualizado com Sucesso !!!');window.location='/acompanhamento';</script>";
                  }   
                  else {
                      echo "<script>alert('Oppps, This shoudl not happen. Contact Lucas Testa');</script>";
                  }
            } else {
                echo "<script>alert('Campos inválidos');</script>";
                $form->populate($dados);
            }
        }
         
     }

    public function buscarAction()
    {
        $this->getHelper('layout')->disableLayout();
        
        if($this->getRequest()->isPost()) {
            $model = new Application_Model_Alteracao();
            $this->view->tabela = $model->Busca($this->getRequest()->getPost('status'), $this->getRequest()->getPost('unidade'));
        }
        
        if($this->getRequest()->isGet()) {
            $model = new Application_Model_Alteracao();
            $this->view->tabela = $model->preencheCamposAlteracao($this->getRequest()->getParam('id'));
        }
    }


}







