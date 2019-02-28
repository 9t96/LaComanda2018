<?php


require_once "encuestas.php";

class encuestasApi extends encuesta{

    public function AltaEncu($request, $response, $args) 
    {
 
         $objDelaRespuesta= new stdclass();
         $ArrayDeParametros = $request->getParsedBody();           
         
         $encuesta = new encuesta();
         $encuesta->mesaPtj = $ArrayDeParametros['mesa'];
         $encuesta->mozoPtj = $ArrayDeParametros['mozo'];
         $encuesta->restoPtj = $ArrayDeParametros['resto'];
         $encuesta->comidaPtj = $ArrayDeParametros['comida'];
         $encuesta->opinion = $ArrayDeParametros['texto'];
         $encuesta->usuario = $ArrayDeParametros['usuario'];
         $encuesta->nro_mesa = $ArrayDeParametros['nro_mesa'];
         $objDelaRespuesta->respuesta= $respuesta = $encuesta->altaEncuesta();     

         if( $objDelaRespuesta->respuesta == 1)
         {
             $encuesta->removerEncuestaPendiente();
         }

         return $response->withJson($objDelaRespuesta, 200);
    } 
     
     public function AltaEncuPendiente($request, $response, $args) 
     {
        $objDelaRespuesta= new stdclass();
        $ArrayDeParametros = $request->getParsedBody();           
        
        $encuesta = new encuesta();
        $encuesta->mesaPtj = $ArrayDeParametros['mesa'];
        $encuesta->usuario = $ArrayDeParametros['usuario'];
        $objDelaRespuesta->respuesta= $respuesta = $encuesta->NuevaProximaEncuesta();     
                     
       
        return $response->withJson($objDelaRespuesta, 200);
   } 

   public function BuscarEncuestaPendiente($request, $response, $args) 
   {
      $encuesta = new encuesta();
      $encuesta->usuario = $args['userid'];
      $respuesta = $encuesta->EncuestaPendienteXID();     

      return $response->withJson($respuesta, 200);
 } 
 public function TraerComentariosBuenos($request, $response, $args) 
 {
    $encuesta = new encuesta();
    $respuesta = $encuesta->traerEncuestasPositivas();     

    return $response->withJson($respuesta, 200);
} 

public function TraerComentariosMalos($request, $response, $args) 
{
   $encuesta = new encuesta();
   $respuesta = $encuesta->traerEncuestasNegativas();     

   return $response->withJson($respuesta, 200);
}
 
}

?>