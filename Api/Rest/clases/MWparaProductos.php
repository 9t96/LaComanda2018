<?php

require_once "AutentificadorJWT.php";
require_once "pedido.php";
require_once "pedidoApi.php";

class MWparaProductos
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
  
   public function SumarProdVendido($request, $response, $next)
   {		
       $objDelaRespuesta = new stdclass();
       $requestBody = $request->getParsedBody();

       $pedidos = $requestBody['platos'];
        
        
        foreach ($pedidos as $key) {
            $pedido = new pedido();
            $pedido->cod_plato = $key['cod_prod'];  
            $pedido->cantidad =  $key['cantidad'];
        
            $objDelaRespuesta->respuesta = $respuesta = $pedido->productovendido();   
            $pedido = null;
        }

        return $response->withJson($objDelaRespuesta, 200);
    }

    public function PedidoCancelado($request, $response, $next)
    {		
        $objDelaRespuesta = new stdclass();
        $requestBody = $request->getParsedBody();
        $cod = $requestBody['cod_plato'];
        $pedido = new pedido();
        $pedido->cod_plato = $cod;     
        $objDelaRespuesta->respuesta = $respuesta = $pedido->productocancelado();   

        return $response->withJson($objDelaRespuesta, 200);
     }


    
			
   
}

?>