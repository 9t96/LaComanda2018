<?php

  require_once "AccesoDatos.php";


  class mesa{

    public $nro_mesa;
    public $mozo;
    public $total;
    public $estado;

    public function abrirmesa()
    {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE `mesaslive` SET `estado` = '1' WHERE nro_mesa = '$this->nromesa'");
      return $consulta->execute();
    }

    public function sumarusomesa()
    {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE `datosmesas` SET `cant_usos`= cant_usos + 1 WHERE nro_mesa = '$this->nromesa'");
      return $consulta->execute();
    }

    public function mesasenvivo()
    {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta =$objetoAccesoDato->RetornarConsulta("SELECT `nro_mesa`, `estado` FROM `mesaslive` WHERE 1");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);

    }

    public function mesasfree()
    {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta =$objetoAccesoDato->RetornarConsulta("SELECT `nro_mesa` FROM `mesaslive` WHERE estado = 4");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

    public function esperando($mesa)
    {

      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE `mesaslive` SET `estado` = 1 WHERE nro_mesa = ?");
      $consulta->bindValue(1,$mesa);
      return $consulta->execute();
    }

    public function comiendo($mesa)
    {

      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE `mesaslive` SET `estado` = 2 WHERE nro_mesa = ?");
      $consulta->bindValue(1,$mesa);
      return $consulta->execute();
    }

    public function pagando($mesa)
    {

      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE `mesaslive` SET `estado` = 3 WHERE nro_mesa = ?");
      $consulta->bindValue(1,$mesa);
      return $consulta->execute();
    }

    public function cerrada($mesa)
    {

      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE `mesaslive` SET `estado` = 4 WHERE nro_mesa = ?");
      $consulta->bindValue(1,$mesa);
      return $consulta->execute();
    }

    public function statsmesas()
    {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM datosmesas WHERE 1");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

    public function statsClosedTable()
    {
      $date = date("Y-m-d H:i:s");
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta = $objetoAccesoDato->RetornarConsulta("INSERT INTO `mesascerradas`(`nro_mesa`, `fecha`, `importe_total`, `mozo`) VALUES ('$this->nro_mesa','$date','$this->total','$this->mozo')");
      return $consulta->execute();     
    }
    //la que mas y menos facturo
    public function mesaquemasfacturo()
    {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta =$objetoAccesoDato->RetornarConsulta("SELECT `nro_mesa`,SUM(`importe_total`) as totalFacturado FROM `mesascerradas` WHERE 1 GROUP BY `nro_mesa`");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function facturasMaxYMin()
    {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta =$objetoAccesoDato->RetornarConsulta("SELECT nro_mesa, MAX(importe_total) as alto,MIN(importe_total) as bajo FROM `mesascerradas` WHERE 1 GROUP BY nro_mesa");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

    public function totalFacturadoUltimosMeses()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta =$objetoAccesoDato->RetornarConsulta("SELECT SUM(importe_total) as septiembre FROM `mesascerradas` WHERE fecha BETWEEN '2018-09-01 00:00:00' AND '2019-09-31 23:59:59' UNION
        SELECT SUM(importe_total) as octubre FROM `mesascerradas` WHERE fecha BETWEEN '2018-10-01 00:00:00' AND '2019-10-31 23:59:59' UNION
        SELECT SUM(importe_total) as noviembre FROM `mesascerradas` WHERE fecha BETWEEN '2018-11-01 00:00:00' AND '2019-11-31 23:59:59' UNION
        SELECT SUM(importe_total) as diciembre FROM `mesascerradas` WHERE fecha BETWEEN '2018-12-01 00:00:00' AND '2019-12-31 23:59:59' UNION
        SELECT SUM(importe_total) as enero FROM `mesascerradas` WHERE fecha BETWEEN '2019-01-01 00:00:00' AND '2019-01-31 23:59:59' UNION
        SELECT SUM(importe_total) as febrero FROM `mesascerradas` WHERE fecha BETWEEN '2019-02-01 00:00:00' AND '2019-02-28 23:59:59' ");
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }



     /*SELECT `nro_mesa`,SUM(`importe_total`) FROM `mesascerradas` WHERE 1 GROUP BY `nro_mesa`*/   //CONSULTA PARA TOTAL FACTURADO.
     /** SELECT nro_mesa, MIN(importe_total) FROM `mesascerradas` WHERE 1*/ //MENOR FACTURA
     /*consultas entre fecha*SELECT `nro_mesa`, `fecha`, `importe_total`, `mozo` FROM `mesascerradas` WHERE `fecha` BETWEEN '2019-02-13 00:39:25' AND '2019-02-13 19:39:25' */
    /*Para facturas mas alta y baja por mesa*SELECT nro_mesa, MAX(importe_total) as alto,MIN(importe_total) as bajo FROM `mesascerradas` WHERE 1 GROUP BY nro_mesa*/
  
  
  
  }     

?>