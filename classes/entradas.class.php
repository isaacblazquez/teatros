<?php

class entradas{

    private $idSesion;
    private $fila;
    private $columna;
    
    public function getAllEntradas_Sesion($idSesion){
        try{
            $db = db::getInstance();
            $sql="SELECT * FROM entradas";
            $sql.=" WHERE idSesion=".$idSesion;
            // echo $sql;
            $sth=$db->prepare($sql);
            $sth->execute();
            $rs = $sth->fetchAll(PDO::FETCH_ASSOC);
            $json = "";
            $json .= "{\n";
            $json .= "\"data\": [";
            if (count($rs) != 0) 
                {
                $c=0;
                while ($c < count($rs)) { 
                    if (!($c==0)){$json .=",";}
                    $json .= json_encode(($rs[$c]));
                $c++;
                    }
                }
            $json .= "]";
            $json .= "}";
            // echo $json;
            return $json;
            
            $db =null;
        }catch (Exception $e) {
            echo "Error : ".$e;
            return false;
        }
    }

    public function getTotalEntradasVendidas($idSesion){
        return count(json_decode($this->getAllEntradas_Sesion($idSesion),true));
    }

















    /**
     * Get the value of idSesion
     */ 
    public function getIdSesion()
        {
            return $this->idSesion;
        }

    /**
     * Set the value of idSesion
     *
     * @return  self
     */ 
    public function setIdSesion($idSesion)
        {
            $this->idSesion = $idSesion;

            return $this;
        }

    /**
     * Get the value of fila
     */ 
    public function getFila()
    {
        return $this->fila;
    }

    /**
     * Set the value of fila
     *
     * @return  self
     */ 
    public function setFila($fila)
    {
        $this->fila = $fila;

        return $this;
    }

    /**
     * Get the value of columna
     */ 
    public function getColumna()
    {
        return $this->columna;
    }

    /**
     * Set the value of columna
     *
     * @return  self
     */ 
    public function setColumna($columna)
    {
        $this->columna = $columna;

        return $this;
    }
}
?>