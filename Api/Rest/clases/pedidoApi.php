<?php

date_default_timezone_set('America/Argentina/Buenos_Aires');
require_once "pedido.php";

class pedidoApi extends pedido{

    public function agregarPedido($request, $response, $args) 
    {
        $objDelaRespuesta = new stdclass();   
        $ArrayDeParametros = $request->getParsedBody();
        $comensales = $ArrayDeParametros['comensales'];
        $mozo = $ArrayDeParametros['mozo'];
        $mesa = $ArrayDeParametros['mesa'];
        $idPedido = $ArrayDeParametros['idPedido'];
        $cliente = $ArrayDeParametros['cliente'];  
        $pedidos = $ArrayDeParametros['platos'];
        $total = $ArrayDeParametros['total'];
        

        foreach ($pedidos as $key) {
            $pedido = new pedido();
            $pedido->mesa = $mesa;
            $pedido->mozo = $mozo;
            $pedido->idPedido = $idPedido;
            $pedido->comensales = $comensales;
            $pedido->cliente = $cliente;
            $pedido->total = $total;
            $pedido->cod_plato = $key['cod_prod'];  
            $pedido->cantidad =  $key['cantidad'];
        
            $objDelaRespuesta->respuesta = $respuesta = $pedido->nuevopedidolive(); 
            print_r($objDelaRespuesta);  
            $pedido = null;
        }

        return $response->withJson($objDelaRespuesta, 200);
    }

    public function prodVendido($request, $response, $next)
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

    public function traerPedidos($request, $response, $args) 
    {
        $pedidos = new pedido();        
        $respuesta = $pedidos->getPedidos();     
                       
         return $response->withJson($respuesta, 200);  

    }
    public function traerPedidosCerveza($request, $response, $args) 
    {
        $pedidos = new pedido();        
        $respuesta = $pedidos->getPedidosCerveza();     
                       
         return $response->withJson($respuesta, 200);  

    }
    public function traerPedidosBart($request, $response, $args) 
    {
        $pedidos = new pedido();        
        $respuesta = $pedidos->getPedidosBart();     
                       
         return $response->withJson($respuesta, 200);  

    }
    public function traerPedidosCocina($request, $response, $args) 
    {
        $pedidos = new pedido();        
        $respuesta = $pedidos->getPedidosCocina();     
                       
         return $response->withJson($respuesta, 200);  

    }
    public function traerPedidosPostre($request, $response, $args) 
    {
        $pedidos = new pedido();        
        $respuesta = $pedidos->getPedidosPostre();     
                       
         return $response->withJson($respuesta, 200);  

    }

    

    public function enPreparacion($request, $response, $args) 
    {
        $objDelaRespuesta = new stdclass();   
        $ArrayDeParametros = $request->getParsedBody();
        $id = $ArrayDeParametros['idPedido'];
        $cod_plato = $ArrayDeParametros['cod_plato'];
        $tiempo = $ArrayDeParametros['tiempo'];
        
        var_dump($ArrayDeParametros);
        $pedidos = new pedido();     
        $pedidos->idPedido = $id; 
        $pedidos->cod_plato = $cod_plato;   
        $pedidos->demora = $tiempo;   
        $respuesta = $pedidos->estadoPreparacion();     
                       
         return $response->withJson($respuesta, 200);  

    }

    public function paraServir($request, $response, $args) 
    {
        $objDelaRespuesta = new stdclass();   
        $ArrayDeParametros = $request->getParsedBody();
        $id = $ArrayDeParametros['idPedido'];
        $cod_plato = $ArrayDeParametros['cod_plato'];
        
        $pedidos = new pedido();     
        $pedidos->idPedido = $id; 
        $pedidos->cod_plato = $cod_plato;           
        $respuesta = $pedidos->estadoParaServir();     
                       
         return $response->withJson($respuesta, 200);  

    }
    public function clientesComiendo($request, $response, $args) 
    {
        $objDelaRespuesta = new stdclass();   
        $ArrayDeParametros = $request->getParsedBody();
        $id = $ArrayDeParametros['idPedido'];
        $cod_plato = $ArrayDeParametros['cod_plato'];
        
        $pedidos = new pedido();     
        $pedidos->idPedido = $id; 
        $pedidos->cod_plato = $cod_plato;           
        $respuesta = $pedidos->estadoComiendo();     
                       
         return $response->withJson($respuesta, 200);  

    }

    public function cerrarMesa($request, $response, $args) 
    {
        $objDelaRespuesta = new stdclass();   
        $ArrayDeParametros = $request->getParsedBody();
        $id = $ArrayDeParametros['idPedido'];
        
        $pedidos = new pedido();     
        $pedidos->idPedido = $id;          
        $respuesta = $pedidos->estadoComiendo();     
                       
         return $response->withJson($respuesta, 200);  

    }

    public function traerPedidoXid($request, $response, $args) 
    {        
        $id = $args['id'];  
        $pedidos = new pedido();
        $pedidos->idPedido = $id;          
        $respuesta = $pedidos->getPedidosXid();     
                       
         return $response->withJson($respuesta, 200); 

    }

    public function traerplatosvendidos($request, $response, $args) 
    {
        $pedidos = new pedido();        
        $respuesta = $pedidos->traerpaltosstats();     
                       
         return $response->withJson($respuesta, 200);  
    }

    public function pedidoPcuenta($request, $response, $args) 
    {        
        $mesa = $args['mesa'];  
        $pedidos = new pedido();
        $pedidos->mesa = $mesa;          
        $respuesta = $pedidos->pedPcuenta();     
                       
         return $response->withJson($respuesta, 200); 

    }

    public function eliminarPedidoLive($request, $response, $args) 
    {        
        $objDelaRespuesta = new stdclass();   
        $ArrayDeParametros = $request->getParsedBody();
        $id = $ArrayDeParametros['id'];
        $pedidos = new pedido();     
        $pedidos->idPedido = $id;          
        $respuesta = $pedidos->removerPedidos();     
                       
         return $response->withJson($respuesta, 200);  

    }

    public function cancelarpedidocliente($request, $response, $args) 
    {        
        $objDelaRespuesta = new stdclass();   
        $ArrayDeParametros = $request->getParsedBody();
        $idPedido = $ArrayDeParametros['idPedido'];

        $cod_plato = $ArrayDeParametros['cod_plato'];
        $pedidos = new pedido();     

        $pedidos->idPedido = $idPedido;  

        $pedidos->cod_plato = $cod_plato;  

        var_dump($pedidos);         
        $respuesta = $pedidos->removerUnPedidoUsuario();
        $pedidos->productocancelado();    
                       
         return $response->withJson($respuesta, 200);  

    }





}

?>