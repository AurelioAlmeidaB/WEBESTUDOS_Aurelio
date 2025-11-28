$(document).ready(function() {
 
    const $lampada = $('#lampada');
    const $status = $('#status');
    const $body = $('body');

    
    $lampada.hover(
        function() {
            // MOUSE ENTRA (Ligar)
            $(this).attr('src', 'acesa.png');
            $status.text('Lâmpada acesa');
            
        
            $body.addClass('luz-acesa');
        }, 
        function() {
            // MOUSE SAI (Desligar)
            $(this).attr('src', 'apagada.png');
            $status.text('Lâmpada apagada');
            
           
            $body.removeClass('luz-acesa');
        }
    );
});