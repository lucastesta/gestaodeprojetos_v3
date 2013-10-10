$(document).ready(function() {
      $('#prazos_div').slideToggle();
      $('#dados_projeto').slideToggle();
      $('#financeiro_div').slideToggle();
      
      $('#dados').click(function() {
          $('#dados_projeto').slideToggle();
      });
      
      $('#prazos').click(function() {
          $('#prazos_div').slideToggle();
      });
      
      $('#financeiro').click(function() {
          $('#financeiro_div').slideToggle();
      })
      
      $('.titulo_conteudo').click(function() {
          $('.buscador').slideToggle(600);
      });
});