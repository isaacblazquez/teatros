<?php

class db{

	/**
	 * Mantiene una instancia de simismo
	 * @var $instance
	 */
	private static $instance = NULL;

	/**
	* Definimos el constructor en privado para que nadie
    * pueda crear una nueva instancia usando new
	*/
	private function __construct() {
	}

	/**
	* Devuelvo la instancia DB o crea una conexion inicial
	*
	* @return object (PDO)
	*
	* @access public
	*
	*/
	public static function getInstance()
	{
		if (!self::$instance)
		{
			try {
				$config = config::getInstance();
				$db_type = $config->config_values['database']['db_type'];
				$hostname = $config->config_values['database']['db_hostname'];
				$dbname = $config->config_values['database']['db_name'];
				$db_password = $config->config_values['database']['db_password'];
				$db_username = str_replace('"','',$config->config_values['database']['db_username']);
				$db_port = $config->config_values['database']['db_port'];
	
				self::$instance = new PDO("$db_type:host=$hostname;port=$db_port;dbname=$dbname", $db_username, $db_password);
				self::$instance-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				if ($config->config_values['application']['utf8']=='1'){
					$sql = " SET NAMES 'utf8';";
					$sth= self::$instance->prepare($sql);
					$sth->execute();
				}
				
			} catch (Exception $e) {
                echo "Error: ".$e;
			}
		}
		return self::$instance;
	}


	/**
	* Al igual que el constructor, haremos __clone privado
    * para que nadie pueda clonar la instancia
    */
	private function __clone()
	{
	}

}
