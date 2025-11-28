$(document).ready(function() {
    let $quadradoAtivo = null;
    const velocidade = 10; 
    
    const $container = $('.container');

    $('.quadrado').click(function() {
        const $this = $(this);

        if ($this.hasClass('ativo')) {
          
            const leftOrig = $this.data('original-left');
            const topOrig = $this.data('original-top');
            
            $this.css({ left: leftOrig, top: topOrig });
            $this.removeClass('ativo');
            $quadradoAtivo = null;
        } else {
          
            $('.quadrado').removeClass('ativo');
            $this.addClass('ativo');
            $quadradoAtivo = $this;
        }
    });

    $(document).keydown(function(e) {
        if (!$quadradoAtivo) return;

        const posicao = $quadradoAtivo.position();
        const key = e.key.toLowerCase();
        
       
        const maxLeft = $container.width() - $quadradoAtivo.outerWidth();
      
        const maxTop = $container.height() - $quadradoAtivo.outerHeight();

        let novoLeft = posicao.left;
        let novoTop = posicao.top;

        if (key === 'w') novoTop -= velocidade;
        if (key === 's') novoTop += velocidade;
        if (key === 'a') novoLeft -= velocidade;
        if (key === 'd') novoLeft += velocidade;


        
       
        if (novoLeft < 0) novoLeft = 0;
        if (novoLeft > maxLeft) novoLeft = maxLeft;

  
        if (novoTop < 0) novoTop = 0;
        if (novoTop > maxTop) novoTop = maxTop;

   
        if (['w', 'a', 's', 'd'].includes(key)) {
            e.preventDefault(); 
            $quadradoAtivo.css({
                top: novoTop,
                left: novoLeft
            });
        }
    });
});