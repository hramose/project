<?php

include("Fuentes_Abiertas.php");


	if(isset($_POST['fa_titulo']) && !empty($_POST['fa_titulo']) &&
		isset($_POST['fa_tipo']) && !empty($_POST['fa_tipo']) &&
		isset($_POST['fa_descripcion']) && !empty($_POST['fa_descripcion'])){

			$titulo = $_POST['fa_titulo'];
			$tipo = $_POST['fa_tipo'];
			$descripcion = $_POST['fa_descripcion'];

		include('../../../../utilidad/php/Conexion.php');
		include('../../../../utilidad/php/ObtenerIp.php');		

		$con = mysql_connect($host,$user,$pw)or die("Problemas al Conectar");
			mysql_select_db($db,$con)or die("Problemas al Conectar con la Base de Datos");
	
		mysql_query("INSERT INTO bitacora (UCEDULA, HOST, FECHA, ACCION, TABLA) values ('$_SESSION[usercedula]', '$ip', NOW(), 'Registrar','uaf_fuentes_abiertas_articulo_t')",$con);

		$obj = new Fuentes_Abiertas();
		$obj->Fuentes_Abiertas($titulo,$tipo);
		$obj->Registrar_Titulo();				

		$rs = mysql_query("SELECT MAX(ID_FAAT) AS id FROM uaf_fuentes_abiertas_articulo_t");
				if ($row = mysql_fetch_row($rs)) {
					$id = trim($row[0]);

					$obj = new Fuentes_Abiertas();
					$obj->ObtenerM($id,$descripcion);
					$obj->Registrar_Descripcion();

					echo " Datos registrados correctamente";

				}
				




	}	elseif(isset($_POST['id_fa']) && !empty ($_POST['id_fa']) &&
		isset($_POST['fa_contenido']) && !empty ($_POST['fa_contenido'])){

		$id = $_POST['id_fa'];
		$descripcion = $_POST['fa_contenido'];
		
		include('../../../../utilidad/php/Conexion.php');
		include('../../../../utilidad/php/ObtenerIp.php');		

		$con = mysql_connect($host,$user,$pw)or die("Problemas al Conectar");
			mysql_select_db($db,$con)or die("Problemas al Conectar con la Base de Datos");
	
		mysql_query("INSERT INTO bitacora (UCEDULA, HOST, FECHA, ACCION, TABLA) values ('$_SESSION[usercedula]', '$ip', NOW(), 'Registrar','uaf_fuentes_abiertas_articulo_d')",$con);

						$obj = new Fuentes_Abiertas();
						$obj->ObtenerM($id,$descripcion);
						$obj->Registrar_Descripcion();

						echo " Contenido registrado correctamente";

						

	}elseif (isset($_FILES['file_fa_manual']) && !empty($_FILES['file_fa_manual']) &&
		isset($_POST['fa_manual_tipo']) && !empty($_POST['fa_manual_tipo']) &&
		isset($_POST['fa_manual_titulo']) && !empty($_POST['fa_manual_titulo'])) {
		# code...

		$valor = $_POST['fa_manual_tipo']; 	
		$titulo = $_POST['fa_manual_titulo']; 	
		$file = $_FILES["file_fa_manual"];
		$nombre = $file["name"];
		$tipo = $file["type"];
		$ruta_provicional = $file["tmp_name"];
		$size = $file["size"];
		$dimensiones = getimagesize($ruta_provicional);
		$width = $dimensiones[0];
		$heihg = $dimensiones[1];
		$carpeta = "../manual/";
		$reporte = "";
		
		if($file['size'] > 15000000){ //capacidad maxima para el archivo 4mb

			$reporte .= "<p style='color:red'>Error, El archivo supera el maximo de tamaño. </p>";
		
		}elseif($tipo=="application/octet-stream" || $tipo=="application/pdf" || $tipo =="application/vnd.oasis.opendocument.text" || $tipo == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"){ 

		$src = $carpeta.$nombre;
			
		include('../../../../utilidad/php/Conexion.php');
		include('../../../../utilidad/php/ObtenerIp.php');		

		$con = mysql_connect($host,$user,$pw)or die("Problemas al Conectar");
			mysql_select_db($db,$con)or die("Problemas al Conectar con la Base de Datos");
	
		mysql_query("INSERT INTO bitacora (UCEDULA, HOST, FECHA, ACCION, TABLA) values ('$_SESSION[usercedula]', '$ip', NOW(), 'Registrar','uaf_fuentes_abiertas_manual')",$con);
			
			$obj = new Fuentes_Abiertas();
			$obj->Obtener_Registrar_Multimedia($titulo,$valor,$src);
			$obj->Registrar_Manual();

			move_uploaded_file($ruta_provicional,$src);
			
				$reporte .= "<p> Datos registrado exitosamente.</p>";

		}else{

			$reporte .= "<p>Error, el archivo no es un documento.</p>";


		}
			

				echo $reporte;
		
			//move_uploaded_file($ruta_provicional,$src);
			
	}elseif(isset($_FILES['file_fa_tutorial']) && !empty($_FILES['file_fa_tutorial']) &&
		isset($_POST['fa_tutorial_tipo']) && !empty($_POST['fa_tutorial_tipo']) &&
		isset($_POST['fa_tutorial_titulo']) && !empty($_POST['fa_tutorial_titulo'])){


		$valor = $_POST['fa_tutorial_tipo']; 	
		$titulo = $_POST['fa_tutorial_titulo']; 	
		$file = $_FILES["file_fa_tutorial"];
		$nombre = $file["name"];
		$tipo = $file["type"];
		$ruta_provicional = $file["tmp_name"];
		$size = $file["size"];
		$dimensiones = getimagesize($ruta_provicional);
		$width = $dimensiones[0];
		$heihg = $dimensiones[1];
		$carpeta = "../tutorial/";

		$reporte = "";

		$src = $carpeta.$nombre;

		if($file['size'] > 40000000){ //capacidad maxima para el archivo 4mb

			$reporte .= "<p style='color:red'>Error, El archivo supera el maximo de tamaño. </p>";
		
		}elseif(  $tipo=="video/webm" || $tipo=="video/webm.webm" || $tipo=="video/mp4" || $tipo=="video/MPEG-4"){ 
						
			include('../../../../utilidad/php/Conexion.php');
			include('../../../../utilidad/php/ObtenerIp.php');		

			$con = mysql_connect($host,$user,$pw)or die("Problemas al Conectar");
				mysql_select_db($db,$con)or die("Problemas al Conectar con la Base de Datos");
		
			mysql_query("INSERT INTO bitacora (UCEDULA, HOST, FECHA, ACCION, TABLA) values ('$_SESSION[usercedula]', '$ip', NOW(), 'Registrar','uaf_fuentes_abiertas_tutorial')",$con);
				
	
			$obj = new Fuentes_Abiertas();
			$obj->Obtener_Registrar_Multimedia($titulo,$valor,$nombre);
			$obj->Registrar_Tutorial();



					move_uploaded_file($ruta_provicional,$src);

					$reporte .= "<p> Datos registrado exitosamente. </p>";



				}else{

				
					$reporte .= "<p>Error, el archivo no es un video.</p>";


				}
	
				echo $reporte;

	

	}else{

		echo "No se encontro ninguna Funcion";

	}




?>