<form action="">
  <label class="inputCamp elemTitle" for="nome_usuario">Nome do funcionario</label>
  <input autocomplete="username" type="text" name="nome_usuario" id="nome_usuario">
  <label class="inputCamp elemTitle" for="email">Email</label>
  <input autocomplete="email" type="text" name="email" id="email">

  <label class="inputCamp elemTitle" for="data">Data de admissão</label>
  <input type="text" class="date_time" id="data" maxlength="19">
  <label class="inputCamp elemTitle" for="situacao">Situação do Colaborador</label>
  <select id="situacao">
  <option value="" selected>Selecione a Situação do Colaborador</option>
  <option value="ativo">Ativo</option>
  <option value="inativado">Inativado</option>
  </select>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment.min.js" integrity="sha512-hUhvpC5f8cgc04OZb55j0KNGh4eh7dLxd/dPSJ5VyzqDWxsayYbojWyl5Tkcgrmb/RVKCRJI1jNlRbVP4WWC4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $('#data').mask("00-00-0000", {placeholder: "__/__/____"});
</script>