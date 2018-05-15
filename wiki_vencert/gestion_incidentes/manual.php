<!DOCTYPE html>
<html lang="es">
  	<head>
	  	<?php
	      require_once'estructura/head.php';
	    ?>	   
  	</head>	

  	<body onload="Reloj()">			
  	
  		<?php
  			include('utilidad/php/modales_modificar.php');
  			include('utilidad/php/modales_eliminar.php');
  		?>

  		<header>
			<?php
		      require_once'estructura/header.php';
		    ?>	
	    </header>    

	    <div class="container-fluid">
	    	<!-- Header -->
			
	   	    <!-- Fin del Header -->
		
			<!-- CONTENIDO DE LA PAGINA DIVIDIDA EN 2 COLUMNAS, UNA DE 2 Y OTRA DE 10 -->
			<div class="row">
				<!-- Menu de Navegación principal -->
				<div class="col-md-2">
					<?php
				      require_once'estructura/menu_principal.php';
				    	
				    	include("../../utilidad/php/Suscerte.php");
						include("../utilidad/php/Vencert.php");
						include("utilidad/php/Gestion_Incidente.php");
						
						$obj = new Gestion_Incidente();
                        $obj->Mostrar_Manual_Titu();	
				    
				    ?>
				</div>
				<!-- Fin del menu -->
				
				<!-- Logo de Vencer -->
				<div class="col-md-10" align="center">
					<h2 class="unidad">Gestión de Incidentes</h2>
					<!-- <a href="index.php"><img class="logo_vencert" src="utilidad/img/logo_vencert.png"></a>	 -->
				</div>
				<!-- Fin del logo -->
				<?php
			      require_once'../../estructura/menu2.php';
			    ?>
				<!-- Contenido del link -->
				
						<!-- Fin del Menu Dinamico -->
						<ul class="breadcrumb">
							<li><a href="index">Inicio</a> <span class="divider"></span></li>
							<li class="active">Manual</li>

							<?php

								session_start();
						                
						            if ($_SESSION['usercedula'] != null && $_SESSION['userrol'] == "Manager Vencert" || $_SESSION['userrol'] == "Usuario Gestion de incidentes") {

						                		ECHO'
							<li><button class="Add_contenido grow" href="#Vencert_manual"  data-toggle="modal">[ <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nuevo contenido ]</button></li>';

							        }
							?>  
						</ul>
						
						<div class="row">
							<div class="col-md-12">						
								
							</div>
						</div>						

						<div class="row">

							<?php
								
								$obj = new Gestion_Incidente();
		                        $obj->Mostrar_Manual();

							?>

				      		<!-- Ventanas modales para registrar -->
		             	    	<?php 
				           			require_once'estructura/ventanas_modals.php';
				           		?>
							<!-- Fin de las Ventanas modales para registrar -->      

			          	</div> 							
					</div><!-- Fin-Contenido del link 10 columnas -->
				</div><!-- Fin del Row -->
			</div>
		</div><br><br><br><br>
				<?php
			      require_once'../../estructura/footer.php';
			    ?>
			   
  	</body>
</html>