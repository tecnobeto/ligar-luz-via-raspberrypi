<?php 
	//Retornar o estado da lampada via GET
	$id_lampada = $_GET['id_lampada'];
	$tipo_operacao = $_GET['tipo_operacao'];	

	try
	{
		//Select == 1 liga == 2 desliga == 3
		if($tipo_operacao == 1){
			$query = 'call estado_lampada('.$id_lampada.')';	
			echo selectMySQL($query);
		}	
		else if($tipo_operacao == 2){
			$query = "call liga_lampada(".$id_lampada.")";
			echo updateMySQL($query);
		}
		else if($tipo_operacao == 3) {
			$query = "call desliga_lampada(".$id_lampada.")";
			echo updateMySQL($query);
		}

	}
	catch(Exception $e)
	{
		echo 'Valor nulo';
	}

	//Inserir o estado da lamapada via POST

?>

<?php 

	function selectMySQL($query)
	{
		include 'conectaBanco.php';

		
		$result = mysql_query($query) or die ("A consulta falhou: ". mysql_error());

		$json_response = array();
		
		while($row = mysql_fetch_array($result,MYSQL_ASSOC))
			array_push($json_response, $row);
		
		mysql_close($con);
		
		return json_encode($json_response);
	}

	function updateMySQL($query)
	{
		include 'conectaBanco.php';

		$result = mysql_query($query) or die ("A consulta falhou: ". mysql_error());

		mysql_close($con);
		
		return '[{"retorno":"'.json_encode($result).'"}]';
	}
?>