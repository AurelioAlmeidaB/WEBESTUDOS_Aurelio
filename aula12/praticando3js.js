let corFixa = document.body.style.backgroundColor;
const preview = document.getElementById("preview");
const caixas = document.querySelectorAll(".box");

caixas.forEach(caixa => {
    const cor = caixa.getAttribute("data-cor");

 
    caixa.addEventListener("mouseover", () => {
        document.body.style.backgroundColor = cor;
        preview.style.display = "block";
    });

  
    caixa.addEventListener("mouseout", () => {
        document.body.style.backgroundColor = corFixa;
        preview.style.display = "none";
    });

  
    caixa.addEventListener("click", () => {
        corFixa = cor;
        document.body.style.backgroundColor = cor;
    });
});
