<?php

class ControlConexion{
	
	var $conn;
	function __construct(){
		$this->conn=null;
	}
    function abrirBd($servidor, $usuario, $password,$db){


		// $mysqli = new mysqli("localhost", $username, $password, $database);

		// $mysqli->select_db($database) or die( "Unable to select database");
		
		// $mysqli->close();
		try	{
			$this->conn = new mysqli($servidor, $usuario, $password, $db);
			if ($this->conn->connect_errno) {
			printf("Connect failed: %s\n", $this->conn->connect_error);
			exit();
			}
		}
		catch (Exception $e){
			echo "ERROR AL CONECTARSE AL SERVIDOR ".$e->getMessage()."\n";
		}
    }

    function cerrarBd() {
		try{
		$this->conn->close();
		}
		catch (Exception $e){
		echo "ERROR AL CONECTARSE AL SERVIDOR ".$e->getMessage()."\n";
		}	
    }

    function ejecutarComandoSql($sql) {
		try	{
			$this->conn->query($sql);
			}
		catch (Exception $e) {
				echo " NO SE AFECTARON LOS REGISTROS: ". $e->getMessage()."\n";
		}	
		}

	function ejecutarSelect($sql) {
			try	{
				$recordSet=$this->conn->query($sql);
				}
	
			catch (Exception $e) {
					echo " ERROR: ". $e->getMessage()."\n";
			}	
		return $recordSet;
			}   
}
?>