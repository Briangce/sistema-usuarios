
const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})


function deletarUser(id){
  let dados = {
    acao: "deletarUser",
    action: "deletarUser",
    id: id,
  };

  swalWithBootstrapButtons.fire({
    title: 'Quer deletar o usuário?',
    text: "Esta ação não é reversível!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Sim, deletar!',
    cancelButtonText: 'Não, cancelar!',
    reverseButtons: true
  }).then((result) => {
    if (result.isConfirmed) {
        ajax(dados, dados.action);

      swalWithBootstrapButtons.fire(
        'Deletada!',
        'O usuário foi deletado!',
        'success'
      )
    } else if (
      /* Read more about handling dismissals below */
      result.dismiss === Swal.DismissReason.cancel
    ) {
      swalWithBootstrapButtons.fire(
        'Cancelado',
        'O usuário está segura agora',
        'error'
      )
    }
  })
}


function showModal($title){
    let myModal = new bootstrap.Modal($('#Modal'))
    $("#ModalLabel").text($title)
    myModal.show()
}

function ativarModalEditarUser(){
  let dados = {
    acao: "addFormEditarUser",
    action: "addFormEditarUser",
  }
  showModal("Editar Usuário")
  ajax(dados, dados.action)
}

function ativarModalCriarUser(){
  let dados = {
    acao: "addFormCriarUser",
    action: "addFormCriarUser",
  }
  $("#preview").remove()
    showModal("Criar Novo Usuário")
    ajax(dados, dados.action)
    $("#save").attr("onclick", "criarUser()")
}

function editarUser(id){
  let dados = {
    acao: "actionPage",
    action: "editarUser",
    id: id,
    }
    
  $("#preview").remove()

  $("#save").attr("onclick", "updateUser("+id+")")
  ajax(dados, dados.action)
}

function updateUser(id){
  var dados = {
    acao:"updateUser",
    action: "updateUser",
    userData:{
      id: id,
      user: $("#nome_usuario").val(),
      email: $("#email").val(),
      data: $("#data").val(),
      situacao: $("#situacao").val()
    }
  }, data = [
    ["#nome_usuario","6","Por favor, escreva o nome do colaborador"],
    ["#email","6","Por favor, escreva o email do colaborador"],
    ["#data","7","Por favor, defina uma data válida de admissão para o colaborador"],
    ["#situacao","5","Por favor, defina a situação do colaborador"],
  ]

  if(!validDados(data)){
    return false;
  }


  swalWithBootstrapButtons.fire({
    title: 'Deseja salvar as alterações?',
    text: "Esta ação vai salvar as alterações deste usuário!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Sim, alterar!',
    cancelButtonText: 'Não, cancelar!',
    reverseButtons: true
  }).then((result) => {
    if (result.isConfirmed) {
      dados.userData.data = moment(dados.userData.data, 'DD-MM-YYYY').format('YYYY-MM-DD')
      console.log(dados)
      ajax(dados, dados.action)
    } else if (
      /* Read more about handling dismissals below */
      result.dismiss === Swal.DismissReason.cancel
    ) {
      swalWithBootstrapButtons.fire(
        'Cancelado',
        'O usuário não foi alterado',
        'error'
      )
    }
  })
}

function criarUser(){
  var dados = {
    acao:"criarUser",
    action: "criarUser",
    userData:{
      user: $("#nome_usuario").val(),
      email: $("#email").val(),
      data: $("#data").val()
    }
  }, data

  data = [
    ["#nome_usuario","6","Por favor, escreva o nome do colaborador"],
    ["#email","6","Por favor, escreva o email do colaborador"],
    ["#data","7","Por favor, defina uma data válida de admissão para o colaborador"],
  ]

  if(!validDados(data)){
    return false;
  }

    swalWithBootstrapButtons.fire({
      title: 'Deseja criar este usuário?',
      text: "Esta ação vai criar um novo usuário!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Sim, criar!',
      cancelButtonText: 'Não, cancelar!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        dados.userData.data = moment(dados.userData.data, 'DD-MM-YYYY').format('YYYY-MM-DD')
        ajax(dados, dados.action)
      }
    })
}

$("button[data-bs-dismiss='modal']").click(function(){
  $("#Modal .modal-body").html("")
  $("#preview").remove()
})

$(".menuOp").click(function (e) {
  let id = $(this).attr("id");
  // console.log(id)
  menu(id);
  e.preventDefault();
});

waitForElement("#sidebar_menu").then(function(elem){
  $("#sidebar_menu").metisMenu();
  menu("geralUsers");
}).catch(function(error){
  console.log(error)
})	