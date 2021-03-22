<?php
  function EnviarCorreo($correo_usuario,$nombre,$apellido,$cedula,$contra)
  {
          // Destinatario
          //$para= $correo_usuario;
          $para2= 'anna.perrando@utp.ac.pa';
          $para3='izumi.komatsu@utp.ac.pa';
          // título
          $asunto = 'Actualización de correo y contraseña en el Sistema de Laboratorios FISC';
          // mensaje
          $mensaje = '
          <html>
          <head>
          <title>ACTIVACION DE CORREO Y CONTRASEÑA EN EL SISTEMA DE LABORATORIOS FISC</title>
          </head>
          <body>
          
          <table width="80%" border="0" align="center" cellpadding="5" cellspacing="5">
            <tr>
              <td><div align="center"><img src="http://laboratoriosfisc.ds507.online/images/logos.png" width="100" height="100" alt="UTP" longdesc="UTP"></div></td>
            </tr>
            <tr>
              <td bgcolor="#F4FAFF"><p align="center"><strong>'.$nombre.' '.$apellido.' '.$cedula.'</strong> <br>
                Usted ha sido registrado en nuestro sistema de forma exitosa<br>
                  Para acceder al sistema hará uso del nuevo correo '.$correo_usuario.' y la contrase&ntildea '.$contra.' a continuaci&oacuten le adjuntamos el enlace de acceso al sistema; le recordamos cambiar su contrase&ntildea.</p>
                <p align="center"><a href="http://laboratoriosfisc.ds507.online"><strong>INICIAR SESI&OacuteN</strong></a><br>
              </p>    </td>
            </tr>
            <tr>
              <td bgcolor="51034f"><div align="center" style="color:#FFFFFF";>Universidad Tecnol&oacute;gica de Panam&aacute; - 2020<br>
                  Direcci&oacute;n: Avenida Universidad Tecnol&oacute;gica de Panam&aacute;, V&iacute;a Puente Centenario,<br>
                  Campus Metropolitano V&iacute;ctor Levi Sasso.<br>
                  Tel&eacute;fono. (507) 560-3000<br>
                  Correo electr&oacute;nico: buzondesugerencias@utp.ac.pa<br>
              Pol&iacute;ticas de Privacidad</div></td>
            </tr>
          </table>
          </body>
          </html>
          
          ';

          // Elementos opcionales

          // Para enviar un correo HTML, debe establecerse la cabecera Content-type
          $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
          $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";

          // Cabeceras adicionales
          $cabeceras .= 'From: INFO <info@laboratoriosfisc.ds507.online/>' . "\r\n";
        /* $cabeceras .= 'Cc: cc@dominio' . "\r\n";
          $cabeceras .= 'Bcc: cco@dominio' . "\r\n";*/

          // Enviarlo
          //mail($para, $asunto, $mensaje, $cabeceras);
          mail($para2, $asunto, $mensaje, $cabeceras);
          mail($para3, $asunto, $mensaje, $cabeceras);
  }
?>