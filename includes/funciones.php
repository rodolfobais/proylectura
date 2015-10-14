<?php
/*
Fecha de creación 12/09/2015 17:37:42
Usuario: osvaldo
Empresa: OutBoxFactory
*/
/*
 * @param string * 1
 * @return string
 * */
	function getDescripDia($dia)
	{
		$texto = "";
		switch( $dia )
		{
			
			case "L":
				$texto = "Lunes";
				break;
			case "M":
				$texto = "Martes";
				break;
			case "A":
				$texto = "Miércoles";
				break;
			case "J":
				$texto = "Jueves";
				break;
			case "V":
				$texto = "Viernes";
				break;
			case "S":
				$texto = "Sábado";
				break;
			case "D":
				$texto = "Domingo";
				break;
		}
		return $texto;
	}
?>