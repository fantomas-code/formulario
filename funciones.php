<?php  
//funcion que valida que sean letras y no numeros con un minimo de 3 y maximo de 28
function valnombre($nombre) 
{
	$patron ="/^[a-zA-ZáéíóúÁÉÍÓÚÜüñÑ]{3,28}/";
	if(preg_match($patron , $nombre))
	{
		return true;
	}
	else   
	{
		return false;
	}
}
//funcion que valida que sea correo y no numeros
function valcorreo($correo) 
{
	$patron = "/^(?:[\w\d]+\.?)+@(?:(?:[\w\d]\-?)+\.)+\w{2,4}$/";
	if(preg_match($patron , $correo))
	{
		return true;
	}
	else
	{
		return false;
	}
}
//funcion que valida que sean letras con numeros con un minimo de 4 y maximo de 255
function valmensaje($mensaje) 
{
	$patron = "/^[a-zA-ZáéíóúÁÉÍÓÚÜüñÑ1-9]{4,255}/";
	if(preg_match($patron , $mensaje))
	{
		return true;
	}
	else
	{
		return false;
	}
}
?>