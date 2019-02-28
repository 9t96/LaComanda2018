<?php

require_once "AutentificadorJWT.php";
require_once "mesa.php";
require_once "mesasApi.php";

class MWparaMesas
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
  
   public function AbrirMesa($request, $response, $next)
   {		
    $objDelaRespuesta = new stdclass();
    $requestBody = $request->getParsedBody();
    $mesa = new mesa();
    $mesa->nromesa = $requestBody['mesa'];

    $respuesta = $mesa->abrirmesa();   


    return $respuesta = $next($request, $response);
    }

    public function SumarMesaUsada($request, $response, $next)
    {		
        $objDelaRespuesta = new stdclass();
        $requestBody = $request->getParsedBody();
        $mesa = new mesa();
        $mesa->nromesa = $requestBody['nro_mesa'];
 
 
        $respuesta = $mesa->sumarusomesa();   

        return $respuesta = $next($request, $response);
     }
			
   
}

?>