<?php

  require_once "AccesoDatos.php";


  class admin{

    public $nombre;
    public $apellido;
    public $usuario; 
    public $pass;
    public $estado;  
    public $tipo_usuario;
    public $cod_emp;
    public $rol;
    
    public function altaEmp()
    {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta =$objetoAccesoDato->RetornarConsulta("
      INSERT INTO `usuarios`(`nombre`, `apellido`, `usuario`, `contraseña`, `tipo_usuario`, `estado`, `rol`)
      VALUES('$this->nombre','$this->apellido','$this->user','$this->pass','$this->tipo_usuario','$this->estado', '$this->rol')");
      return $consulta->execute();
         
    } 
    public function traerTodos()
    {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM `usuarios`");
      $consulta->execute();
      //var_dump($consulta->fetchAll(PDO::FETCH_CLASS, "user"));
      return $consulta->fetchAll(PDO::FETCH_CLASS, "admin");
    }
    
    public function suspEmp()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE `usuarios` SET `estado`= 2 WHERE cod_emp = $this->cod_emp");  
        
        $rta = $consulta->execute();
        print_r($rta);
        return $rta;
    }
    public function reinEmp()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE `usuarios` SET `estado`= 1 WHERE cod_emp = $this->cod_emp");  
        
        $rta = $consulta->execute();
        print_r($rta);
        return $rta;
    }
    public function deleteEmp()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE `usuarios` SET `estado`= 3 WHERE cod_emp = $this->cod_emp");  
        
        $rta = $consulta->execute();
        print_r($rta);
        return $rta;
    }

    public function totalpedXsector()
    {
          /*total pedidos por sector*SELECT u.rol, SUM(`cant_operaciones`) as operaciones FROM `seguimientoempleados` as s, `usuarios` as u WHERE s.cod_emp = u.cod_emp GROUP BY u.rol */
          $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
          $consulta =$objetoAccesoDato->RetornarConsulta("SELECT u.rol, SUM(`cant_operaciones`) as operaciones FROM `seguimientoempleados` as s, `usuarios` as u WHERE s.cod_emp = u.cod_emp AND u.rol > 4 GROUP BY u.rol ");
          $consulta->execute();
          return $consulta->fetchAll(PDO::FETCH_OBJ);
    }
    

  }



?>