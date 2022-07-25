const btnFechar = $("#close-popup");
const popup = document.querySelector("#popup-editar");
//abrir popup editar game

const btnDetalhesList = $(".btn-detalhes");

Array.from(btnDetalhesList).forEach((item) => {
  item.addEventListener("click", () => {
    $("#popup-editar").removeClass("hide");
  });
});

//fechar popup editar game

btnFechar.on("click", () => $("#popup-editar").addClass("hide"));
