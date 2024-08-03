<?php
include_once "./geral.php";

class Usuario {
    public $nome;
    public $id;
    public $data_criacao;
}

class Service extends Geral{
    private $fdata;

    public function __construct(){
        $this->fdata = new Data();
        date_default_timezone_set('America/Sao_Paulo');
    }

    public function getUsers(){
        $output = '
        <div class="container-fluid p-0">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="dashboard_header mb_50">
              <div class="row">
                <div class="col-lg-6">
                  <div class="dashboard_header_title">
                    <h3> Usuarios</h3>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="dashboard_breadcam text-end"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="QA_section">
              <div class="white_box_tittle list_header">
                <h4>Paginas de Usuários</h4>
                
              </div>
              <div class="QA_table mb_30">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
                  <table class="table table-striped" id="DataTables02"style="width: 100%;">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Situação</th>
                        <th>Data Admissão</th>
                        <th>Data Cadastro</th>
                        <th>Data Atualização</th>
                        <th>Opções</th>
                      </tr>
                    </thead>
                    <tbody>
                    <script src="./assets/js/custom.js"></script>';
        $row = $this->fdata->users();
        $row_total = count($row);

        if ($row_total > 0) {
            for ($i = 0; $i < $row_total; $i++) {
                    $output .= '<tr role="row">
                <th>
                <div class="question_content"><p class="campaign_name">' . $row[$i]["nome"] . '</p></div>
                </th>
                <td>' . $row[$i]["id"] . '</td>
                <td>' . $row[$i]["email"] . '</td>
                <td><div class="status_btn" style="background:' . ($row[$i]["situacao"] == "ativo" ? "#05d34e" : "#ff3b00") . '">' . ucfirst($row[$i]["situacao"]) . '</div></td>
                <td>' . $row[$i]["data_admissao"] . '</td>
                <td>' . $row[$i]["data_hora_cadastro"] . '</td>
                <td>' . $row[$i]["data_hora_atualizacao"] . '</td>
                <td>
                  <div class="btn-group dropstart">
                  <a class="btn btn-primary ti-settings" href="#" role="button" style="color:#fff; padding:10px;border-radius: 4px;" data-bs-toggle="dropdown" aria-expanded="false"></a>
                    <ul class="dropdown-menu" style="width: 255px;">
                      <a class="btn btn-primary ti-pencil-alt" onclick="editarUser('.$row[$i]["id"].')" href="#" role="button" style="background:#0a58ca;color:#fff; padding:10px;border-radius: 4px;margin:0" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"></a>
                      <a class="btn btn-primary ti-trash" onclick="deletarUser('.$row[$i]["id"].')" href="#" role="button" style="background:#fd517d;color:#fff; padding:10px;border-radius: 4px;margin:0" data-bs-toggle="tooltip" data-bs-placement="top" title="Apagar"></a>
                    </ul>
                  </div>
                </td>
            </tr>';
            }

            $output .= '</tbody>
            </table>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>';
        }
        return $output;
    }

    public function autenticar($email, $password)
    {
        $resp = $this->authentication($email, $password);
        // $this->pre($resp);
        // exit;
        if (!$resp[0]) {
            return [false, $resp[1]];
        } else {
            $usuario = [];
            $usuario["usuario"] = new Usuario();
            $usuario["usuario"]->nome = $resp[1];
            $usuario["usuario"]->id = $resp[2];
            $usuario["usuario"]->data_criacao = $resp[3];
            return [true, $usuario];
        }
    }

    public function verifyDadosUser($elems, $dados){

        $isEmail = '/^[a-zA-Z0-9!#$%&\'*+\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&\'*+\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/';

        for ($i=0; $i < count($elems); $i++) { 
            switch ($elems[$i]) {
                case 'username':
                    if(!$dados->user){
                        return [false, "Por favor, escreva o nome do colaborador"];
                    }
                break;
                case 'email':
                    if (!$dados->email) {
                        return [false, "Por favor, escreva o email do colaborador"];
                    }elseif (!preg_match($isEmail, $dados->email)) {
                        return [false, "Por favor escreva o email do colaborador corretamente"];
                    }
                break;
                case 'data':
                    if (!$dados->data) {
                        return [false, "Por favor, defina uma data válida de admissão para o colaborador"];
                    }
                break;
                default:
                break;
            }
        }
        return [true];
    }

    public function updateUser($id,$user,$email,$situacao,$data){
        $this->fdata->updateUser($id,$user,$email,$situacao,$data);
    }
    public function criarUser($user,$email,$data)
    {
        $this->fdata->criarUser($user,$email,$data);
    }
    public function deletarUser($id)
    {

        $this->fdata->deletarUser($id);
    }

    public function authentication($email, $senha)
    {
        if (empty($email) || empty($senha)) {
            return [false, "Preencha todos seus dados"];
        } else {
            // $this->pre($email);
            // $this->pre($senha);
            // exit;
            $valid = $this->fdata->auth(trim($email), trim($senha));
            if(!empty($valid)) {
                return [true, $valid[0]["nome"], $valid[0]["id"], $valid[0]["data_criacao"]];
            }else{
                return [false, "Usuario ou senha não válido"];
            }
        }
    }
    public function editarUser($id){
        return $this->fdata->editarUser($id);
    }
}
