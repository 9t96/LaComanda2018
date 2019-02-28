<?php

  require_once "AccesoDatos.php";

  class encuesta{

   public  $mesaPtj;
   public  $mozoPtj;
   public  $restoPtj;
   public  $comidaPtj;
   public  $opinion;
   public $usuario;
   public $nro_mesa;

    public function altaEncuesta()
    {
          $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
          $consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO `encuestas`
          (`mozoScore`, `mesaScore`, `restoScore`, `comidaScore`, `opinion`, `cod_user`, `nro_mesa`)
           VALUES ('$this->mozoPtj','$this->mesaPtj','$this->restoPtj','$this->comidaPtj','$this->opinion', '$this->usuario', '$this->nro_mesa')");
          return $consulta->execute();
         
    }

    public function NuevaProximaEncuesta()
    {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO `encuestasfuturas`(`cod_user`, `mesa`) VALUES ('$this->usuario','$this->mesaPtj')");
      return $consulta->execute();

    }

    public function removerEncuestaPendiente()
    {
      
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta =$objetoAccesoDato->RetornarConsulta("DELETE FROM `encuestasfuturas` WHERE `cod_user` = '$this->usuario'");
      return $consulta->execute();
    }

    public function EncuestaPendienteXID()
    {
      
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM `encuestasfuturas` WHERE `cod_user` = '$this->usuario'");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

    public function traerEncuestasPositivas()
    {
      
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta =$objetoAccesoDato->RetornarConsulta("SELECT u.nombre, u.apellido, e.mozoScore, e.mesaScore, e.restoScore, e.comidaScore, e.opinion, e.nro_mesa FROM usuarios as u, encuestas as e 
      WHERE (`mozoScore` + `mesaScore` + `restoScore` + `comidaScore`)/4.0 >= 7 ORDER BY RAND()
LIMIT 10");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

    public function traerEncuestasNegativas()
    {
      
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta =$objetoAccesoDato->RetornarConsulta("SELECT u.nombre, u.apellido, e.mozoScore, e.mesaScore, e.restoScore, e.comidaScore, e.opinion, e.nro_mesa FROM usuarios as u, encuestas as e 
      WHERE (`mozoScore` + `mesaScore` + `restoScore` + `comidaScore`)/4.0 < 5  ORDER BY RAND()
LIMIT 10");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

  }

/**SELECT u.nombre, u.apellido, e.mozoScore, e.mesaScore, e.restoScore, e.comidaScore, e.opinion, e.nro_mesa FROM usuarios as u, encuestas as e WHERE `mozoScore` >=5 AND `mesaScore` >=5 AND `restoScore`  >=5 AND `comidaScore` >=5 AND e.cod_user = u.cod_emp */

?>