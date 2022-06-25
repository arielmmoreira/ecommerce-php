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

  $("form").on("submit", (e) => {
    e.preventDefault();

    let obj = $(e.currentTarget);
    let button = obj.find("button[type='submit']");
    let button_html = button.html();
    let loading_text = button.data("loading-text");
    let loading_svg   = '<svg class="btn-loading-svg" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40px" height="40px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve">' +
    '	<path opacity="0.4" fill="#000" d="M20.201,5.169c-8.254,0-14.946,6.692-14.946,14.946c0,8.255,6.692,14.946,14.946,14.946' +
    '		s14.946-6.691,14.946-14.946C35.146,11.861,28.455,5.169,20.201,5.169z M20.201,31.749c-6.425,0-11.634-5.208-11.634-11.634' +
    '		c0-6.425,5.209-11.634,11.634-11.634c6.425,0,11.633,5.209,11.633,11.634C31.834,26.541,26.626,31.749,20.201,31.749z"/>' +
    '	<path fill="#000" d="M26.013,10.047l1.654-2.866c-2.198-1.272-4.743-2.012-7.466-2.012h0v3.312h0' +
    '		C22.32,8.481,24.301,9.057,26.013,10.047z">' +
    '		<animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 20 20" to="360 20 20" dur="0.5s" repeatCount="indefinite"/>' +
    '	</path>' +
    '</svg>';

    button.prop('disabled', true).addClass('btn-loading').html(loading_svg + (loading_text ? loading_text : '')).blur();
    
    $.ajax({
      url     : obj.attr('action'),
      method  : obj.attr('method'),
      data    : obj.serialize(),
      dataType: 'json',
      cache   : false,
      timeout : 35000,
    }).fail((textStatus) => {
      button.prop('disabled', false).removeClass('btn-loading').html(button_html);

      if( textStatus !== 'abort' )
      {
        Swal.fire('Erro', 'Algum erro aconteceu, por favor tente novamente mais tarde.', 'error');
      }
    }).done((data) => {
      if( data.status === 'success' ) {
        button.prop('disabled', false).removeClass('btn-loading').html(button_html);
        obj.trigger("reset");

        Swal.fire('Sucesso!', data.msg, 'success');
      }
    });
  });
});
