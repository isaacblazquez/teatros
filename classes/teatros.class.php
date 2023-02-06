<?php

class teatros{

    private $idTeatro;
    private $Ciudad;
    private $teatro;
    private $filas;
    private $columnas;
    private $imagen;

    private $sesiones=array();


    // GETTERS AND SETTERS

        /**     * Get the value of idTeatro     */ 
        public function getIdTeatro()
            {return $this->idTeatro;}

        /**     * Get the value of Ciudad     */ 
        public function getCiudad()
            {return $this->Ciudad;}
        
        /**     * Get the value of teatro     */ 
        public function getTeatro()
            {return $this->teatro;}

        /**     * Get the value of filas     */ 
        public function getFilas()
            {return $this->filas;}

        /**     * Get the value of columnas     */ 
        public function getColumnas()
            {return $this->columnas;}

        /**     * Get the value of imagen     */ 
        public function getImagen()
            {return $this->imagen;}


        /**     * Set the value of idTeatro     */ 
        public function setIdTeatro($idTeatro)
            {$this->idTeatro = $idTeatro;return $this;}

        /**     * Set the value of Ciudad     */ 
        public function setCiudad($Ciudad)
            {$this->Ciudad = $Ciudad;return $this;}

        /**     * Set the value of teatro     */ 
        public function setTeatro($teatro)
            {$this->teatro = $teatro;return $this;}

        /**     * Set the value of filas     */ 
        public function setFilas($filas)
            {$this->filas = $filas;return $this;}

        /**     * Set the value of columnas     */ 
        public function setColumnas($columnas)
            {$this->columnas = $columnas;return $this;}

        /**     * Set the value of imagen     */ 
        public function setImagen($imagen)
            {$this->imagen = $imagen;return $this;}


    //METODOS

    public function carga($idTeatro){
        try {
            $db = db::getInstance();
            $sql="SELECT * FROM teatros";
            $sql .= " where idTeatro= ".$idTeatro;
            // echo $sql;
            foreach ($db->query($sql) as $row) {
                $this->idTeatro = $row['idTeatro'];
                $this->Ciudad = $row['Ciudad'];
                $this->teatro = $row['teatro'];
                $this->filas = $row['filas'];
                $this->columnas = $row['columnas'];
                $this->imagen = $row['imagen'];
                $sesiones = new sesiones();
                $this->sesiones = json_decode($sesiones->getAllSesiones_Teatro($row['idTeatro']),true);
            }
            $db = null;
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function getAforo(){
        return ($this->getFilas()*$this->getColumnas());
    }

    public function getAllTeatros(){
        try{
            $db = db::getInstance();
            $sql="SELECT * FROM teatros";
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
            return $json;
            $db =null;
        }catch (Exception $e) {
            logger::auditLog($e, 2, __FILE__, __LINE__ );
            return false;
        }

    }

    public function getNumberOfSesiones(){
        return count($this->getSesiones()['data']);
    }







    /**
     * Get the value of sesiones
     */ 
    public function getSesiones()
    {
        return $this->sesiones;
    }

    /**
     * Set the value of sesiones
     *
     * @return  self
     */ 
    public function setSesiones($sesiones)
    {
        $this->sesiones = $sesiones;

        return $this;
    }
}

?>