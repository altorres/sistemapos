<header class="main-header">

	<!--=====================================
	=            Logo                       =
	======================================-->
	<a href="inicio" class="logo">
		<!-- logo mini -->
		<span class="logo-mini">
			<img src="View/img/plantilla/icono-blanco.png" class="img-responsive" style="padding: 10px">
		</span>

		<!-- logo normal -->
	
		<span class="logo-lg">
			<img src="View/img/plantilla/logo-blanco-lineal.png" class="img-responsive" style="padding: 10px 0px">
		</span>

	 </a>
	 <!--=====================================
	=            Barra navegacion                       =
	======================================-->
	<nav class="navbar navbar-static-top " role="navigation ">
		
		

		<a href="#" class="sidebar-toggle" data-toggle ="push-menu" role="button">
			<span class="sr-only">Toggle navigation </span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			
		</a>

		<!--perfil de usuario-->
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">

				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">

						<?php
							if($_SESSION["foto"]!="")
							{
								echo '<img src="'.$_SESSION["foto"].'" class="user-image" >';
							}
							else{

								echo '<img src="View/img/usuarios/default/anonymous.png" class="user-image" >';

							}


						 ?>
							
						
						<span class="hidden-xs"><?php echo $_SESSION["nombre"]; ?> </span>
					</a>

					<ul class="dropdown-menu" >
						<li class="user-body">
							<div class="pull-right">
								<a href="salir" class="btn btn-default btn-flat">salir</a>
							</div>
				

						</li>
					</ul>
				</li>
			</ul>	

		</div>

		

	</nav>
	

</header>