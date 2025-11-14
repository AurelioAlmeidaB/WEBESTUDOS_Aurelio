function calc(op) {
    let n1 = parseFloat(document.getElementById("n1").value);
    let n2 = parseFloat(document.getElementById("n2").value);
    let res;

    switch (op) {
        case '+': res = n1 + n2; break;
        case '-': res = n1 - n2; break;
        case '*': res = n1 * n2; break;
        case '/': res = n2 !== 0 ? n1 / n2 : "Erro"; break;
    }

    document.getElementById("resultado").value = res;
}

document.getElementById("btn-soma").addEventListener("click", () => calc('+'));
document.getElementById("btn-sub").addEventListener("click", () => calc('-'));
document.getElementById("btn-mult").addEventListener("click", () => calc('*'));
document.getElementById("btn-div").addEventListener("click", () => calc('/'));
