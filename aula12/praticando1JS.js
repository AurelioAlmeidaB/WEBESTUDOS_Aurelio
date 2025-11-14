
let nome = "";
if (confirm("Deseja informar seu nome?")) {
    nome = prompt("Digite seu nome:");
}
document.getElementById("nome").innerText =
    nome ? "Olá, " + nome : "Nome não informado";


document.getElementById("btn-add").addEventListener("click", addTexto);
document.getElementById("btn-remover").addEventListener("click", removerTexto);


function addTexto() {
    const div = document.getElementById("conteudo");
    const p = document.createElement("p");
    p.textContent = "Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet";
    div.appendChild(p);
}


function removerTexto() {
    document.getElementById("conteudo").innerHTML = "";
}
