<?php

class sesiones{

    private $teatro;
    private $fecha;
    private $hora;
    private $idSesion;
    private $entradasDisponibles;

    
    public function carga($idSesion){
        try {
            $db = db::getInstance();
            $sql="SELECT * FROM sesiones";
            $sql .= " where idSesion= ".$idSesion;
            // echo $sql;
            foreach ($db->query($sql) as $row) {
                $this->teatro = $row['teatro'];
                $this->fecha = $row['fecha'];
                $this->hora = $row['hora'];
                $this->idSesion = $row['idSesion'];
                $this->entradasDisponibles = $this->getEntradasDisponiblesEnSesion();
            }
            $db = null;
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    
    public function getEntradasDisponiblesEnSesion(){

        $teatro = new teatros();
        $teatro->carga($this->getTeatro());
        $aforo=$teatro->getAforo();

        $entradas = new entradas();
        
        $vendidas=$entradas->getTotalEntradasVendidas($this->getIdSesion());

        if ($aforo>$vendidas){
            return true;
        }else{
            return false;
        }
        
    }


    

    /**     * Get the value of teatro     */ 
    public function getTeatro()    
    {return $this->teatro;}

    /**     * Get the value of fecha     */ 
    public function getFecha()    
        {return $this->fecha;}

    /**     * Get the value of hora     */     
    public function getHora()    
        {return $this->hora;}

    /**     * Get the value of idSesion     */     
    public function getIdSesion()
        {return $this->idSesion;}
    
    /**     * Set the value of teatro   */ 
    public function setTeatro($teatro)
        {$this->teatro = $teatro;return $this;}

    /**     * Set the value of fecha    */ 
    public function setFecha($fecha)
        {$this->fecha = $fecha;return $this;}

    /**     * Set the value of hora     */ 
    public function setHora($hora)
        {$this->hora = $hora;return $this;}

    /**     * Set the value of idSesion     */ 
    public function setIdSesion($idSesion)
        {$this->idSesion = $idSesion;return $this;}

    public function getAllSesiones_Teatro($idTeatro){
        try{
            $db = db::getInstance();
            $sql="SELECT * FROM sesiones";
            $sql.=" WHERE teatro=".$idTeatro;
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

    





    /**
     * Get the value of entradasDisponibles
     */ 
    public function getEntradasDisponibles()
    {
        return $this->entradasDisponibles;
    }

    /**
     * Set the value of entradasDisponibles
     *
     * @return  self
     */ 
    public function setEntradasDisponibles($entradasDisponibles)
    {
        $this->entradasDisponibles = $entradasDisponibles;

        return $this;
    }
}

?>