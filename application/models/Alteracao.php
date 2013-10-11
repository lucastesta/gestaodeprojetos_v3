<?php

class Application_Model_Alteracao
{
    public function parseToTable() {
        $projetos = new Application_Model_DbTable_Projetos();
        $tabela = $projetos->buscarTodos();
        $saida = '';
        foreach($tabela as $t) {
            $saida .= "<tr onclick='javascript:carrega(" . $t['id'] . ");'>";
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
         $retorno .= "<table cellspacing='0' padding='0' border='1' class='display' id='tabela1'>";
         $retorno .= "<thead>
            <tr>
                <th>Status</th>
                <th>Título do Projeto</th>
                <th>Data Prevista de Início</th>
                <th>Data Prevista de Término</th>
		<th>Unidade</th>
            </tr>
        </thead>
        <tbody style='text-align:center;'>"; 
         for($i = 0; $i < count($vetor); $i++) {
            $retorno .= "<tr onclick='javascript:carrega('$vetor[$i]['id']');'>";
            $retorno .= "<td>" . $this->decidiStatus($vetor[$i]['status']) . "</td>";
            $retorno .= "<td>" . $this->decidiUnidade($vetor[$i]['unidade']) . "</td>";
            $retorno .= "<td>" . $vetor[$i]['titulo'] . "</td>";
            $retorno .= "<td>" . $vetor[$i]['cliente'] . "</td>";
            $retorno .= "<td>" . $vetor[$i]['subprojetofai'] . "</td>";
            $retorno .= "</tr>";
         }
         $retorno .= "</tbody></table>";
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

