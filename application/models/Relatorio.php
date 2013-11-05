<?php

class Application_Model_Relatorio
{
    public function arrumaValor($valor) {
        $resultado = str_replace('.', '', $valor);
        $resultado = str_replace(',', '.', $resultado);
        return $resultado;
    }
    
    private function decidiStatus($number) {
        switch ($number) {
            case 1:
                return 'Em Prospecção';
                break;
            case 2:
                return 'Em Andamento';
                break;
            case 3:
                return 'Recusado';
                break;
            case 4:
                return 'Finalizado';
                break;
        }
    }
    
     private function decidiUnidade($number) {
            switch ($number) {
               case 1:
                     return 'UN Combustíveis';
                     break;
               case 2:
                   return 'UN Metais/Cerâmicas';
                   break;
               case 3:
                   return 'UN Polímeros';
                   break;
               case 4:
                   return 'UN Sorocaba';
                   break;
               case 5:
                   return 'Corporate';
                   break;
            }
     }
    
    private function dataToMysql($data) {
        $retorno = explode('/', $data);
        $retorno = $retorno[2] . "-" . $retorno[1] . "-" . $retorno[0];
        return $retorno;
    } 
    
    private function parseDateToBR($data) {
         $data = explode("-", $data);
         $data = $data[2] . "/" . $data[1] . "/" . $data[0];
         return $data;
    }
    
    private function decidiTipoProjeto($valor) {
        switch ($valor) {
            case 1:
                return 'Projeto';
                break;
            case 2:
                return 'Serviço Tecnológico';
                break;
        }
    }

    
    private function parseValorToMascara($valor) {
        return 'R$' . number_format($valor, 2, ',', '.');
    }
    
    public function parseToTable() {
        $projetos = new Application_Model_DbTable_Projetos();
        $tabela = $projetos->buscarTodos();
        $saida = '';
        foreach($tabela as $t) {
            $saida .= "<tr onclick='javascript:carrega(" . $t['id'] . ");'>";
            $saida .= "<td>" . $this->decidiStatus($t['status']) . "</td>";
            $saida .= "<td>" . $this->decidiUnidade($t['unidade']) . "</td>";
            $saida .= "<td>" . $t['cliente'] . "</td>";
            $saida .= "<td>" . $t['titulo'] . "</td>";
            $saida .= "<td>" . $this->parseValorToMascara($t['valorproposto']) . "</td>";
            $saida .= "<td>" . $this->parseValorToMascara($t['valorpago']) . "</td>";
            $valorPMenosvalorP = $t['valorproposto'] - $t['valorpago'];
            $saida .= "<td>" . $this->parseValorToMascara($valorPMenosvalorP) . "</td>";
            $saida .= "<td>" . $this->parseValorToMascara($t['investimentoprevisto']) . "</td>";
            $saida .= "<td>" . $this->parseValorToMascara($t['investimentorelizado']) . "</td>";
            $saida .= "<td>" . $this->decidiTipoProjeto($t['categoria']) . "</td>";
            $saida .= "<td>" . $this->parseDateToBR($t['datarealinicio']) . "</td>";
            $saida .= "<td>" . $this->parseDateToBR($t['datarealtermino']) . "</td>";
            $saida .= "</tr>";
        }
        return $saida;
    }
}

