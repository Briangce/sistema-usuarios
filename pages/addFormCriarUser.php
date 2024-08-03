<form action="">
  <label class="inputCamp elemTitle" for="nome_usuario">Nome do funcionario</label>
  <input autocomplete="username" type="text" name="nome_usuario" id="nome_usuario">
  <label class="inputCamp elemTitle" for="email">Email</label>
  <input autocomplete="email" type="text" name="email" id="email">

  <label class="inputCamp elemTitle" for="data">Data de admissão</label>
  <input type="text" class="date_time" id="data" maxlength="19">
</form>

<script>
  $('#data').mask("00-00-0000", {placeholder: "__/__/____"});
</script>