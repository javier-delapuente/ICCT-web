<?php

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        //Load Composer's autoloader
  require 'vendor/autoload.php';

  iconv_set_encoding("internal_encoding", "UTF-8");

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

  $body = "";

  $campo = array("","","","","","","","","","","","","","","","","","","","","","","","","","","","");

  $emailErr = "Este campo es obligatorio";

  $err = array("","","","","","","","","","","","","","","","","","","","","","","","","","","","");

  $obli = array("","","","","","","","","","","","","","","","","","","","","","","","","","","","");

  $table = array("Nombre del BP/Cliente*","Fecha inicio (del técnico IBM)*","Esfuerzo de la petición horas/días (del técnico IBM)*","Fecha congelación entorno (técnico IBM)*","Fecha inicio entorno/demo/servicio*","Fecha de fin entorno/demo/servicio*","Nombre persona soporte","Entorno/demo/servicio solicitado*","Nombre del servicio que figura en el inventario*","Numero de oportunidad en MySA","Total Revenue oportunidad ($)","Explicación si cero","Q de la oportunidad","Justificación de negocio*","Si es una situación de competencia, mencionar competidores y/o productos","Customer name, si conocido y es un BP el peticionario","Organización Esponsor (Cuentas S1HW, …..)","Tipo BP","Partner Focal Point","Teléfono Focal Point","Correo Focal Point");

  $obli[0] = "1";
  $obli[1] = "1";
  $obli[2] = "1";
  $obli[3] = "1";
  $obli[4] = "1";
  $obli[5] = "1";
  $obli[7] = "1";
  $obli[8] = "1";
  $obli[13] = "1";
  //$obli[21] = "1";



if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $correcto = true;


  //echo '<pre>'; print_r($_POST); echo '</pre>';


for ($x = 0; $x < count($campo); $x++) {
  if (empty($_POST["campo" . $x])){
    if($obli[$x] == "1"){
      $err[$x] = "Este campo es obligatorio";
      //echo "entra".$x;
      $correcto = false;
    }
  }
  else{
    $campo[$x] = $_POST["campo" . $x];
  }

}

if(isset($_POST['campo21']))
{
}
else
{
    $correcto = false;
        $err[21] = "Tienes que aceptar los términos y condiciones";
}


$body = $body .'<table border="3px"cellpadding="5px" >';


$x = 0;
foreach ($table as &$lis) {

  $body = $body . "<tr><td>" . $lis ."</td><td>" . $campo[$x] . "</td></tr>";


  $x += 1;
}

$body = $body .'</table>';

  if($correcto == true){

    echo ("envia mail");

          $mail = new PHPMailer(true);                              // Passing `true` enables exceptions

                try {
                        //Server settings
                        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                        $mail->isSMTP();                                      // Set mailer to use SMTP
                        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                        $mail->SMTPAuth = true;                               // Enable SMTP authentication
                        $mail->Username = 'tecspain2@gmail.com';                 // SMTP username
                        $mail->Password = 'Tecexcen1';                           // SMTP password
                        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                        $mail->Port = 587;                                    // TCP port to connect to

                        $mail->setFrom('tecspain2@gmail.com', 'Mailer');
                        $mail->addAddress('iccts@es.ibm.com');               // Name is optional
                        //$mail->addAddress('ricardo.santos.mesa1@ibm.com');

                        $mail->isHTML(true);                                  // Set email format to HTML
                        $mail->Subject = 'Registro Apolo '.$evento;
                        $mail->Body    =   utf8_decode($body);
                        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                        $mail->send();


                        echo ("<script LANGUAGE='JavaScript'>
                        window.alert('Recibirá un mail confirmando el registro');
                        window.location.href='index.php';
                        </script>");



                  } catch (Exception $e) {
                        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
      }

  }
}


  function test_input($data) {
    //$data = trim($data);
    //$data = stripslashes($data);
    //$data = htmlspecialchars($data);
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
              <li>
                <a href="../calendario/index.php" role="tab">Calendario</a>
              </li>
              <li>
                <a href="../contacto/index.html" role="tab">Contacto</a>
              </li>
              <li class="ibm-active">
                <a aria-selected="true" href="index.php" role="tab">Apolo </a>
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










                                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">



          <!--

                                          <div class="form-row">

                                                <div class="form-group col-md-12">
                                                  <label for="nombre">Nombre*</label>
                                                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $nombre;?>">
                                                  <span class="error"> <?php echo $nombreErr;?></span>
                                                </div>

                                                <div class="form-group col-md-12  ">
                                                  <label for="apellidos">Apellidos*</label>
                                                  <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" value="<?php echo $apellidos;?>">
                                                  <span class="error"> <?php echo $apellidosErr;?></span>
                                                </div>


                                          </div>
              <div class="form-row">
              <div class="form-group col-md-12"></div>
                                          </div>

            <div class="form-group">
              <label for="email">Email address:</label>
              <input type="email" class="form-control" id="email">
            </div>


        -->
        <div class="row">
            <p class="h3">Justificación de la petición. Esta información, es vital para  los equipos de IBM que facilitan soporte y seguimiento. </p>
        </div>


            <table class="table table-bordered">
              <tbody>


                <tr>
                  <td>Nombre del BP/Cliente*</td>
                  <td style="width:70%">
                    <div class="form-group">
                      <input type="text" class="form-control" name="campo0" style="width:95%" value="<?php echo $campo[0];?>">
                      <span class="error"> <?php echo $err[0];?></span>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>Fecha inicio (del técnico IBM)*</td>
                  <td>
                    <div class="form-group">
                      <input type="date" class="form-control" name="campo1" style="width:150px" value="<?php echo $campo[1];?>">
                      <span class="error"> <?php echo $err[1];?></span>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>Esfuerzo de la petición horas/días (del técnico IBM)*</td>
                  <td>
                    <div class="form-group">
                      <input type="text" class="form-control" name="campo2" placeholder="40 horas / 8 días" style="width:95%" value="<?php echo $campo[2];?>">
                      <span class="error"> <?php echo $err[2];?></span>
                    </div>
                  </td>
                </tr>



                <tr>
                  <td>Fecha congelación entorno (técnico IBM)*</td>
                  <td>
                    <div class="form-group">
                      <input type="date" class="form-control" name="campo3" style="width:150px" value="<?php echo $campo[3];?>">
                      <span class="error"> <?php echo $err[3];?></span>
                    </div>
                  </td>
                </tr>


                <tr>
                  <td>Fecha inicio entorno/demo/servicio*</td>
                  <td>
                    <div class="form-group">
                      <input type="date" class="form-control" name="campo4" style="width:150px" value="<?php echo $campo[4];?>">
                      <span class="error"> <?php echo $err[4];?></span>
                    </div>
                  </td>
                </tr>


                <tr>
                  <td>Fecha de fin entorno/demo/servicio*</td>
                  <td>
                    <div class="form-group">
                      <input type="date" class="form-control" name="campo5" style="width:150px" value="<?php echo $campo[5];?>">
                      <span class="error"> <?php echo $err[5];?></span>
                    </div>
                  </td>
                </tr>


                <tr>
                  <td>Nombre persona soporte</td>
                  <td style="width:70%">
                    <div class="form-group">
                      <input type="text" class="form-control" name="campo6" style="width:95%" value="<?php echo $campo[6];?>">
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>Entorno/demo/servicio solicitado*</td>
                  <td>
                    <div class="form-group">
                      <textarea class="form-control" name="campo7" rows="3" placeholder="Breve descripción de lo que se va a hacer: ejemplo: LinuxONE z/VM – Linux RHEL 7.0 Porting LinuxONE" style="width:95%" value="<?php echo $campo[7];?>"><?php echo $campo[7];?></textarea>
                      <span class="error"> <?php echo $err[7];?></span>
                    </div>
                  </td>
                </tr>


                <tr>
                  <td>Nombre del servicio que figura en el inventario*</td>
                  <td style="width:70%">
                    <div class="form-group">
                      <select class="form-control" name="campo8" aria-label="Default select example" style="width:90%" value="<?php echo $campo[8];?>">

                        <?php
                          $text = file_get_contents("https://ibm-tec.s3.eu-de.cloud-object-storage.appdomain.cloud/demo.txt");

                          $listtext = explode("\n", $text);


                          echo '<option>'.$campo[8].'</option>';


                          foreach ($listtext as &$lis) {

                            if($campo[8] == $lis){
                              echo '<option selected>test'.$lis.'</option>';
                            }
                            else{
                              echo '<option>'.$lis.'</option>';
                            }

                          }

                      ?>
                      </select>
                      <span class="error"> <?php echo $err[8];?></span>
                    </div>
                  </td>
                </tr>


                <tr>
                  <td>Numero de oportunidad en MySA</td>
                  <td style="width:70%">
                    <div class="form-group">
                      <input type="text" class="form-control" name="campo9" style="width:95%" value="<?php echo $campo[9];?>">
                    </div>
                  </td>
                </tr>



                <tr>
                  <td>Total Revenue oportunidad ($)</td>
                  <td style="width:70%">
                    <div class="form-group">
                      <input type="text" class="form-control" name="campo10" style="width:95%" value="<?php echo $campo[10];?>">
                    </div>
                  </td>
                </tr>



                <tr>
                  <td>Explicación si cero</td>
                  <td style="width:70%">
                    <div class="form-group">
                      <input type="text" class="form-control" name="campo11" placeholder="PoT, SkillGYM, PoC," style="width:95%" value="<?php echo $campo[11];?>">
                    </div>
                  </td>
                </tr>



                <tr>
                  <td>Q de la oportunidad  </td>
                  <td style="width:70%">
                    <div class="form-group">
                      <input type="text" class="form-control" name="campo12" placeholder="" style="width:95%" value="<?php echo $campo[12];?>">
                    </div>
                  </td>
                </tr>



                <tr>
                  <td>Justificación de negocio*</td>
                  <td>
                    <div class="form-group">
                      <textarea class="form-control" name="campo13" rows="2" placeholder="" style="width:95%" value="<?php echo $campo[13];?>"><?php echo $campo[13];?></textarea>
                      <span class="error"> <?php echo $err[13];?></span>
                    </div>
                  </td>
                </tr>


                <tr>
                  <td>Si es una situación de competencia, mencionar competidores y/o productos </td>
                  <td>
                    <div class="form-group">
                      <textarea class="form-control" name="campo14" rows="2" placeholder="" style="width:95%" value="<?php echo $campo[14];?>"></textarea>

                    </div>
                  </td>
                </tr>


                <tr>
                  <td>Customer name, si conocido y es un BP el peticionario </td>
                  <td style="width:70%">
                    <div class="form-group">
                      <input type="text" class="form-control" name="campo15" style="width:95%" value="<?php echo $campo[15];?>">
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>Organización Esponsor (Cuentas S1HW, …..)  </td>
                  <td style="width:70%">
                    <div class="form-group">
                      <input type="text" class="form-control" name="campo16" style="width:95%" value="<?php echo $campo[16];?>">
                    </div>
                  </td>
                </tr>


              </tbody>


            </table>

            <div class="row">
              <p class="h3"><u><bold>Partner Information</bold></u> (si el peticionario es un BP) </p>
          </div>



            <table class="table table-bordered">
              <tbody>


                <tr>
                  <td>Tipo BP </td>
                  <td style="width:70%">
                    <div class="form-group">
                      <input type="text" class="form-control" name="campo17" style="width:95%" value="<?php echo $campo[17];?>">
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>Partner Focal Point</td>
                  <td style="width:70%">
                    <div class="form-group">
                      <input type="text" class="form-control" name="campo18" style="width:95%" value="<?php echo $campo[18];?>">
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>Teléfono Focal Point</td>
                  <td style="width:70%">
                    <div class="form-group">
                      <input type="text" class="form-control" name="campo19" style="width:95%" value="<?php echo $campo[19];?>">
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>Correo Focal Point</td>
                  <td style="width:70%">
                    <div class="form-group">
                      <input type="text" class="form-control" name="campo20" style="width:95%" value="<?php echo $campo[20];?>">
                    </div>
                  </td>
                </tr>


                </tbody>


            </table>


                                          <div class="form-group col-md-12">
                                                <div class="form-check">
                                                  <input class="form-check-input" type="checkbox" name="campo21" id="campo21"  value="<?php echo $campo[21];?>">
                                                  <label class="form-check-label" for="gridCheck">
                                                        Seleccionando esta casilla confirmo que he leído y acepto la <a href="privacidad.html" target="blank">política de privacidad.*</a>
                                                  </label>


                                                </div>
                                          </div>
                                          <div class="form-group col-md-12">
                                          <span class="error"> <?php echo $err[21];?></span>
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