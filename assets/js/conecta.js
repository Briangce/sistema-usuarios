function ajax(dados, acao) {
  let values;

  // console.log(dados)
  // console.log(acao)

  // dadosConection = {
  //   m: "landingpage",
  //   u: ".",
  //   a: "landingPage",},

  // dadosConection.constructor.assign(dadosConection, dados);

  $.ajax({
    type: "POST",
    url: "index.php",
    data: dados,
    beforeSend: function () {
      switch (acao) {
        case "menu":
          $(".main_content_iner").html(
            '<div class="loader--ellipsis colord_bg_1 mb_30"><div></div><div></div><div></div><div></div></div>'
          );
        break;
        default:
        break;
      }
    },
    success: function (resp) {
      switch (acao) {
        case "menu":
          waitForElement(".main_content_iner").then(function(){
            $(".main_content_iner").html(resp);
          })
        break;
        case "editarUser":
          ativarModalEditarUser()
          waitForElement("#nome_usuario").then(function(){
            values = JSON.parse(resp)[0]
            $("#nome_usuario").val(values["nome"])
            $("#email").val(values["email"])
            $("#situacao").val(values["situacao"]).change();
            $("#data").val(moment(values["data_admissao"], 'YYYY-MM-DD').format('DD-MM-YYYY'))
          }).catch(function(error){
            console.log(error)
          })
        break;
        case "updateUser":
            Swal.fire({
              icon: 'success',
              title: 'Otimo',
              text: 'O usuário foi alterado!'
            })
            console.log(JSON.stringify(resp))
            menu("geralUsers")
        break;
        case "criarUser":
          // console.log(resp)
          response = JSON.parse(resp)
          // console.log(response)
        if(response[0]){
          $("#Modal .modal-body").html("")
            $('#Modal').modal('toggle')
            Swal.fire({
              icon: 'success',
              title: 'Otimo',
              text: 'O usuário foi criado!'
            })
            menu("geralUsers")
        }else{
          alerta(response[1])
        }
        break;
        case "deletarUser":
          menu("geralUsers")
        break;
        case "addFormCriarUser":
        case"addFormEditarUser":
          $("#Modal .modal-body").html(resp)
        break;
        case "logout":
          window.location.href = "./?acao=showLogin"
        break;
        default:
        break;
      }
    },
    error: function (e) {
      console.log(e)
      // alert("Houve um erro");
    },
  });
}

async function menu(option) {
  let dados = {
    acao: "menu",
    page: option,
  };

  if ($(".active").length) {
    $(".active").eq(0).removeClass("active");
  }
  $("#" + option).addClass("active");

  ajax(dados, dados.acao);
}