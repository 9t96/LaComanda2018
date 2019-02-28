<?php

require_once "AutentificadorJWT.php";
require_once "usuario.php";
require_once "usuarioApi.php";

class MWparaAutentificar
{
 /**
   * @api {any} /MWparaAutenticar/  Verificar Usuario
   * @apiVersion 0.1.0
   * @apiName VerificarUsuario
   * @apiGroup MIDDLEWARE
   * @apiDescription  Por medio de este MiddleWare verifico las credeciales antes de ingresar al correspondiente metodo 
   *
   * @apiParam {ServerRequestInterface} request  El objeto REQUEST.
 * @apiParam {ResponseInterface} response El objeto RESPONSE.
 * @apiParam {Callable} next  The next middleware callable.
   *
   * @apiExample Como usarlo:
   *    ->add(\MWparaAutenticar::class . ':VerificarUsuario')
   */
   ///LOGIN SIN MIDDLEWARE
   /**/ 
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

	public function VerificarAdmin($request, $response, $next)
	{
		$objDelaRespuesta  = new stdclass();
		$objDelaRespuesta->respuesta="";
		$user="";
	
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
					if($payload->tipo_usuario==3)
					{	
						
						//si es administrador pasa
						$response = $next($request, $response);
						return $response;
					}		           	
					else
					{	
						$objDelaRespuesta->respuesta="Solo administradores";
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

	public function VerificarMozo($request, $response, $next)
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
					if($payload->rol==4)
					{	
						
						//si es administrador pasa
						$response = $next($request, $response);
						return $response;
					}		           	
					else
					{	
						$objDelaRespuesta->respuesta="Solo mozos";
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

	//VERIFICA POR TIPO
	public function VerificarEmpleado($request, $response, $next)
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
					if($payload->tipo_usuario == 2 || $payload->tipo_usuario == 3)
					{	
						
						//si es administrador pasa
						$response = $next($request, $response);
						return $response;
					}		           	
					else
					{	
						$objDelaRespuesta->respuesta="Solo empleados o socios";
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

	//VERIFICA POR ROL
	public function VerificarEmpleadoLinea($request, $response, $next)
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
					if($payload->rol== 5 || $payload->rol == 6 || $payload->rol == 7 || $payload->rol == 8)
					{	
						
						//si es administrador pasa
						$response = $next($request, $response);
						return $response;
					}		           	
					else
					{	
						$objDelaRespuesta->respuesta="Solo empleados de linea";
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
	
	public function VerificarUsuario($request, $response, $next)
	{

		$objDelaRespuesta  = new stdclass();
		$objDelaRespuesta->respuesta="";
		$user="";
		$nivel=0;

		$token = $this->getToken();			
			if($token == null)
			{
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
					if($payload->tipo_usuario==1)
					{	
						
						//si es usuario pasa
						$response = $next($request, $response);
						return $response;
					}		           	
					else
					{	
						$objDelaRespuesta->respuesta="Solo usuarios registrados";
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

	public function VerificarMozoYAdmin($request, $response, $next)
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
					if($payload->rol==4 || $payload->rol==10)
					{	
						
						//si es administrador pasa
						$response = $next($request, $response);
						return $response;
					}		           	
					else
					{	
						$objDelaRespuesta->respuesta="Solo mozos o Administradores";
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