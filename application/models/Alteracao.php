<?php

class Application_Model_Alteracao
{
    public function parseToTable() {
        $projetos = new Application_Model_DbTable_Projetos();
        $tabela = $projetos->buscarTodos();
        $saida = '';
        foreach($tabela as $t) {
            $saida .= "<tr>";
            $saida .= "<td>" . $this->decidiStatus($t['status']) . "</td>";
            $saida .= "<td>" . $this->decidiUnidade($t['unidade']) . "</td>";
            $saida .= "<td>" . $t['titulo'] . "</td>";
            $saida .= "<td>" . $t['cliente'] . "</td>";
            $saida .= "<td>" . $t['subprojetofai'] . "</td>";
            $saida .= "</tr>";
        }
        return $saida;
    }
    
    public function decidiStatus($number) {
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
        
    public function decidiUnidade($number) {
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
                   return 'Un Sorocaba';
                   break;
               case 5:
                   return 'Corporate';
                   break;
            }
     }
     
     public function parseToTable2($vetor) {
         $retorno = '';
         for($i = 0; $i < count($vetor); $i++) {
            $retorno .= "<tr>";
            $retorno .= "<td>" . $this->decidiStatus($vetor[$i]['status']) . "</td>";
            $retorno .= "<td>" . $this->decidiUnidade($vetor[$i]['unidade']) . "</td>";
            $retorno .= "<td>" . $vetor[$i]['titulo'] . "</td>";
            $retorno .= "<td>" . $vetor[$i]['cliente'] . "</td>";
            $retorno .= "<td>" . $vetor[$i]['subprojetofai'] . "</td>";
            $retorno .= "</tr>";
         }
         return $retorno;
     }
     
     public function Busca($status = '', $unidade = '') {
         $db_table = new Application_Model_DbTable_Projetos();
         if($status == '' && $unidade == '')
             return;
         else {
             return $this->parseToTable2($db_table->Busca($status, $unidade));
         }
     }
}

