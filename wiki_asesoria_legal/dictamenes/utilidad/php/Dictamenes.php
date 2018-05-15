<?php

ini_set('display_errors', 0); // no muestra los errores

include("../../../../utilidad/php/Suscerte.php");
include("../../../utilidad/php/Asesoria_Legal.php");



class Dictamenes extends Asesoria_Legal
{
	
	protected $id;
	protected $titulo;
	protected $tipo;
	protected $descripcion;
	protected $valor;
	protected $imagen;
	protected $fechan;
	protected $fechal;
	protected $hora;



	function Dictamenes($titulo_,$tipo_)
	{
		
			$this->titulo=$titulo_;		
			$this->tipo=$tipo_;		

	}

	

	function Conectar(){



	}

	function ObtenerM($id_,$descripcion_,$tipo_){

		$this->id=$id_;
		$this->descripcion=$descripcion_;
		$this->tipo=$tipo_;

	}


	function ObtenerE($id_){
		$this->id=$id_;
	}
	

	function Registrar_Titulo(){

		include('../../../../utilidad/php/Conexion.php');

			$con = mysql_connect($host,$user,$pw)or die("Problemas al Conectar");
			mysql_select_db($db,$con)or die("Problemas al Conectar con la Base de Datos");
	
	      	mysql_query("INSERT INTO dictamenes_articulo_t (TITULO_DAT,TIPO,UCEDULA) VALUES ('$this->titulo','$this->tipo','$_SESSION[usercedula]')",$con);
			

	}

	function Registrar_Descripcion(){


		include('../../../../utilidad/php/Conexion.php');

		$con = mysql_connect($host,$user,$pw)or die("Problemas al Conectar");
					mysql_select_db($db,$con)or die("Problemas al Conectar con la Base de Datos");		
	mysql_query("INSERT INTO dictamenes_articulo_d (ID_TITULO_DAT,DESCRIPCION_DAD,UCEDULA) VALUES ('$this->id','$this->descripcion','$_SESSION[usercedula]')",$con);
	
	
	}

	function Modificar_Titulo (){

	include('../../../../utilidad/php/Conexion.php');

		$con = mysql_connect($host,$user,$pw)or die("Problemas al Conectar");
			mysql_select_db($db,$con)or die("Problemas al Conectar con la Base de Datos");

			mysql_query("UPDATE dictamenes_articulo_t set TITULO_DAT = '$this->descripcion', TIPO = '$this->tipo', UCEDULA = '$_SESSION[usercedula]' WHERE ID_DAT = '$this->id'",$con);


	}

	function Modificar_Descripcion (){

		include('../../../../utilidad/php/Conexion.php');
			

		$con = mysql_connect($host,$user,$pw)or die("Problemas al Conectar");
			mysql_select_db($db,$con)or die("Problemas al Conectar con la Base de Datos");

			mysql_query("UPDATE dictamenes_articulo_d set DESCRIPCION_DAD = '$this->descripcion', UCEDULA = '$_SESSION[usercedula]' WHERE ID_DAD = '$this->id'",$con);

	}


	function Eliminar_Titulo(){

		include('../../../../utilidad/php/Conexion.php');


			$con = mysql_connect($host,$user,$pw)or die("Problemas al Conectar");
			mysql_select_db($db,$con)or die("Problemas al Conectar con la Base de Datos");

			mysql_query("DELETE FROM dictamenes_articulo_t WHERE ID_DAT = '$this->id'",$con);

	}

	function Eliminar_Descripcion(){

		include('../../../../utilidad/php/Conexion.php');

			$con = mysql_connect($host,$user,$pw)or die("Problemas al Conectar");
			mysql_select_db($db,$con)or die("Problemas al Conectar con la Base de Datos");

			mysql_query("DELETE FROM dictamenes_articulo_d WHERE ID_DAD = '$this->id'",$con);

	}
	
	function Mostrar_Titulos(){

		include('../../utilidad/php/Conexion.php');
		$seleccionartitulo = new PHPPaging;

			$con = mysql_connect($host,$user,$pw)or die("Problemas al Conectar");
			mysql_select_db($db,$con)or die("Problemas al Conectar con la Base de Datos");

				$seleccionartitulo->mysql_query("SELECT * FROM dictamenes_articulo_t",$con);					
				$seleccionartitulo->ejecutar();		
				while($sesion = $seleccionartitulo->mysql_fetch_array()){

					if ($sesion['TIPO'] != "privado" || $_SESSION['userrol'] == "Manager Asesoria Legal" || $_SESSION['userrol'] == "Usuario Dictamenes") {
					echo '
						<div >
							<ul class="menu">
							<li class="letra_efecto"><a href="#'.$sesion['ID_DAT'].'"> '.$sesion['TITULO_DAT'].'</a></li>
							</u>
						</div>
						';
					}
				}
	}

	function Mostrar(){

		include('../../utilidad/php/Conexion.php');
		$seleccionar = new PHPPaging;

			$con = mysql_connect($host,$user,$pw)or die("Problemas al Conectar");
			mysql_select_db($db,$con)or die("Problemas al Conectar con la Base de Datos");

				$seleccionar -> mysql_query("SELECT * FROM dictamenes_articulo_t",$con);					
				$seleccionar->ejecutar();
				while($sesion = $seleccionar->mysql_fetch_array()){

					if ($sesion['TIPO'] != "privado" || $_SESSION['userrol'] == "Manager Asesoria Legal" || $_SESSION['userrol'] == "Usuario Dictamenes") {
						echo '
						<div class="col-lg-12 text-center">
							<section id="'.$sesion['ID_DAT'].'" class="about section">
								<h2 align="left" title="Tipo de contenido: '.$sesion['TIPO'].'" >'.$sesion['TITULO_DAT'].'</h2>	
							</section>	';


							session_start();
						                
				     		if ($_SESSION['usercedula'] != null && $_SESSION['userrol'] == "Manager Asesoria Legal" || $_SESSION['userrol'] == "Usuario Dictamenes") {

						                	echo'					
				
								<form action="index"  method="post" name="form" id="modificar">
									<input type="text" name="idmodificar_dic_titulo" value="'.$sesion['ID_DAT'].'" hidden>
									<button class="botones" type="submit" data-toggle="tooltip" data-placement="top" title="Editar" value="Modificar"> [ <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> ] </button>
								</form>';											

								print '<form action="index"  method="post" name="form" id="eliminar">
									<input type="text" name="ideliminar_dic_titulo" value="'.$sesion['ID_DAT'].'" hidden>
									<button class="botones" type="submit" data-toggle="tooltip" data-placement="top" title="Eliminar" value="Eliminar" > [ <span class="glyphicon glyphicon-remove aria-hidden="true"></span> ]										
									</button>
								</form>

								<form action="index"  method="post" name="form">
									<input type="text" name="registrar_contenido_dic" value="'.$sesion['ID_DAT'].'" hidden>
									<button class="botones" type="submit" data-toggle="tooltip" data-placement="top" title="Agregar Contenido" value="Regitrar Contenido" >[ <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> ]
									</button>
								</form><br><hr>	';
							}
							echo'
						</div>';
					}

				$seleccdes = mysql_query("SELECT * FROM dictamenes_articulo_d WHERE '$sesion[ID_DAT]' = ID_TITULO_DAT",$con);			

				while($sesionwiki = mysql_fetch_array($seleccdes)){

					if ($sesion['TIPO'] != "privado" || $_SESSION['userrol'] == "Manager Asesoria Legal" || $_SESSION['userrol'] == "Usuario Dictamenes") {

						echo '<div class="col-lg-12">         
                
                    	<p class="parrafo">'.$sesionwiki['DESCRIPCION_DAD'].'</p>';


						session_start();
						                
			                	if ($_SESSION['usercedula'] != null && $_SESSION['userrol'] == "Manager Asesoria Legal" || $_SESSION['userrol'] == "Usuario Dictamenes") {

						                		echo'
      							
									<div style="color:#FF0000;">
										<form action="index"  method="post" name="form" id="modificar">
											<input type="text" name="idmodificar_dic_descripcion" value="'.$sesionwiki['ID_DAD'].'" hidden>
											<button class="botones" type="submit" data-toggle="tooltip" data-placement="top" title="Editar" value="Modificar" >[ <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> ]																							
											</button>
										</form>

										<form action="index"  method="post" name="form" id="eliminar">
											<input type="text" name="ideliminar_dic_descripcion" value="'.$sesionwiki['ID_DAD'].'" hidden>
											<button class="botones" type="submit" data-toggle="tooltip" data-placement="top" title="Eliminar" value="Eliminar" >[ <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> ]													
											</button>
										</form>
									</div>	';
								}
									echo'							
					</div>';
				}
			}

			
			
	
		}
		echo '<div class="col-lg-12" align="center">  <strong>Página:</strong> '.$seleccionar->fetchNavegacion().'</div>'; 
	}






	function Obtener_Registrar_Multimedia($titulo_,$valor_,$imagen_){

		$this->titulo=$titulo_;
		$this->valor=$valor_;
		$this->imagen=$imagen_;

	}


	function Obtener_Modificar_Multimedia($id_,$imagen_){


			$this->id=$id_;
		$this->imagen=$imagen_;

	}


	function Registrar_Manual(){

		include('../../../../utilidad/php/Conexion.php');

		$con = mysql_connect($host,$user,$pw)or die("Problemas al Conectar");
					mysql_select_db($db,$con)or die("Problemas al Conectar con la Base de Datos");		
	mysql_query("INSERT INTO dictamenes_manual (TITULO_DM,TIPO,DOCUMENTO,UCEDULA) VALUES ('$this->titulo','$this->valor','$this->imagen','$_SESSION[usercedula]')",$con);


	}

			function Modificar_Manual(){
		include('../../../../utilidad/php/Conexion.php');

		$con = mysql_connect($host,$user,$pw)or die("Problemas al Conectar");
			mysql_select_db($db,$con)or die("Problemas al Conectar con la Base de Datos");

			mysql_query("UPDATE dictamenes_manual set TITULO_DM = '$this->descripcion', TIPO = '$this->tipo', UCEDULA = '$_SESSION[usercedula]' WHERE ID_DM = '$this->id'",$con);

	}


		function Modificar_Manual_File(){

			include('../../../../utilidad/php/Conexion.php');

		$con = mysql_connect($host,$user,$pw)or die("Problemas al Conectar");
			mysql_select_db($db,$con)or die("Problemas al Conectar con la Base de Datos");

mysql_query("UPDATE dictamenes_manual set DOCUMENTO = '$this->imagen', UCEDULA = '$_SESSION[usercedula]' WHERE ID_DM = '$this->id'",$con);

		

	}


function Eliminar_Manual(){
		include('../../../../utilidad/php/Conexion.php');


			$con = mysql_connect($host,$user,$pw)or die("Problemas al Conectar");
			mysql_select_db($db,$con)or die("Problemas al Conectar con la Base de Datos");

			mysql_query("DELETE FROM dictamenes_manual WHERE ID_DM = '$this->id'",$con);
	}


	function Registrar_Tutorial(){

			include('../../../../utilidad/php/Conexion.php');

		$con = mysql_connect($host,$user,$pw)or die("Problemas al Conectar");
					mysql_select_db($db,$con)or die("Problemas al Conectar con la Base de Datos");		
	mysql_query("INSERT INTO dictamenes_tutorial (TITULO_DTT,TIPO,VIDEO,UCEDULA) VALUES ('$this->titulo','$this->valor','$this->imagen','$_SESSION[usercedula]')",$con);
		
	}

	function Modificar_Tutorial(){
		include('../../../../utilidad/php/Conexion.php');

		$con = mysql_connect($host,$user,$pw)or die("Problemas al Conectar");
			mysql_select_db($db,$con)or die("Problemas al Conectar con la Base de Datos");

			mysql_query("UPDATE dictamenes_tutorial set TITULO_DTT = '$this->descripcion', TIPO = '$this->tipo', UCEDULA = '$_SESSION[usercedula]' WHERE ID_DTT = '$this->id'",$con);
	}


		function Modificar_Tutorial_File(){
		include('../../../../utilidad/php/Conexion.php');

		$con = mysql_connect($host,$user,$pw)or die("Problemas al Conectar");
			mysql_select_db($db,$con)or die("Problemas al Conectar con la Base de Datos");

			mysql_query("UPDATE dictamenes_tutorial set VIDEO = '$this->imagen', UCEDULA = '$_SESSION[usercedula]' WHERE ID_DTT = '$this->id'",$con);
	}


	function Eliminar_Tutorial(){
		include('../../../../utilidad/php/Conexion.php');


			$con = mysql_connect($host,$user,$pw)or die("Problemas al Conectar");
			mysql_select_db($db,$con)or die("Problemas al Conectar con la Base de Datos");

			mysql_query("DELETE FROM dictamenes_tutorial WHERE ID_DTT = '$this->id'",$con);
	}

	function Mostrar_Manual_Titu(){

		include('../../utilidad/php/Conexion.php');
		
			$con = mysql_connect($host,$user,$pw)or die("Problemas al Conectar");
			mysql_select_db($db,$con)or die("Problemas al Conectar con la Base de Datos");

				$seleccionar = mysql_query("SELECT * FROM dictamenes_manual",$con);					
				while($sesion = mysql_fetch_array($seleccionar)){

					if ($sesion['TIPO'] != "privado" || $_SESSION['userrol'] == "Manager Asesoria Legal" || $_SESSION['userrol'] == "Usuario Dictamenes") {

					echo '
						<div >
							<ul class="menu">
							<li class="letra_efecto"><a href="#"> '.$sesion['TITULO_DM'].'</a></li>
							</u>
						</div>
						';
					}
				}
	}

	function Mostrar_Manual(){

			include('../../utilidad/php/Conexion.php');
		
			$con = mysql_connect($host,$user,$pw)or die("Problemas al Conectar");
			mysql_select_db($db,$con)or die("Problemas al Conectar con la Base de Datos");

				$seleccionar = mysql_query("SELECT * FROM dictamenes_manual",$con);					
				while($sesion = mysql_fetch_array($seleccionar)){

					if ($sesion['TIPO'] != "privado" || $_SESSION['userrol'] == "Manager Asesoria Legal" || $_SESSION['userrol'] == "Usuario Dictamenes") {
						echo '<div class="col-md-6" align="center">';
						
						$extension = pathinfo($sesion['DOCUMENTO']);
						echo '<p hidden>'.$extension["extension"].'</p>';

						if($extension['extension'] == "pdf"){
							echo '<img class="logo_pdf" src="../../utilidad/img/pdf.png">';
						}elseif($extension['extension'] == "docx"){
							echo '<img class="logo_pdf" src="../../utilidad/img/docx.png">';
						}elseif($extension['extension'] == "odt"){
							echo '<img class="logo_pdf" src="../../utilidad/img/odt.png">';
						}

						echo'
									<a href="utilidad/manual/'.$sesion['DOCUMENTO'].'" target="_blank"><h3 title="Tipo de contenido: '.$sesion['TIPO'].'" ><span class="glyphicon glyphicon-download-alt btn-lg" aria-hidden="true"></span>'.$sesion['TITULO_DM'].'</h3>	</a>
										
										<!-- Botonera Editar, eliminar -->';


							session_start();
						                
				                	if ($_SESSION['usercedula'] != null && $_SESSION['userrol'] == "Manager Asesoria Legal" || $_SESSION['userrol'] == "Usuario Dictamenes") {
						                		echo'

										<form action="manual"  method="post" name="form" id="modificar">
											<input type="text" name="idmodificarmanu" value="'.$sesion['ID_DM'].'" hidden>
											<button class="botones wobble-bottom" type="submit" data-toggle="tooltip" data-placement="top" title="Editar" value="Modificar"> [ <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> ] </button>
										</form>

										<form action="manual"  method="post" name="form" id="eliminar">
											<input type="text" name="ideliminarmanu" value="'.$sesion['ID_DM'].'" hidden>
											<button class="botones wobble-bottom" type="submit" data-toggle="tooltip" data-placement="top" title="Eliminar" value="Eliminar" > [ <span class="glyphicon glyphicon-remove aria-hidden="true"></span> ]								
											</button>
										</form>	';
									}
										echo'															
						</div>';
					}
				}



	}

	function Mostrar_Tutorial_Titu(){

		include('../../utilidad/php/Conexion.php');
		
			$con = mysql_connect($host,$user,$pw)or die("Problemas al Conectar");
			mysql_select_db($db,$con)or die("Problemas al Conectar con la Base de Datos");

				$seleccionar = mysql_query("SELECT * FROM dictamenes_tutorial",$con);					
				while($sesion = mysql_fetch_array($seleccionar)){

					if ($sesion['TIPO'] != "privado" || $_SESSION['userrol'] == "Manager Asesoria Legal" || $_SESSION['userrol'] == "Usuario Dictamenes") {
					echo '
						<div >
							<ul class="menu">
							<li class="letra_efecto"><a href="#"> '.$sesion['TITULO_DTT'].'</a></li>
							</u>
						</div>
						';
					}
				}
	}

	function Mostrar_Tutoriales(){

	include('../../utilidad/php/Conexion.php');
		
			$con = mysql_connect($host,$user,$pw)or die("Problemas al Conectar");
			mysql_select_db($db,$con)or die("Problemas al Conectar con la Base de Datos");

				$seleccionar = mysql_query("SELECT * FROM dictamenes_tutorial",$con);					
				while($sesion = mysql_fetch_array($seleccionar)){

					if ($sesion['TIPO'] != "privado" || $_SESSION['userrol'] == "Manager Asesoria Legal" || $_SESSION['userrol'] == "Usuario Dictamenes") {
						echo '
						<div class="col-md-12" align="center">
									
									
									<video width="700px" src="utilidad/tutorial/'.$sesion['VIDEO'].'" controls></video>					

									<h3 title="Tipo de contenido: '.$sesion['TIPO'].'" >'.$sesion['TITULO_DTT'].'</h3>	
										
										<!-- Botonera Editar, eliminar -->';


							session_start();
						                
				                	if ($_SESSION['usercedula'] != null && $_SESSION['userrol'] == "Manager Asesoria Legal" || $_SESSION['userrol'] == "Usuario Dictamenes") {

						                		echo'

										<form action="manual"  method="post" name="form" id="modificar">
											<input type="text" name="idmodificartuto" value="'.$sesion['ID_DTT'].'" hidden>
											<button class="botones wobble-bottom" type="submit" data-toggle="tooltip" data-placement="top" title="Editar" value="Modificar"> [ <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> ] </button>
										</form>

										<form action="manual"  method="post" name="form" id="eliminar">
											<input type="text" name="ideliminartuto" value="'.$sesion['ID_DTT'].'" hidden>
											<button class="botones wobble-bottom" type="submit" data-toggle="tooltip" data-placement="top" title="Eliminar" value="Eliminar" > [ <span class="glyphicon glyphicon-remove aria-hidden="true"></span> ]								
											</button>
										</form>	';
									}
										echo'															
						</div>';
					}
				}
	

	}


}



?>