var formFiltro = document.querySelector("#lista-categorias");

formFiltro.addEventListener("input", function(event){
    var categoria = formFiltro.categoriaSelecionada;
    filtraPorCategoria(categoria);
}); 

function filtraPorCategoria(categoria){
    var lancamentos = document.querySelectorAll(".lancamento");
    lancamentos.forEach(function(lancamento){
        var categoriaLancamento = lancamento.querySelector(".info-categoria");
        var categoriaEhIgual = categoria.value == categoriaLancamento.textContent;
        var filtroDesativado = categoria.value == "Todos";
        if (categoriaEhIgual || filtroDesativado){
            lancamento.classList.remove("invisivel");
        }else{
            lancamento.classList.add("invisivel");
        }
    });
}