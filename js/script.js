// Swal

$(document).ready(function () {
	$("#produtos a#adicionar").click(function (a) {
		window.location.replace(
			this.href +
				"&qnt=" +
				window.prompt("Quantos produtos você deseja adicionar?")
		);
		return false;
	});

	$(".options").on("click", function() {
    let obj = $(this);
    let id = $(this).find('button').data("id");
    let url = $(this).find('button').data("url");
    let type = $(this).find('button').data("type");

    Swal.fire({
      type: 'warning',
      title: `Deletar ${type}`,
      text: 'Essa ação será irreversível',
      showCancelButton: true,
      focusConfirm: false,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#707070',
      confirmButtonText: 'Deletar',
      cancelButtonText: 'Cancelar',
    }).then((result) => {
      if (result.value) {
        $.ajax({
					url     : url,
					method  : 'get',
					dataType: 'json',
					cache   : false,
					timeout : 35000,
          data: {
            id: id,
          }
				}).fail((jqXHR, textStatus) => {
					if( textStatus !== 'abort' )
					{
						Swal.fire('Erro', 'Algum erro aconteceu, por favor tente novamente mais tarde.', 'error');
					}
				}).done((data) => {
					if( data.status === 'success' ) {
            obj.parent().parent().fadeOut(500, function(){
              $(this).remove();
              if($(".row").children("*:visible").length === 0) {
                $(".row").remove();
                $("section .container").append(`<p>Nenhum ${type} encontrado.</p>`);
              }
            });
          } else {
            Swal.fire('Erro', data.msg, 'error');
          }
        });
      }
    });
  });
});
