<?php
// formulario de contacto papirrin,si pudes aportar algo seras bienvenido.
// le hice unas pequeñas mejoras     ......****** llega mas rapido al destinatario
	require 'class.phpmailer.php';
			   
	if($_POST)
	{
		require 'funciones.php';	

		// variable que almacena el correo al q se le envia el comentario
		$destino   = "usuario@dominio.com";
		$asunto    = "aqui va el titulo de tu pagina web sin caracteres raros";

		$nombre  = strip_tags($_POST['nombre']);
		$correo     = strip_tags($_POST['correo']);
		$mensaje = strip_tags($_POST['mensaje']);

		// variable que almacena todas las variables de los campos..
		$cuerpo    = "Nombre: $nombre \nCorreo: $correo \nMensaje: $mensaje";

		$mail = new PHPMailer();

		$mail->CharSet = 'UTF-8';// variables que no puedes omitir
		$mail->AddAddress($destino);// variables que no puedes omitir
		$mail->AddCC ($correo);   // variables que  puedes omitir si quieres
		$mail->SetFrom = $correo;// variables que no puedes omitir
		$mail->FromName = $asunto;// variables que no puedes omitir
		$mail->Body = $cuerpo; // variables que no puedes omitir
		$mail->Subject = "aqui puedes poner desde donde se envia el comentario o mensaje"; // variables que no puedes omitir
		$mail->WordWrap = 50;// variables que no puedes omitir

		if (valnombre($nombre)=="") 
		{
			// variable que te informa sobre posible error
                     $mn = "<i>El nombre es requerido (minimo 3 letras)</i>";
              }
              elseif(valcorreo($correo)=="")
              {
              	// variable que te informa sobre posible error
                     $mc = "<i>EL correo es requerido y tiene que ser valido</i>";
              }       
		elseif(valmensaje($mensaje)=="")
		{
			// variable que te informa sobre posible error
			$mm= "<i>El mensaje es requerido</i>";
		}
		else 
		{
                     $mail->Send();
                     // variable que te informa que el comentario o mensaje si se envio
                     $mb= "<i>Tu comentario se ha enviado en breve te respondere</i>";
		}	      
       }
?>
		<form action="" method="POST" enctype="a pplication/x-www-form-urlencoded">
		    <p>Aqui puedes ponerle el titulo que quieras</p><br>
		    <label for="nombre">Nombre :</label><br>
		    <input type="text" name="nombre" id="nombre" value="<?php echo htmlspecialchars($nombre);?>"/>
		    <span class="msg">*  <?php echo $mn;?></span> <!--  Aqui se recojen las variables que te informan sobre los errores que puedes tener al no cumplir con los datos requeridos-->
		    <br>
		    <label for="correo">Correo :</label><br>
		    <input type="text" name="correo" id="correo" value="<?php echo htmlspecialchars($correo);?>"/>
		    <span class="msg">*  <?php echo $mc;?></span> <!--  Aqui se recojen las variables que te informan sobre los errores que puedes tener al no cumplir con los datos requeridos-->
		    <br>
		    <label for="mensaje">Mensaje :</label><br>
		    <textarea name="mensaje" id="mensaje" cols="28" rows="7"></textarea>
                 <span class="msg">*  <?php echo $mm;?></span> <!--  Aqui se recojen las variables que te informan sobre los errores que puedes tener al no cumplir con los datos requeridos-->
		    <br>
		    <input type="submit" value="Enviar">
		    <span class="msg"><?php echo $mb;?></span>	 <!--  Aqui recoges la variable que te indica que tu mensaje si se envio-->
		</form>
