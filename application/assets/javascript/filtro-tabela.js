var categorias = document.querySelector("#lista-categorias");

categorias.addEventListener("click", function(event){
    var categoria = event.target;
    filtraPorCategoria(categoria);
}); 

function filtraPorCategoria(categoria){
    var lancamentos = document.querySelectorAll(".lancamento");
    lancamentos.forEach(function(lancamento){
        var categoriaLancamento = lancamento.querySelector(".info-categoria");
        var categoriaEhIgual = categoria.textContent == categoriaLancamento.textContent;
        var filtroDesativado = categoria.textContent == "Todos";
        if (categoriaEhIgual || filtroDesativado){
            lancamento.classList.remove("invisivel");
        }else{
            lancamento.classList.add("invisivel");
        }
    });
}