<?php
class Geral{
    private $data;

    public function _construct(){
        $this->data = new Data();
    }

    public function pre($value){
        echo "<pre style='position:absolute;z-index:99999999;display:inline-block;padding: 20px;color: #333333;background: #c9c9c9;;border-radius: 10px;box-shadow: 0px 2px 3px #0e0e0e61;margin-bottom:10px;margin-right:5px;'>";
        var_dump($value);
        echo "</pre>";

    }
    
    public function getParam($param) {
        if(!empty($_GET[$param]) && !empty($_POST[$param])){
            throw new Exception("O parámetro ".$param." já está definido, defina um nome diferente");
        }
    
        try {
            if(!empty($_GET[$param])){
                return $_GET[$param];
            } elseif(!empty($_POST[$param])){
                return $_POST[$param];
            } else {
                return null;
            }
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function conectBase($type_con, $query)
    {
        $servername = "sql300.infinityfree.com";
        $username = "if0_37031138";
        $password = "qNTRWRwSi5sCfg";
        $dbname = "if0_37031138_umentor_teste";

        try {
            // Crear la conexión
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verificar la conexión
            if ($conn->connect_error) {
                die("Erro na conexao: " . $conn->connect_error);
            }
            
            // Establecer la codificación a UTF-8
            $conn->set_charset("utf8");

            switch ($type_con) {
                case 'Execute':
                    $result = $conn->query($query);
                break;
                case 'GetArray':
                    $result = $conn->query($query);
                    $rows = array();
                    while ($row = $result->fetch_assoc()) {
                        $rows[] = $row;
                    }
                return $rows;
                break;
                case 'GetOne':
                    $result = $conn->query($query." LIMIT 1");
                    $rows = array();
                    while ($row = $result->fetch_assoc()) {
                        $rows[] = $row;
                    }
                return $rows;
                break;
                default:
                break;
            }
        } catch (PDOException $e) {
            echo "Erro na consulta: " . $e->getMessage();
        }

        $conn->close();
    }
}
