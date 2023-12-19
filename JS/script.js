let carrinho = [];
let total = 0;

function adicionarCarrinho(nome, preco) {
    carrinho.push({ nome: nome, preco: preco });
    total += preco;
    atualizarCarrinho();
}

function removerCarrinho(indice) {
    total -= carrinho[indice].preco;
    carrinho.splice(indice, 1);
    atualizarCarrinho();
}

function atualizarCarrinho() {
    var listarCarrinho = document.getElementById("itensCarrinho");
    var totalCarrinho = document.getElementById("totalCarrinho");

    listarCarrinho.innerHTML = "";

    for (var i = 0; i < carrinho.length; i++) {
        var item = document.createElement("li");
        item.textContent = carrinho[i].nome + " R$ " + carrinho[i].preco;

        var botaoRemover = document.createElement("button");
        botaoRemover.textContent = "Remover";

        botaoRemover.onclick = (function (index) {
            return function () {
                removerCarrinho(index);
            };
        })(i);

        item.appendChild(botaoRemover);
        listarCarrinho.appendChild(item);
    }

    totalCarrinho.textContent = "Total: R$ " + total.toFixed(2);
}

function realizarCompra() {
    localStorage.setItem("carrinho", JSON.stringify(carrinho));
    localStorage.setItem("total", total.toString()); // Converta 'total' para uma string
    window.location.href = "confirmacaos.html"; // Corrija o nome do arquivo aqui
}
