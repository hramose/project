<?php

 ini_set('display_errors', 0); // no muestra los errores

	include('../../utilidad/php/Conexion.php');

 	//$host = "localhost";
	//$user = "root";
	//$pw = "athena";
	//$db = "suscertewiki";

	if(isset($_POST['idmodificar_fd_titulo']) && !empty($_POST['idmodificar_fd_titulo'])){
			
			$con = mysql_connect($host,$user,$pw)or die("Problemas al Conectar");
			mysql_select_db($db,$con)or die("Problemas al Conectar con la Base de Datos");
					
			print'<div class="modal fade" id="modificarn">
			<div class="modal-dialog">
				<div class="modal-content">
					';	

							$regis = mysql_query("SELECT * FROM formacion_desarrollo_articulo_t WHERE ID_FDAT = '$_POST[idmodificar_fd_titulo]'",$con);

							if($reg = mysql_fetch_array($regis)){
								
								print'<!--Header de la ventana -->

								<div class="modal-header">								
									<a href="index" class="close" type="button" title="Cerrar" arie-hidden="true">x</a>
									<img width="100px" src="../../utilidad/img/edit.png"/>  
								</div>

				 				<!--contenido de la ventana-->

								<div class="modal-body">

									<form action="javascript:fd_modificar_titulo();" name="frm_fdmodificar_titulo" id="fdmodificar_titulo" enctype="multipart/form-data" id="subidano">

										<div class="form-group">
											<div class="input-group">

			  	 								<span class="input-group-addon">Titulo</span>
												<input type="text" name="titulo_fd" value="'.$reg['TITULO_FDAT'].'" class="form-control" required>

												<span class="input-group-addon">Tipo de Contenido</span>
		                     				 	<select name="tipo_fd" class="form-control" required/>	                        					
		                        					<option>'.$reg['TIPO'].'</option>
		                        					<option value="publico">Público</option>
		                        					<option value="privado">Privado</option>
		                        				</select>

											</div>
										</div>';

												print '<div class="alert alert-info" role="alert" id="mos_fd_titulo" hidden> </div>
						
									</div>

									<!-- Footer de la ventana -->

									<div class="modal-footer">

										<input class="btn btn-primary pulse-grow" name="publicar" id="modificarusuario" value="Editar" type="submit">
										<input type="text" name="idmodificar_fd_titulo"  value="'.$reg['ID_FDAT'].'" hidden>
										<a class="btn btn-default curl-top-right" href="index" id="Regresarusuario" data-toggle="tooltip" data-placement="top" title="Regresar">Cerrar</a>
									</form>
								</div> <!-- Fin modal-->
					</div> <!-- Fin modal-content -->
				</div> <!-- Fin modal-dialog-->
			</div> <!-- Fin modal-fade-->
				';
	}//fin si				
					
			
	
		
	}elseif(isset($_POST['idmodificar_fd_descripcion']) && !empty($_POST['idmodificar_fd_descripcion'])){
			
				$con = mysql_connect($host,$user,$pw)or die("Problemas al Conectar");
				mysql_select_db($db,$con)or die("Problemas al Conectar con la Base de Datos");
						
				print'<div class="modal fade" id="modificarn">
				<div class="modal-dialog">
					<div class="modal-content">
						';	

								$regis = mysql_query("SELECT * FROM formacion_desarrollo_articulo_d WHERE ID_FDAD = '$_POST[idmodificar_fd_descripcion]'",$con);

								if($reg = mysql_fetch_array($regis)){
									
									print'<!--Header de la ventana -->

									<div class="modal-header">								
										<a href="index" class="close" type="button" title="Cerrar" arie-hidden="true">x</a>
										<img width="100px" src="../../utilidad/img/edit.png"/>  
									</div>

					 				<!--contenido de la ventana-->

									<div class="modal-body">

										<form action="javascript:fd_modificar_descripcion();" name="frm_fdmodificar_descripcion" enctype="multipart/form-data" id="subidano">

											<div class="form-group">
												<div class="input-group">

				  	 								<span class="input-group-addon">Descripción</span>
													<textarea name="descripcion_fd" class="form-control" cols="60" rows="4" required>'.$reg['DESCRIPCION_FDAD'].'</textarea>

												</div>
											</div>';

													print '<div class="alert alert-info" role="alert" id="mos_fd_descripcion" hidden> </div>
							
										</div>

										<!-- Footer de la ventana -->

										<div class="modal-footer">

											<input class="btn btn-primary pulse-grow" name="publicar" id="fdmodificar_descripcion" value="Editar" type="submit">
											<input type="text" name="idmodificar_fd_descripcion"  value="'.$reg['ID_FDAD'].'" hidden>
											<a class="btn btn-default curl-top-right" href="index" id="Regresarusuario" data-toggle="tooltip" data-placement="top" title="Regresar">Cerrar</a>
										</form>
									</div> <!-- Fin modal-->
						</div> <!-- Fin modal-content -->
					</div> <!-- Fin modal-dialog-->
				</div> <!-- Fin modal-fade-->
				';
		}//fin si		
	}		

	elseif(isset($_POST['idmodificarmanu']) && !empty($_POST['idmodificarmanu'])){
			

			$con = mysql_connect($host,$user,$pw)or die("Problemas al Conectar");
				mysql_select_db($db,$con)or die("Problemas al Conectar con la Base de Datos");
						
				print'<div class="modal fade" id="modificarn">
				<div class="modal-dialog">
					<div class="modal-content">
						';	

								$regis = mysql_query("SELECT * FROM formacion_desarrollo_manual WHERE ID_FDM = '$_POST[idmodificarmanu]'",$con);

								if($reg = mysql_fetch_array($regis)){
									
									print'<!--Header de la ventana -->

									<div class="modal-header">								
										<a href="manual" class="close" type="button" title="Cerrar" arie-hidden="true">x</a>
										<img width="100px" src="../../utilidad/img/edit.png"/>   
									</div>

					 				<!--contenido de la ventana-->

									<div class="modal-body">

									<form name="frm_fd_modificar_manual" method="post" id="fd_modificar_manual" enctype="multipart/form-data" >

										<div class="form-group">
											<div class="input-group">

			  	 								<span class="input-group-addon">Titulo Manual</span>
												<input type="text" name="manual_fd" value="'.$reg['TITULO_FDM'].'" class="form-control" required onkeypress="return solomayuscula(event,this)">

												<span class="input-group-addon">Tipo de Contenido</span>
		                     				 	<select name="manual_tipo_fd" class="form-control" required/>	                        					
		                        					<option>'.$reg['TIPO'].'</option>
		                        					<option value="publico">Público</option>
		                        					<option value="privado">Privado</option>
		                        				</select>

														<input type="text" name="idmodificar_fd_manual"  value="'.$reg['ID_FDM'].'" hidden>
											</div>
										</div>
										</form>



												<div class="form-group">
											<div class="input-group">';

			  	 								$extension = pathinfo($reg['DOCUMENTO']);
													echo '<p hidden>'.$extension["extension"].'</p>';
													if($extension['extension'] == "pdf"){
														echo '<p><img class="logo_pdf" src="../../utilidad/img/pdf.png"></p>';
													}elseif($extension['extension'] == "docx"){
														echo '<p><img class="logo_pdf" src="../../utilidad/img/docx.png"></p>';
													}elseif($extension['extension'] == "odt"){
														echo '<p><img class="logo_pdf" src="../../utilidad/img/odt.png"></p>';
													}	
												echo'
												
											</div>
										</div>
											<br>


											<form action="manual"  method="post" name="form" id="modificar">
											<input type="text" name="file_idmodificar_manual" value="'.$reg['ID_FDM'].'" hidden>
											<button class="botones wobble-bottom" type="submit" data-toggle="tooltip" data-placement="top" title="Cambiar manual" value="Modificar"> [ <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> ] </button>
										</form><br><br>



										<div class="alert alert-info" role="alert" id="mos_fd_manual" hidden> </div>
						
									</div>

									<!-- Footer de la ventana -->

									<div class="modal-footer">

										<input class="btn btn-primary pulse-grow" name="publicar" id="modificarusuario" value="Editar" type="button" onclick="javascript:fd_modificar_manual();">
									
										<a class="btn btn-default curl-top-right" href="manual" id="Regresarusuario" data-toggle="tooltip" data-placement="top" title="Regresar">Cerrar</a>
									
								</div> <!-- Fin modal-->
					</div> <!-- Fin modal-content -->
				</div> <!-- Fin modal-dialog-->
			</div> <!-- Fin modal-fade-->
				';
		}//fin si		
	}elseif(isset($_POST['idmodificartuto']) && !empty($_POST['idmodificartuto'])){
			
				$con = mysql_connect($host,$user,$pw)or die("Problemas al Conectar");
				mysql_select_db($db,$con)or die("Problemas al Conectar con la Base de Datos");
						
				print'<div class="modal fade" id="modificarn">
				<div class="modal-dialog">
					<div class="modal-content">
						';	

								$regis = mysql_query("SELECT * FROM formacion_desarrollo_tutorial WHERE ID_FDTT = '$_POST[idmodificartuto]'",$con);

								if($reg = mysql_fetch_array($regis)){
									
									print'<!--Header de la ventana -->

									<div class="modal-header">								
										<a href="tutoriales" class="close" type="button" title="Cerrar" arie-hidden="true">x</a>
										<img width="100px" src="../../utilidad/img/edit.png"/>   
									</div>

					 				<!--contenido de la ventana-->

									<div class="modal-body">

									<form name="frm_fd_modificar_tutorial" id="fd_modificar_tutorial" enctype="multipart/form-data" id="subidano">

										<div class="form-group">
											<div class="input-group">

			  	 								<span class="input-group-addon">Titulo Tutorial</span>
												<input type="text" name="tutorial_fd" value="'.$reg['TITULO_FDTT'].'" class="form-control" required onkeypress="return solomayuscula(event,this)">

												<span class="input-group-addon">Tipo de Contenido</span>
		                     				 	<select name="tutorial_tipo_fd" class="form-control" required/>	                        					
		                        					<option>'.$reg['TIPO'].'</option>
		                        					<option value="publico">Público</option>
		                        					<option value="privado">Privado</option>
		                        				</select>

											</div>
										</div>
										<input type="text" name="idmodificar_fd_tuto"  value="'.$reg['ID_FDTT'].'" hidden>
											</form>

											<video width="350px" src="utilidad/tutorial/'.$reg['VIDEO'].'" controls></video><br><br>

									<form action="tutoriales"  method="post" name="form" id="modificar">
								<input type="text" name="file_idmodificar_tutorial" value="'.$reg['ID_FDTT'].'" hidden>
											<button class="botones wobble-bottom" type="submit" data-toggle="tooltip" data-placement="top" title="Cambiar video" value="Modificar"> [ <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> ] </button>
										</form><br><br>
										

											<div class="alert alert-info" role="alert" id="mos_fd_tutorial" hidden> </div>
						
									</div>

									<!-- Footer de la ventana -->

									<div class="modal-footer">

										<input class="btn btn-primary pulse-grow" name="publicar" id="modificarusuario" value="Editar" type="button" onclick="javascript:fd_modificar_tutorial();">
										
										<a class="btn btn-default curl-top-right" href="tutoriales" id="Regresarusuario" data-toggle="tooltip" data-placement="top" title="Regresar">Cerrar</a>
									</form>
								</div> <!-- Fin modal-->
					</div> <!-- Fin modal-content -->
				</div> <!-- Fin modal-dialog-->
			</div> <!-- Fin modal-fade-->
				';
		}//fin si		
	}	elseif(isset($_POST['file_idmodificar_manual']) && !empty($_POST['file_idmodificar_manual'])){
			
				$con = mysql_connect($host,$user,$pw)or die("Problemas al Conectar");
				mysql_select_db($db,$con)or die("Problemas al Conectar con la Base de Datos");
						
				print'<div class="modal fade" id="modificarn">
				<div class="modal-dialog">
					<div class="modal-content">
						';	

									$regis = mysql_query("SELECT * FROM formacion_desarrollo_manual WHERE ID_FDM = '$_POST[file_idmodificar_manual]'",$con);

								if($reg = mysql_fetch_array($regis)){
									
									print'<!--Header de la ventana -->

									<div class="modal-header">								
										<a href="manual" class="close" type="button" title="Cerrar" arie-hidden="true">x</a>
										<img width="100px" src="../../utilidad/img/edit.png"/>   
									</div>

					 				<!--contenido de la ventana-->

									<div class="modal-body">

											<h2>'.$reg['TITULO_FDM'].'</h2>

									<form action="javascript:fd_modificar_manual_file();" name="fd_modificar_manual_file" id="fd_modificar_manual_file" enctype="multipart/form-data">


			                <div class="form-group">
			                    <div class="mostrar">
			                     	<img src="../../utilidad/img/Agregarpdf.png" class="agarrarimagen" text-align="center" width="130" height="110">
		                    	</div>

			                	<div id="agarrarimagen">
		                    		<input name="fd_manual_file" type="file" id="manual" class="file" accept="image/docx" multiple required  onchange="return documentos(this)"/>
	                 			</div>

								<!--alertas-->
								<div class="alert alert-info" role="alert" align="center">Formatos permitidos: PDF - ODT - DOCX <br>Tamaño máximo de archivo: 15 MB</div>

		                 		<div class="alert alert-danger" id="file_novalido" hidden></div>
				                <div class="alert alert-info" id="file_valido" hidden></div>
			                    <div class="alert alert-success" role="alert" id="mos_fd_manual_file" hidden></div>		                  
				            </div>

									</div>

									<!-- Footer de la ventana -->

									<div class="modal-footer">

										<input class="btn btn-primary pulse-grow" name="publicar" id="modificarusuario" value="Cambiar" type="submit">
										<input type="text" name="idmodificar_fd_manual_file"  value="'.$reg['ID_FDM'].'" hidden>
										<a class="btn btn-default curl-top-right" href="manual" id="Regresarusuario" data-toggle="tooltip" data-placement="top" title="Regresar">Cerrar</a>
									</form>
								</div> <!-- Fin modal-->
					</div> <!-- Fin modal-content -->
				</div> <!-- Fin modal-dialog-->
			</div> <!-- Fin modal-fade-->
				';
		}//fin si		
	}elseif(isset($_POST['file_idmodificar_tutorial']) && !empty($_POST['file_idmodificar_tutorial'])){
			
				$con = mysql_connect($host,$user,$pw)or die("Problemas al Conectar");
				mysql_select_db($db,$con)or die("Problemas al Conectar con la Base de Datos");
						
				print'<div class="modal fade" id="modificarn">
				<div class="modal-dialog">
					<div class="modal-content">
						';	

	$regis = mysql_query("SELECT * FROM formacion_desarrollo_tutorial WHERE ID_FDTT = '$_POST[file_idmodificar_tutorial]'",$con);

								if($reg = mysql_fetch_array($regis)){
									
									print'<!--Header de la ventana -->

									<div class="modal-header">								
										<a href="manual" class="close" type="button" title="Cerrar" arie-hidden="true">x</a>
										<img width="100px" src="../../utilidad/img/edit.png"/>   
									</div>

					 				<!--contenido de la ventana-->

									<div class="modal-body">

											<h2>'.$reg['TITULO_FDTT'].'</h2>

									<form action="javascript:fd_modificar_tutorial_file();" name="fd_modificar_tutorial_file" id="fd_modificar_tutorial_file" enctype="multipart/form-data">


			           
			                <div class="form-group">
			                   	<div class="mostrar">
	                     			<img src="../../utilidad/img/Agregarvideo.png" class="agarrarimagen" text-align="center" width="130" height="110">
	                			</div>

		                		<div id="agarrarimagen">
	                    			<input name="fd_tutorial_file" class="file" type="file" id="file"  accept="image/docx" onchange="return videos(this)" multiple required/>
	                 		 	</div>

	                 		 	<!--alertas-->
	                 		 	<div class="alert alert-info" role="alert" align="center">Formatos permitidos: MP4 - WEBM <br> Tamaño máximo de video: 40 MB</div>

	             				<div class="alert alert-danger" id="file_novalido_tutorial" hidden></div>
	               				<div class="alert alert-info" id="file_valido_tutorial" hidden></div>
	                			<div class="alert alert-success" role="alert" id="mos_fd_tutorial_file" hidden></div>	                  

				            </div>


									
						
									</div>

									<!-- Footer de la ventana -->

									<div class="modal-footer">

										<input class="btn btn-primary pulse-grow" name="publicar" id="modificarusuario" value="Cambiar" type="submit">
										<input type="text" name="idmodificar_fd_tutorial_file"  value="'.$reg['ID_FDTT'].'" hidden>
										<a class="btn btn-default curl-top-right" href="tutoriales" id="Regresarusuario" data-toggle="tooltip" data-placement="top" title="Regresar">Cerrar</a>
									</form>
								</div> <!-- Fin modal-->
					</div> <!-- Fin modal-content -->
				</div> <!-- Fin modal-dialog-->
			</div> <!-- Fin modal-fade-->
				';
		}//fin si		
	}		


?>
