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
    let id = $(this).find('button').data("id");
    let url = $(this).find('button').data("url");

    Swal.fire({
      type: 'warning',
      title: 'Deletar usuário',
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
            Swal.fire({
              type: 'success',
              title: 'Excluído!',
              text: data.msg,
              allowOutsideClick: false,
              allowEscapeKey: false,
            }).then((result) => {
              if (result.value) {
                window.location.reload(true);
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
