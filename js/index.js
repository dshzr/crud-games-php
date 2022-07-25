const btnFechar = $("#close-popup");
const popup = document.querySelector("#popup-editar");
const botoesEditar = $(".btn-editar");

//pegar todos os botoes de editar e adicionar um evento de clique para abrir o popup
Array.from(botoesEditar).forEach((game) => {
  game.addEventListener("click", ({ target }) => {
    const gameID = target["id"].split("-").pop();
    showDataInPopup(gameID);
    popup.classList.remove("hide");
  });
});

//fechar popup editar game
btnFechar.on("click", () => $("#popup-editar").addClass("hide"));

// mostrar dados no popup com fetch
function showDataInPopup(id) {
  fetch("../classes/json_all_games.php")
    .then((res) => res.json())
    .then((data) => {
      const dados = data.map((item) => {
        return {
          id: item.id,
          nome: item.nome,
          descricao: item.descricao,
          valor: item.valor,
        };
      });
      let gameSelecionado = dados[id - 1];
      $("#nome-game").val(gameSelecionado.nome);
      $("#descricao-game").val(gameSelecionado.descricao);
      $("#valor-game").val(gameSelecionado.valor);
    });
}
