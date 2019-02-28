<?php

require_once "AutentificadorJWT.php";
require_once "usuario.php";
require_once "usuarioApi.php";

class MWparaOperacion
{
	public function getToken()
   {
		$token = null;
		$headers = apache_request_headers();
		$headers = $headers['authorization'];
		if (!empty($headers)) {
			if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
				$token = $matches[1];
			}
		}	
		return $token;
   }
  
   public function SumarOperacionEmpleado($request, $response, $next)
   {
		$objDelaRespuesta  = new stdclass();
		$objDelaRespuesta->respuesta="";
		$user="";
		$nivel=0;

	
			$token = $this->getToken();
			if($token == null)
			{
				print_r("token null alto pt");
				$objDelaRespuesta->respuesta="Solo usuarios registrados";
				$objDelaRespuesta->token=$token;
				$respuesta = $response->withJson($objDelaRespuesta, 200); 
				return $respuesta;	
			}
			else
			{
				try
				{
					AutentificadorJWT::verificarToken($token);				
					$objDelaRespuesta->esValido=true;  
					
				}
				catch (Exception $e) {   
					
											
					$objDelaRespuesta->respuesta=$e->getMessage();
					$objDelaRespuesta->esValido=false;
					$respuesta = $response->withJson($objDelaRespuesta, 200); 
					return $respuesta;			

				}

				if($objDelaRespuesta->esValido)
				{
					$payload=AutentificadorJWT::ObtenerData($token);
					if($payload->rol !== 10 && $payload->rol !== 9 )
					{	
						$ArrayDeParametros = $request->getParsedBody();
						$horaentrada = $ArrayDeParametros['horaentrada'];
						$user = new user();	   
						$user->cod_emp = $payload->cod_emp;
						$user->horaentrada = $horaentrada;
						$user->sumarOperacion();
						$next($request, $response);
						return $response;
					}		           	
					else
					{	
						$objDelaRespuesta->respuesta="Solo usuarios pueden buscar por id.";
						$objDelaRespuesta->tienePermiso=false;
						$respuesta = $response->withJson($objDelaRespuesta, 200); 
						return $respuesta;			
					}
					
				}
				else
				{
					$objDelaRespuesta->respuesta= "Error, solo usarios registrados";
					$objDelaRespuesta->esValido=false;
					$respuesta = $response->withJson($objDelaRespuesta, 200); 
					return $respuesta;
					
				}
			}		
   }
   
}

?>