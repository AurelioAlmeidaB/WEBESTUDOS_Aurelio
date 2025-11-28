
$(document).ready(function() {
    const nome = prompt("Por favor, digite seu nome:");

    if (nome) {
      
        $("#mensagem").text(`Seja bem vindo, ${nome}!`);
    } else {
        alert("Não informou o nome");
    }
});

function adicionarTexto() {
 
    const textoLorem = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
    

    $("#conteudo").append($("<p>").text(textoLorem));
}

function removerTexto() {
    $("#conteudo").empty();
}