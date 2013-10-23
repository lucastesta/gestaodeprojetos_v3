<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initView()
    {
        $view = new Zend_View();        
        $view->headScript()->setFile('/js/plugins/jquery.js'); 
        $view->headScript()->appendFile('/js/slideToggle.js');
        $view->headScript()->appendFile('/js/plugins/mascara.js');
        $view->headScript()->appendFile('/js/mascaraMoney.js');
        $view->headScript()->appendFile('/js/plugins/data.js');
        $view->headLink()->appendStylesheet('/css/style.css');
        $view->headLink()->appendStylesheet('/css/data.css');
        $view->headScript()->appendFile('/js/data.js');
        $view->headScript()->appendFile('/js/funcoes.js');
        $view->headScript()->appendFile('/js/menuFlutuante.js');
        $view->doctype('XHTML1_STRICT');
        $view->headMeta()->appendHttpEquiv('Content-Type', 'text/html; charset=UTF-8');
        $view->headScript()->appendFile('/js/plugins/jquery.CustomSelect.js');
        $view->headScript()->appendFile('/js/select.js');
        $view->headScript()->appendFile('/js/plugins/DataTables/media/js/jquery.dataTables.min.js');
        $view->headLink()->appendStylesheet('/js/plugins/DataTables/media/css/demo_page.css');
        $view->headLink()->appendStylesheet('/js/plugins/DataTables/media/css/demo_table.css');
        $view->headScript()->appendFile('/js/dataTable.js');
        $view->headScript()->appendFile('/js/buscaAlteracao.js');
        $view->headScript()->appendFile('/js/carregaAltera.js');
        $view->headScript()->appendFile('/js/desabilitaCampos.js');
        $view->headScript()->appendFile('/js/mexeuValorProposto');
        $view->headScript()->appendFile('/js/plugins/jquery.alerts-1.1/jquery.alerts.js');
        $view->headLink()->appendStylesheet('/js/plugins/jquery.alerts-1.1/jquery.alerts.css');
    }
}

