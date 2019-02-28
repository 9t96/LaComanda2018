<?php

require_once "usuario.php";
require_once "AutentificadorJWT.php";
/**
 *
 */
class userApi extends user 
{

    public function Logear($request, $response, $args) 
    {	
        $ArrayDeParametros = $request->getParsedBody();
       
       
	    $usuario=$ArrayDeParametros['user'];
        $contra=$ArrayDeParametros['pass'];       
        $user = new user();
        $user->user=$usuario;
        $user->pass=$contra;
        $usuario = $user->LogearUs();

        if(!$usuario[0])
        {
            $objDelaRespuesta= new stdclass();
            $objDelaRespuesta->error="no se encuentra";
            $NuevaRespuesta = $response->withJson($objDelaRespuesta, 200);
        }
        else
        {     // CREO EL TOKEN
            //$NuevaRespuesta = $response->withJson($usuario, 200);   
            if($usuario[0]->estado == 1)
            {
                $token= AutentificadorJWT::CrearToken($usuario[0]);
                $NuevaRespuesta = $response->withJson($token,200);
            }else
            {
                $objDelaRespuesta= new stdclass();
                $objDelaRespuesta->error="baneado";
                $NuevaRespuesta = $response->withJson($objDelaRespuesta, 200);

            }
           
        }

        return $NuevaRespuesta;
    }
    
    public function Registro($request, $response, $args) 
    {
 
         
         $ArrayDeParametros = $request->getParsedBody();
         //var_dump($ArrayDeParametros);
         $nombre= $ArrayDeParametros['nombre'];
         $apellido= $ArrayDeParametros['apellido'];
         $usuario= $ArrayDeParametros['user'];
         $pass= $ArrayDeParametros['pass'];
         $tipo_usuario = $ArrayDeParametros['tipo_usuario'];   
         $estado= $ArrayDeParametros['estado']; 
         $user = new user();
         $user->nombre=$nombre;
         $user->apellido=$apellido;
         $user->user=$usuario;  
         $user->pass=$pass;  
         $user->tipo_usuario=$tipo_usuario;  
         $user->estado=$estado;        
         $respuesta = $user->altaUs();     
                      
        
         return $response->withJson($respuesta, 200);
    }
    
    public function TraerAll($request, $response, $args) 
    {
        $usuarios= user::traerTodos();
     	$newresponse = $response->withJson($usuarios, 200);
    	return $newresponse;
    }
    
    public function ModificarUno($request, $response, $args) 
    {
     	$ArrayDeParametros = $request->getParsedBody();
	    
	    $user = new user();	   
	    $user->user = $ArrayDeParametros['cod_emp'];
        $user->estado = $ArrayDeParametros['estado'];       
        
        return	$resultado = $user->modUs();      
    }

    public function SeguirUsuario($request, $response, $args){
        $objDelaRespuesta= new stdclass();
        $ArrayDeParametros = $request->getParsedBody();
        
        $emp = $ArrayDeParametros['cod_emp'];
        
        $user = new user();
        $user->cod_emp = $emp;
        
        $objDelaRespuesta = $user->seguirEmp();     
                        
        return $response->withJson($objDelaRespuesta, 200);
    }

    public function CerrarSeguimiento($request, $response, $args)
    {
        $objDelaRespuesta= new stdclass();
        $ArrayDeParametros = $request->getParsedBody();
        
        $emp = $ArrayDeParametros['cod_emp'];
        $horaentrada = $ArrayDeParametros['horaentrada'];
        $user = new user();
        $user->cod_emp = $emp;
        $user->horaentrada = $horaentrada;
        $objDelaRespuesta->respuesta= $respuesta = $user->CerrarSesion();     
                      
        
        return $response->withJson($objDelaRespuesta, 200);
    }


    public function statsOpEmpleados($request, $response, $args) 
    {   
        $objDelaRespuesta = new stdclass();
        $user = new user();
        $objDelaRespuesta = $user->trarStatEmployee();
        return $response->withJson($objDelaRespuesta, 200);
    }

    public function traerlogins($request, $response, $args) 
    {   
        $objDelaRespuesta = new stdclass();
        $user = new user();
        $objDelaRespuesta = $user->traerLoginEmp();
        return $response->withJson($objDelaRespuesta, 200);
    }
    

}
?>
