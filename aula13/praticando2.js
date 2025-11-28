$(document).ready(function() {
   
    const $boxes = $('.box');
    const $resetBtn = $('#resetBtn');
    const $preview = $('#preview');
    const $message = $('#message');
    const $body = $('body');
    
  
    let corOriginal = 'white';

   
    const corSalva = localStorage.getItem('corFundo');
    const nomeSalvo = localStorage.getItem('nomeCor');
    
    if (corSalva) {
        $body.css('background-color', corSalva);
        corOriginal = corSalva;
        if(nomeSalvo) {
            $message.text(`Cor carregada: ${nomeSalvo}`);
        }
    }

    
    $boxes.on('click', function() {
        const cor = $(this).css('background-color');
        const nomeCor = this.id; 
        
        $body.css('background-color', cor);
        corOriginal = cor;
        
        localStorage.setItem('corFundo', cor);
        localStorage.setItem('nomeCor', nomeCor);
        
        $message.text(`A cor ${nomeCor} foi salva!`);
    });

   
    $boxes.on('mouseover', function() {
        const cor = $(this).css('background-color');
        $body.css('background-color', cor);
        $preview.show();
    });

 
    $boxes.on('mouseout', function() {
        $body.css('background-color', corOriginal);
        $preview.hide();
    });

    // 5. Botão Reset
    $resetBtn.on('click', function() {
        $body.css('background-color', 'white');
        corOriginal = 'white';
        
        $preview.hide();
        $message.text('');
        
        localStorage.removeItem('corFundo');
        localStorage.removeItem('nomeCor');
    });
});