<?php

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	//Load Composer's autoloader
	require 'vendor/autoload.php';

	$nombreErr = "";
	$nombre = "";
	
	$apellidosErr = "";
	$apellidos = "";
	
	$dniErr = "";
	$dni = "";
	
	$telefonoErr = "";
	$telefono = "";
	
	$empresaErr = "";
	$empresa = "";
	
	$emailErr = "";
	$email = "";
	
	$checkErr = "";
	
	$evento = "\tTDF Product";
	$ciudad = "\tMadrid";
	$fecha = "4 abril";
	
	$correcto = true;
	
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["nombre"])) {
    $nombreErr = "Este campo es obligatorio";
	$correcto = false;
  } else {
    $nombre = test_input($_POST["nombre"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z]*$/",$nombre)) {
      $nombreErr = "Formato incorrecto"; 
	  $correcto = false;
    }
  }
  
  if (empty($_POST["apellidos"])) {
    $apellidosErr = "Este campo es obligatorio";
	$correcto = false;
  } else {
    $apellidos = test_input($_POST["apellidos"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$apellidos)) {
      $apellidosErr = "Formato incorrecto"; 
	  $correcto = false;
    }
  }
  
  if (empty($_POST["dni"])) {
    $dniErr = "Este campo es obligatorio";
	$correcto = false;
  } else {
    $dni = test_input($_POST["dni"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9]*$/",$dni)) {
      $dniErr = "Formato incorrecto"; 
	  $correcto = false;
    }
  }
  
  if (empty($_POST["telefono"])) {
  } else {
    $telefono = test_input($_POST["telefono"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$telefono)) {
      $telefonoErr = "Formato incorrecto"; 
	  $correcto = false;
    }
  }
  
  if (empty($_POST["empresa"])) {
    $empresaErr = "Este campo es obligatorio";
	$correcto = false;
  } else {
    $empresa = test_input($_POST["empresa"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9]*$/",$empresa)) {
      $empresaErr = "Formato incorrecto"; 
	  $correcto = false;
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Este campo es obligatorio";
	$correcto = false;
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Formato incorrecto"; 
	  $correcto = false;
    }
  }
  
  if(isset($_POST['checkBox']))
{
}
else
{
    $correcto = false;
	$checkErr = "Tienes que aceptar los términos y condiciones"; 
}   

  
  if($correcto == true){
	  
	  $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
	  
		try {
			//Server settings
			$mail->SMTPDebug = 0;                                 // Enable verbose debug output
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'tecspain1@gmail.com';                 // SMTP username
			$mail->Password = 'tecexcen';                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to
			
			$mail->setFrom('tecspain1@gmail.com', 'Mailer');
			$mail->addAddress('iccts@es.ibm.com');               // Name is optional
			
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = 'Registro Evento '.$evento;
			$mail->Body    = '<h2>Evento: '.$evento.' </h4>'
							.'<h4>Ciudad: '.$ciudad.' </h4>'
							.'<h4>Fecha: '.$fecha.' </h4>'
							.'<h3>Se ha registrado al siguiente usuario:</h3>'
							.'<table border="3px"cellpadding="5px" ><tr><th>Nombre</th><th>Apellidos</th><th>DNI</th><th>Empresa</th><th>Email</th><th>Telefono</th></tr><tr>'
							.'<td>'.$nombre.'</td>'
							.'<td>'.$apellidos.'</td>'
							.'<td>'.$dni.'</td>'
							.'<td>'.$empresa.'</td>'
							.'<td>'.$email.'</td>'
							.'<td>'.$telefono.'</td>'
							.'</tr></table>';
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			$mail->send();

			
			echo ("<script LANGUAGE='JavaScript'>
			window.alert('Recibirá un mail confirmando el registro');
			window.location.href='index.html';
			</script>");
			

			
		  } catch (Exception $e) {
			echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
  
}
}
  
  
  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
		


		

?>


<!DOCTYPE html>
<html lang="es-ES">

<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta charset="UTF-8" />
  <link href="https://www.ibm.com/favicon.ico" rel="icon" />
  <link href="https://www.ibm.com/es/iccts/calendario/" rel="canonical" />
  <meta content="2018-06-13" name="dcterms.date" />
  <meta content="© Copyright IBM Corp. 2018" name="dcterms.rights" />
  <meta content="El Technical Exploration Center (TEC) es un centro implantado en España en el año 2005 con el objetivo de mostrar a los clientes y Business Partner&amp;#8217;s de IBM las principales funcionalidades de nuestro middleware."
    name="description" />
  <meta content="ES" name="geo.country" />
  <meta content="IBM Technical Exploration Center, tec, technical exploration center, contacto, madrid, EMEA, Customer, Cliente, Center, Centro e-business, B2B, CRM, wireless, demostraciones, soluciones, IBM tec madrid, Customer Center, pot, PoT, seminario"
    name="keywords" />
  <meta content="index,follow" name="robots" />
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <title>Client Center Technology Solutions - España | IBM</title>
  <script>
    digitalData = {
      page: {
        category: {
          "primaryCategory": "iccts"
        },
        pageInfo: {
          effectiveDate: "2016-10-19",
          expiryDate: "2021-11-04",
          language: "es-ES",
          publishDate: "2018-06-13",
          publisher: "IBM Corporation",
          version: "v18",
          ibm: {
            contentDelivery: "HTML",
            contentProducer: "Hand Code",
            country: "ES",
            siteID: "www",
            industry: "ZZ",
            owner: "Michael Slebir/France/IBM",
            subject: "SW000",
            type: "CT000"
          }
        }
      }
    };
  </script>
  <meta content="SB01" name="IBM.WTMCategory" />
  <meta content="SWG" name="IBM.WTMSite" />
  <link href="https://1.www.s81c.com/common/v18/css/www.css" rel="stylesheet" />
  <script src="https://1.www.s81c.com/common/v18/js/www.js"></script>
  <link href="tables.css" rel="stylesheet">
  <script src="tables.js"></script>
  <script type="text/javascript">
    IBMCore.common.util.config.set({
      subtabs: {
        viewtext: {
          all: 'View all...',
          less: 'View less...'
        }
      }
    });
  </script>
  <style>
    .ibm-leadspace-social-links p {
      display: inline-block;
    }
  </style>
  <!-- ********************************************************************** -->
  <style>
    @media (max-device-width:759px) {
      #ibm-leadspace-head {
        min-height: 350px !important;
      }
    }

    td {
      vertical-align: middle;
    }
	
  </style>
    <style>
  *,
*:before,
*:after {
  -webkit-box-sizing: content-box;
     -moz-box-sizing: content-box;
          box-sizing: content-box;
}

.container .row *,
.container .row *:before,
.container .row *:after {
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
}
  </style>
  
  <style>
.error {color: #FF0000;}
</style>
  
</head>

<body id="ibm-com" class="ibm-type">


  <div id="ibm-top" class="ibm-landing-page">

    <!-- MASTHEAD_BEGIN -->
    <div id="ibm-masthead" role="banner" aria-label="IBM">
      <div id="ibm-universal-nav">
        <nav role="navigation" aria-label="IBM">
          <div id="ibm-home">
            <a href="https://www.ibm.com/es/es/">IBM®</a>
          </div>
          <ul id="ibm-menu-links" role="toolbar" aria-label="Site map">
            <li>
              <a href="https://www.ibm.com/sitemap/es/es/">Mapa del sitio</a>
            </li>
          </ul>
        </nav>
        <div id="ibm-search-module" role="search" aria-labelledby="ibm-masthead">
          <form id="ibm-search-form" action="https://www.ibm.com/Search/" method="get">
            <p>
              <label for="q">IBM</label>
              <input aria-label="Buscar" id="q" name="q" placeholder="Buscar" value="" maxlength="100" type="text" />
              <input type="hidden" value="18" name="v" />
              <input type="hidden" value="utf" name="en" />
              <input type="hidden" value="es" name="lang" />
              <input type="hidden" value="es" name="cc" />
              <input type="submit" id="ibm-search" class="ibm-btn-search" value="Enviar" />
            </p>
          </form>
        </div>
      </div>
    </div>
    <!-- MASTHEAD_END -->
    <div id="ibm-content-wrapper">
      <header role="banner" aria-labelledby="ibm-pagetitle-h1">

        <!-- LEADSPACE_BEGIN -->


        <div id="ibm-leadspace-head" class="ibm-alternate-background" style="background:#090909 url(../images/ICCTS-1600-600-2.jpg) no-repeat 100%; background-size:cover; background-position:center;">
          <div id="ibm-leadspace-body" class="ibm-padding-bottom-0 ibm-padding-top-r2">
            <!-- Breadcrumb trail: ICC8 - O006564Y55830Y93 -->
            <!--  <nav role="navigation" aria-label="Breadcrumb">
              <ul id="ibm-navigation-trail">
                
<li><a href="/software/es/">IBM Software</a></li></ul></nav> -->

            <div class="ibm-columns ibm-padding-top-2">
              <div class="ibm-col-5-2 ibm-col-large-6-3 ibm-col-medium-6-4" style="background: rgba(0, 0, 0, .7); padding: 13px 15px;">
                <h1 class="ibm-h1" id="ibm-pagetitle-h1">IBM Client Center
                  <br> Technology Solutions</h1>
              </div>
            </div>
            <div class="ibm-leadspace-social-links ibm-fright" style="float:right;">
              <div style="background: rgba(0, 0, 0, .7); padding: 13px 15px;">
                <p class="ibm-textcolor-white-core ibm-padding-bottom-0">Sigue IBM&nbsp;&nbsp;</p>
                <p class="ibm-ind-link ibm-padding-bottom-0">
                  <a class="ibm-twitter-encircled-link" href="https://twitter.com/IBM_ES" target="blank">&nbsp;</a>
                  <a class="ibm-linkedin-encircled-link" href="https://www.linkedin.com/company/ibm" target="blank">&nbsp;</a>
                  <a class="ibm-facebook-encircled-link" href="https://www.facebook.com/IBMEspana" target="blank">&nbsp;</a>
                  <a class="ibm-youtube-encircled-link" href="https://www.youtube.com/user/IBMEspana" target="blank">&nbsp;</a>
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- LEADSPACE_END -->
      </header>

      <!--
            TABS_BEGIN
        -->
      <nav role="navigation" aria-labelledby="ibm-pagetitle-h1">
        <div id="ibm-content-nav">
          <div id="ibm-primary-tabs">
            <span class="ibm-access">Navegación por pestañas principales</span>
            <ul class="ibm-tabs" role="tablist">
              <li>
                <a href="../index.html" role="tab">Información</a>
                <span class="ibm-access"> - separador seleccionado, </span>
              </li>
              <li class="ibm-active">
                <a aria-selected="true" href="index.html" role="tab">Calendario </a>
              </li>
              <li>
                <a href="../contacto/index.html" role="tab">Contacto</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!--
            TABS_END
        -->
		
		
		
      <main role="main" aria-labelledby="ibm-pagetitle-h1">
        <div id="ibm-pcon">
          <div id="ibm-content">
            <div id="ibm-content-body">
              <div id="ibm-content-main">
                <div class="ibm-columns ibm-padding-bottom-2">
                  <div class="ibm-col-6-5 ibm-col-medium-1-1">
				    <div class="col-md-12">
						<label>Evento: </label><?php echo $evento;?>
						<h4></h4>
						<label>Ciudad:  </label><?php echo $ciudad;?>
						<h4></h4>
						<label>Fecha: </label><?php echo $fecha;?>
						<h4></h4>
						<h4></h4>
					</div>
				  
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					  <div class="form-row">
					  
						<div class="form-group col-md-5">
						  <label for="nombre">Nombre*</label>
						  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $nombre;?>">
						  <span class="error"> <?php echo $nombreErr;?></span>
						</div>
						
						<div class="form-group col-md-5">
						  <label for="apellidos">Apellidos*</label>
						  <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" value="<?php echo $apellidos;?>">
						  <span class="error"> <?php echo $apellidosErr;?></span>
						</div>
						
					  </div>
					  <div class="form-row">
					  <div class="form-group col-md-12"></div>
					  </div>
					  <div class="form-row">
					  
						<div class="form-group col-md-3">
						  <label for="dni">DNI*</label>
						  <input type="text" class="form-control" id="dni" name="dni" placeholder="DNI" maxlength="9" value="<?php echo $dni;?>">
						  <span class="error"> <?php echo $dniErr;?></span>
						</div>
						
						<div class="form-group col-md-3">
						  <label for="inputPassword4">Teléfono</label>
						  <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" maxlength="9" value="<?php echo $telefono;?>">
						  <span class="error"> <?php echo $telefonoErr;?></span>
						</div>
						
						<div class="form-group col-md-3">
						  <label for="inputPassword4">Empresa*</label>
						  <input type="text" class="form-control" id="empresa" name="empresa" placeholder="Empresa" value="<?php echo $empresa;?>">
						  <span class="error"> <?php echo $empresaErr;?></span>
						</div>

					  </div>
					  
					  <div class="form-row">
						<div class="form-group col-md-12"></div>
					  </div>
					  
					  <div class="form-group col-md-10">
						<label for="inputAddress">Email*</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $email;?>">
						<span class="error"> <?php echo $emailErr;?></span>
					  </div>
					  
					  <div class="form-row">
						<div class="form-group col-md-12"></div>
					  </div>
					  
					  <div class="form-group col-md-12">
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" id="checkBox" name="checkBox" value="<?php echo $checkBox;?>">
						  <label class="form-check-label" for="gridCheck">
							Seleccionando esta casilla confirmo que he leído y acepto la <a href="privacidad.html" target="blank">política de privacidad.*</a>
						  </label>
						  
						</div>
					  </div>
					  <div class="form-group col-md-12">
					  <span class="error"> <?php echo $checkErr;?></span>
					  </div>
					  <div class="col-md-12">
						<input id="submit" type="submit" value="Registrarse" class="btn btn-primary">
					</div>
					</form>
					
											  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
      <div id="ibm-related-content">
        <!-- RELATED_CONTENT_BEGIN -->

        <div id="ibm-merchandising-module">
          <!-- ibm-merchandising-module -->
        </div>

        <!-- RELATED_CONTENT_END -->
      </div>
    </div>

    <!-- FOOTER_BEGIN -->
    <div id="ibm-footer-module"> </div>
    <footer role="contentinfo" aria-label="IBM">
      <div id="ibm-footer">
        <h2 class="ibm-access">Políticas de uso </h2>
        <ul>
          <li>
            <a href="https://www.ibm.com/contact/es/es/">Contactar</a>
          </li>
          <li>
            <a href="https://www.ibm.com/privacy/es/es/">Privacidad</a>
          </li>
          <li>
            <a href="https://www.ibm.com/legal/es/es/">Condiciones de uso</a>
          </li>
        </ul>
      </div>
    </footer>
    <!-- FOOTER_END -->
  </div>
  <script src="https://www-05.ibm.com/sk/_dev/mikec/watermark/watermark.js" type="text/javascript"></script>
</body>

</html>

