var lancamentos = document.querySelectorAll(".lancamento");
var valorTotal = 0;
calculaValorTotal(lancamentos);
coloriLancamento(lancamentos)



function coloriLancamento(lancamentos){
    lancamentos.forEach(function(lancamento){
        var valor = lancamento.querySelector(".info-valor");
        if(valor.textContent < 0){
            lancamento.classList.add("valor-negativo");
        }else{
            lancamento.classList.add("valor-positivo");
        }
    });
}

function calculaValorTotal(lancamentos){
    lancamentos.forEach(function(lancamento){
        var valor = lancamento.querySelector(".info-valor");
        valorTotal += parseFloat(valor.textContent);
    });
    var h3Total = document.querySelector(".info-total");
    h3Total.textContent = valorTotal; 
}