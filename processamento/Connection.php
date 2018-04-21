<?php

class Connection {

    var $link;
    var $host;
    var $user;
    var $password;
    var $database;
    var $result;

    function connect($host, $user, $password, $database) {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;

        $this->link = mysqli_connect($host, $user, $password, $database);

        if ($this->link == FALSE) {
            echo "Conexão falhou. " . mysqli_connect_errno() . " " . mysqli_connect_error();
        } else {
            //echo "Conexão feita com sucesso";
        }
    }

    function query($query){
        $result = mysqli_query($this->link, $query);

        if (is_bool($result)){
            if($result == TRUE){
                echo "Dados inseridos com sucesso";
            }else{
                echo "Erro durante a inserção";
                echo mysqli_error($this->link);
            }
        }   
        elseif(is_object($result)){
            $this->result = $result;
        }
    }
    function fetch_row() {
            $row = mysqli_fetch_row($this->result);
            
            return $row;
    }

    function free_result() {
        mysqli_free_result($this->result);
    }

    function close() {
        mysqli_close($this->link);
    }

}

?>