$(document).ready(function(){
    $('#close-message').click(function(){
        $(this).parent().fadeOut('slow');
    });

});

$('#telefoneFixo').mask('(00) 0000-0000');
$('#celular').mask('(00) 0000-00000');
$('#dataNascimento').mask('00-00-0000');
$('#dataInicio').mask('00-00-0000');
$('#dataFim').mask('00-00-0000');