const btnFechar = $("#close-popup");

//abrir popup editar game

const btnDetalhesList = $(".btn-detalhes");

Array.from(btnDetalhesList).forEach((item) => {
  item.addEventListener("click", () => {
    $('#popup-editar').removeClass("hide");
  });
});

//fechar popup editar game

btnFechar.on("click", () => popup.addClass("hide"));
