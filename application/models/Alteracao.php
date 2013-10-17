<?php

class Application_Model_Alteracao
{
    public function arrumaValor($valor) {
        $resultado = str_replace('.', '', $valor);
        $resultado = str_replace(',', '.', $resultado);
        return $resultado;
    }
    
    public function dataToMysql($data) {
        $retorno = explode('/', $data);
        $retorno = $retorno[2] . "-" . $retorno[1] . "-" . $retorno[0];
        return $retorno;
    }
    
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
                   return 'Un Sorocaba';
                   break;
               case 5:
                   return 'Corporate';
                   break;
            }
     }
     
     private function parseToTable2($vetor) {
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
            $retorno .= "<tr onclick='javascript:carrega(" . $vetor[$i]['id'] . ");'>";
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
     
     private function parseDateToBR($data) {
         $data = explode("-", $data);
         $data = $data[2] . "/" . $data[1] . "/" . $data[0];
         return $data;
      }
      
      private function parseToReais($valor) {
          //$valor = "R$ " . $valor;
          $valor = 'R$ ' .  number_format($valor, 2, ',', '.');
          return $valor;
      }
     
     private function ArrayToCSV($vetor) {
         $saida = '';
         $saida .= $vetor[0]['id'] . ";";
         $saida .= $vetor[0]['status'] . ";";
         $saida .= $vetor[0]['cliente'] . ";";
         $saida .= $vetor[0]['titulo'] . ";";
         $saida .= $vetor[0]['subprojetofai'] . ";";
         $saida .= $vetor[0]['unidade'] . ";";
         $saida .= $vetor[0]['resumo'] . ";";
         $saida .= $vetor[0]['origem'] . ";";
         $saida .= $this->parseDateToBR($vetor[0]['dataaprovacao']) . ";";
         $saida .= $vetor[0]['duracao'] . ";";
         $saida .= $this->parseDateToBR($vetor[0]['dataprevistainicio']) . ";";
         $saida .= $this->parseDateToBR($vetor[0]['dataprevistatermino']) . ";";
         $saida .= $this->parseToReais($vetor[0]['valorproposto']) . ";";
         $saida .= $vetor[0]['categoria'] . ";";
         $saida .= $vetor[0]['ob'] . ";";
         $saida .= $this->parseDateToBR($vetor[0]['datarealinicio']) . ";";
         $saida .= $this->parseDateToBR($vetor[0]['datarealtermino']) . ";";
         $saida .= $this->parseToReais($vetor[0]['valorpago']) . ";";
         $saida .= $this->parseToReais($vetor[0]['investimentorelizado']) . ";";
         $saida .= $this->parseToReais($vetor[0]['investimentoprevisto']) . ";";
         return $saida;
     }
     
     public function preencheCamposAlteracao($id) {
         $db_table = new Application_Model_DbTable_Projetos();
         return $this->ArrayToCSV($db_table->buscaPorId($id));
     }
     
     public function Busca($status = '', $unidade = '') {
         $db_table = new Application_Model_DbTable_Projetos();
         if($status == '' && $unidade == '')
             return;
         else {
             return $this->parseToTable2($db_table->Busca($status, $unidade));
         }
     }
     
     public function Altera($fieldss = array(), $id = -1) {
         if($id == -1)
             return false;
         else {
             $db_table = new Application_Model_DbTable_Projetos();
             return $db_table->Alterar($fieldss, $id);    
            
         }
     }
}

