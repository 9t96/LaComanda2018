<?php


require_once "admin.php";

class adminApi extends admin{

    public function NewEmployee($request, $response, $args) 
    {
        
        $ArrayDeParametros = $request->getParsedBody();
        var_dump($ArrayDeParametros);
        $nombre = $ArrayDeParametros['nombre'];
        $apellido = $ArrayDeParametros['apellido'];
        $usuario = $ArrayDeParametros['user'];
        $pass = $ArrayDeParametros['pass'];
        $tipo_usuario = $ArrayDeParametros['tipo_usuario'];   
        $estado = $ArrayDeParametros['estado']; 
        $rol = $ArrayDeParametros['rol']; 
        
        $admin = new admin();
        $admin->nombre=$nombre;
        $admin->apellido=$apellido;
        $admin->user=$usuario;  
        $admin->pass=$pass;  
        $admin->tipo_usuario=$tipo_usuario;  
        $admin->estado=$estado;  
        $admin->rol=$rol;        
        $respuesta = $admin->altaEmp(); 

        return $response->withJson($respuesta, 200);
    }
    
    
    public function TraerAll($request, $response, $args) 
    {
        $usuarios= admin::traerTodos();
     	$newresponse = $response->withJson($usuarios, 200);
    	return $newresponse;
    }
    
    public function SuspenderEmp($request, $response, $args) 
    {
     	
     	$ArrayDeParametros = $request->getParsedBody();
	    $user = new admin();	   
	    $user->cod_emp=$ArrayDeParametros['cod_emp'];

        $resultado = $user->suspEmp();
        return  $response->withJson($resultado, 200);
       
    }
    public function ReincorporarEmp($request, $response, $args) 
    {
     	
     	$ArrayDeParametros = $request->getParsedBody();
	    $user = new admin();	   
	    $user->cod_emp=$ArrayDeParametros['cod_emp'];

        $resultado = $user->reinEmp();
        return  $response->withJson($resultado, 200);
       
    }
    public function EliminarEmp($request, $response, $args) 
    {
     	
     	$ArrayDeParametros = $request->getParsedBody();
	    $user = new admin();	   
	    $user->cod_emp=$ArrayDeParametros['cod_emp']; 

        $resultado = $user->deleteEmp();
        return  $response->withJson($resultado, 200);
       
    }
    
    public function TotXSector($request, $response, $args) 
    {   
        $objDelaRespuesta = new stdclass();
        $admin = new admin();
        $objDelaRespuesta = $admin->totalpedXsector();
        return $response->withJson($objDelaRespuesta, 200);
    }

   
}

?>