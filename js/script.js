$(document).ready(function(){
  $('#produtos a#adicionar').click(function(a) {
    window.location.replace(this.href+"&qnt="+window.prompt("Quantos produtos você deseja adicionar?"));
    return false;
  });
});
