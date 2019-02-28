<?php
  date_default_timezone_set('America/Argentina/Buenos_Aires');
  require_once "AccesoDatos.php";
  /**
   *
   */
  class user
  { 
    
    public $nombre;
    public $apellido;
    public $user; 
    public $pass;
    public $estado;  
    public $tipo_usuario;
    public $rol;
    public $cod_emp;
    public $horaentrada;
    
    
    public function LogearUs()    
    {
     
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM usuarios    
      WHERE usuario LIKE '$this->user' AND contraseña LIKE '$this->pass' ");   
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_CLASS, "user");
      

    }
    public function traerTodos()
    {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta =$objetoAccesoDato->RetornarConsulta("SELECT usuario, tipo_usuario,estado FROM `usuarios`");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_CLASS, "user");
    }
    public function altaUs()
    {
          $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
          $consulta =$objetoAccesoDato->RetornarConsulta("
          INSERT INTO `usuarios`(`nombre`, `apellido`, `usuario`, `contraseña`, `tipo_usuario`, `estado`)
          VALUES('$this->nombre','$this->apellido','$this->user','$this->pass','$this->tipo_usuario','$this->estado')");
          return $consulta->execute();
         
    }    
    public function modUs()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta =$objetoAccesoDato->RetornarConsulta("
        UPDATE `usuarios`
        SET `estado`= :est
        WHERE `cod_emp` = :codemp ");     
        $consulta->bindValue(':est',$this->estado, PDO::PARAM_INT);       
        $consulta->bindValue(':codemp', $this->user, PDO::PARAM_STR);
        return $consulta->execute();
    }

    public function sumarOperacion()
    { 
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE `seguimientoempleados` SET `cant_operaciones`= cant_operaciones + 1 
      WHERE  hora_ingreso = '$this->horaentrada' AND cod_emp = $this->cod_emp");
      return $consulta->execute();
    }

    public function seguirEmp()
    { 
      $date = date("Y-m-d H:i:s");
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO `seguimientoempleados`(`hora_ingreso`, `cod_emp`) 
      VALUES ('$date','$this->cod_emp')");
      
      if($consulta->execute() == 1)
      {
        return $date;
      }
    }
    
    public function CerrarSesion()
    {
      $date = date("Y-m-d H:i:s");
      print_r($this->horaentrada);
      print_r($this->cod_emp);

      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE `seguimientoempleados` SET  hora_salida = '$date'
      WHERE cod_emp = $this->cod_emp AND hora_ingreso = '$this->horaentrada'");

      return $consulta->execute();
    }

    public function trarStatEmployee()
    {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta =$objetoAccesoDato->RetornarConsulta("SELECT u.nombre,u.apellido,s.cod_emp,u.rol, SUM(s.cant_operaciones) as operaciones 
      FROM `usuarios` as u, `seguimientoempleados` as s 
      WHERE u.cod_emp = s.cod_emp AND u.estado = 1 GROUP BY cod_emp");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function traerLoginEmp()
    {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta =$objetoAccesoDato->RetornarConsulta("SELECT s.cod_emp,u.nombre, u.apellido, u.usuario, u.rol, s.hora_ingreso as entrada, s.hora_salida as salida, s.cant_operaciones as operaciones
      FROM `seguimientoempleados` as s, `usuarios` as u 
      WHERE s.cod_emp = u.cod_emp AND u.estado = 1 ORDER BY `hora_salida` DESC");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

   /* SELECT s.cod_emp,u.nombre, u.apellido, u.usuario, u.rol, s.hora_ingreso, s.hora_salida 
   FROM `seguimientoempleados` as s, `usuarios` as u 
   WHERE s.cod_emp = u.cod_emp ORDER BY `hora_salida` ASC*/


   
}
?>
