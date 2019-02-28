<?php

date_default_timezone_set('America/Argentina/Buenos_Aires');
require_once "mesa.php";

class mesasApi extends mesa{
    
    public function cerrarMesa($request, $response, $args) 
    {
        $objDelaRespuesta = new stdclass();   
        $ArrayDeParametros = $request->getParsedBody();
        $comensales = $ArrayDeParametros['mesa'];
        $mozo = $ArrayDeParametros['mozo'];
        $mesa = $ArrayDeParametros['mesa'];
        $idPedido = $ArrayDeParametros['idPedido'];
        $cliente = $ArrayDeParametros['cliente'];  
        $pedidos = $ArrayDeParametros['platos'];
        

        foreach ($pedidos as $key) {
            $pedido = new pedido();
            $pedido->mesa = $mesa;
            $pedido->mozo = $mozo;
            $pedido->idPedido = $idPedido;
            $pedido->comensales = $comensales;
            $pedido->cliente = $cliente;
            $pedido->cod_plato = $key['cod_prod'];  
            $pedido->cantidad =  $key['cantidad'];
        
            $objDelaRespuesta->respuesta = $respuesta = $pedido->nuevopedidolive();   
            $pedido = null;
        }

        return $response->withJson($objDelaRespuesta, 200);
    }

    public function mesaslive($request, $response, $args) 
    {   
        $objDelaRespuesta = new stdclass();
        $mesa = new mesa();
        $objDelaRespuesta = $mesa->mesasenvivo();
        return $response->withJson($objDelaRespuesta, 200);
    }

    public function mesasdisponibles($request, $response, $args) 
    {   
        $objDelaRespuesta = new stdclass();
        $mesa = new mesa();
        $objDelaRespuesta = $mesa->mesasfree();
        return $response->withJson($objDelaRespuesta, 200);
    }

    public function mesaesperando($request, $response, $args) 
    {   
        $objDelaRespuesta = new stdclass();
        $ArrayDeParametros = $request->getParsedBody();
        $mesa = $ArrayDeParametros['nro_mesa'];
        $table = new mesa();
        $objDelaRespuesta = $table->esperando($mesa);
        return $response->withJson($objDelaRespuesta, 200);
    }
    public function mesacomiendo($request, $response, $args) 
    {   
        $objDelaRespuesta = new stdclass();
        $ArrayDeParametros = $request->getParsedBody();
        $mesa = $ArrayDeParametros['nro_mesa'];
        $table = new mesa();
        $objDelaRespuesta = $table->comiendo($mesa);
        return $response->withJson($objDelaRespuesta, 200);
    }
    public function mesapagando($request, $response, $args) 
    {   
        $objDelaRespuesta = new stdclass();
        $ArrayDeParametros = $request->getParsedBody();
        $mesa = $ArrayDeParametros['nro_mesa'];
        $table = new mesa();
        $objDelaRespuesta = $table->pagando($mesa);
        return $response->withJson($objDelaRespuesta, 200);
    }
    public function mesacerrada($request, $response, $args) 
    {   
        $objDelaRespuesta = new stdclass();
        $ArrayDeParametros = $request->getParsedBody();
        $mesa = $ArrayDeParametros['nro_mesa'];
        $table = new mesa();
        $objDelaRespuesta = $table->cerrada($mesa);
        return $response->withJson($objDelaRespuesta, 200);
    }

    public function traermesasusadas($request, $response, $args) 
    {   
        $objDelaRespuesta = new stdclass();
        $table = new mesa();
        $objDelaRespuesta = $table->statsmesas();
        return $response->withJson($objDelaRespuesta, 200);
    }

    public function newStatsMesas($request, $response, $args) 
    {   
        $objDelaRespuesta = new stdclass();
        $ArrayDeParametros = $request->getParsedBody();
        $mesa = $ArrayDeParametros['mesa'];
        $mozo = $ArrayDeParametros['mozo'];
        $total = $ArrayDeParametros['total'];
        $table = new mesa();
        $table->nro_mesa = $mesa;
        $table->mozo = $mozo;
        $table->total = $total;
        $objDelaRespuesta = $table->statsClosedTable();
        return $response->withJson($objDelaRespuesta, 200);
    }

    public function totalmesasfacturadas($request, $response, $args) 
    {   
        $objDelaRespuesta = new stdclass();
        $table = new mesa();
        $objDelaRespuesta = $table->mesaquemasfacturo();
        return $response->withJson($objDelaRespuesta, 200);
    }

    public function statsFacturas($request, $response, $args) 
    {   
        $objDelaRespuesta = new stdclass();
        $table = new mesa();
        $objDelaRespuesta = $table->facturasMaxYMin();
        return $response->withJson($objDelaRespuesta, 200);
    }
    
    public function totalMensual($request, $response, $args) 
    {   
        $objDelaRespuesta = new stdclass();
        $table = new mesa();
        $objDelaRespuesta = $table->totalFacturadoUltimosMeses();
        return $response->withJson($objDelaRespuesta, 200);
    }
    



    



    
}

?>
