function getParam(name, url) {
    if (!url) url = window.location.href;
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
  }

  function removeParam(param){
    let link = window.location.search
    var queryArray = link.split('&'),
    newQueryString = '',
    regex = new RegExp(param);

    for (let i = 0; i < queryArray.length; i++) {
      let param = queryArray[i];

      if (!regex.test(param)) {
          newQueryString += (newQueryString === '' ? '' : '&') + param;
      }else if(queryArray.length === 1){
        newQueryString = "?"
      }
    }
    window.history.replaceState({}, document.title, newQueryString);
  }

  function ajaxEvents(action, empresa, data) {
    return new Promise(function(resolve, reject) {
      $.ajax({
        type: "POST",
        url: "../../index.php?&acao=acoesLeads",
        data: {
          "action": action,
          "empresa": empresa,
          "data": data //ARRAY de ARRAYS
        },
        beforeSend: function() {},
        success: function(resp) {
          resolve(resp)
        },
        error: function(xhr, status, error) {
          reject(error)
        },
      });
    })
  }

  function waitForElement(elementByQuery) {
    return new Promise(function(resolve, reject) {
      var element = document.querySelector(elementByQuery);
      if(element) {
        resolve(element);
        return;
      }
      var intervalId = setInterval(function() {
        element = document.querySelector(elementByQuery);
        if(element) {
          clearInterval(intervalId);
          resolve(element);
        }
      }, 100);
    });
  }

  function debounce(func, delay) {
    let timerId;
    return function(...args) {
      clearTimeout(timerId);
      timerId = setTimeout(() => {
        func.apply(this, args);
      }, delay);
    };
  }
  
  function forcedClick(elem){
    var eventoClic = new MouseEvent('click', {
        bubbles: true,
        cancelable: true,
        view: window
      });

    elem.dispatchEvent(eventoClic)
  }

  $("textarea").on("keyup focus change", function () {
        $(this).attr("style", `height:0!important;`);
        $(this).attr("style", `height:${this.scrollHeight}px!important;`);
  });

  function alerta(msg) {
    swal.fire({
      title: 'Opss!',
      icon: 'warning',
      text: msg,
      iconColor: "#E96618",
      width: "45em",
      confirmButtonText: 'Voltar',
      confirmButtonColor: '#ff791a'
    })
  }


function validDados(dados) {
    let isEmail = /^[a-zA-Z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/
    for (const element of dados) {
        switch (element[1]) {
            case '0':
                if ($(element[0]).val().trim().length < 6 || $(element[0]).val().trim().split(" ").length < 2) { //NOME
                    alerta('Por favor, escreva seu nome completo')
                    return false;
                }
            break;
            case '1':
                if (!isEmail.test($(element[0]).val())) {//EMAIL
                    alerta('Por favor, escreva seu email')
                    return false;
                }
            break;
            case '2':
                if ($(element[0]).val().length < 14) {//TELEFONE
                    alerta('Por favor, escreva seu telefone corretamente')
                    return false;
                }
            break;
            case '3':
                if ($(element[0]).val().trim().replace(/\D/g, "").length != 11 && $(element[0]).val().trim().replace(/\D/g, "").length != 14) { //CPF/CNPJ
                  alerta('Por favor, escreva um CPF/CNPJ válido')
                  return false;
                }
            break;
            case '4':
                if ($(element[0]).val().trim().replace(/\D/g, "").length != 8) {//CEP
                  alerta('Por favor, escreva um CEP válido')
                  return false;
                }
            break;
            case '5':
              if ($(element[0]).val() == "0" || !$(element[0]).val()) {//CAMPO SELECT
                  alerta(element[2])
                  return false;
              }
          break;
          case '6':
              if ($(element[0]).val().length == 0) {//CAMPO VAZIO
                alerta(element[2])
                return false;
              }
          break;
            case '7':
                if (!moment($(element[0]).val().replace(/\//g, "-"), 'DD-MM-YYYY', true).isValid()) {//DATA
                    alerta(element[2])
                    return false;
                }
            break;
            case '8':
              if (!$(element[0]).val()) {//CAMPO SELECT2
                  alerta(element[2])
                  return false;
              }
          break;
            default:
                console.log("Aconteceu algum erro")
                return false;
        }
    }
    return true;
  }
  function cleanPhoneNumber(phone) {
    var cleanNumber = phone.replace(/[^\d]/g, '');
    
    if (cleanNumber.startsWith('55')) {
      cleanNumber = cleanNumber.substring(2);
    } else if (cleanNumber.startsWith('0')) {
      cleanNumber = cleanNumber.substring(1);
    }
    
    return cleanNumber;
  }


function clear() {
  $("#rua").val("");
  $("#bairro").val("");
  $("#cidade").val("");
  $("#uf").val("");
}

function cepAPI(){
  $("#cep").blur(function() {
    var cep = $(this).val().replace(/\D/g, "");
    if (cep != "") {
      var validacep = /^\d{8}$/;
      if (validacep.test(cep)) {
        $("#rua").val("...");
        $("#bairro").val("...");
        $("#cidade").val("...");
        $("#uf").val("...");
        //Consulta o webservice viacep.com.br/
        $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {
          if (!("erro" in dados)) {
            $("#rua").val(dados.logradouro);
            $("#bairro").val(dados.bairro);
            $("#cidade").val(dados.localidade);
            $("#uf").val(dados.uf);
          } else {
            clear();
            alerta("Seu CEP não foi encontrado")
            $("#cep").val('')
          }
        });
      } else {
        clear();
        alerta("Formato de CEP inválido")
        $("#cep").val('')
      }
    } else {
      clear();
    }
  });
}

removeParam("change_tp")