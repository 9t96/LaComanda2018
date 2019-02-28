<?php
  date_default_timezone_set('America/Argentina/Buenos_Aires');
  require_once "AccesoDatos.php";


  class pedido{

    public $mesa;
    public $mozo;
    public $cod_plato;
    public $estado;
    public $idPedido;
    public $cliente;
    public $cantidad;
    public $comensales;
    public $demora;

    public function nuevopedidolive()
    {   
      $date = date("Y-m-d H:i:s");
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta = $objetoAccesoDato->RetornarConsulta("INSERT INTO `pedidosenvivo`(`nro_mesa`, `mozo`, `cod_plato`, `hora_pedido`, `estado`, `id`, `cliente`, `cantidad`, `comensales`, `total`) 
      VALUES ('$this->mesa','$this->mozo','$this->cod_plato','$date',0,'$this->idPedido','$this->cliente','$this->cantidad','$this->comensales', '$this->total')");
      return $consulta->execute();     
    } 

    public function getPedidos()
    {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta = $objetoAccesoDato->RetornarConsulta("
      SELECT * FROM `pedidosenvivo` WHERE 1");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getPedidosCerveza()
    {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta = $objetoAccesoDato->RetornarConsulta("
      SELECT * FROM `pedidosenvivo` WHERE cod_plato BETWEEN 100 and 199");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_CLASS, "pedido");
    }


    public function getPedidosBart()
    {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta = $objetoAccesoDato->RetornarConsulta("
      SELECT * FROM `pedidosenvivo` WHERE cod_plato BETWEEN 200 and 299");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_CLASS, "pedido");
    }


    public function getPedidosCocina()
    {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta = $objetoAccesoDato->RetornarConsulta("
      SELECT * FROM `pedidosenvivo` WHERE cod_plato BETWEEN 300 and 399");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_CLASS, "pedido");
    }

    public function getPedidosPostre()
    {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta = $objetoAccesoDato->RetornarConsulta("
      SELECT * FROM `pedidosenvivo` WHERE cod_plato BETWEEN 400 and 499");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

    public function getPedidosXid()
    {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM `pedidosenvivo` WHERE id LIKE '$this->idPedido'");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }


    public function estadoPreparacion()
    {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta = $objetoAccesoDato->RetornarConsulta("
      UPDATE `pedidosenvivo` SET `estado`= 1, `demora`='$this->demora' WHERE id LIKE '$this->idPedido' AND cod_plato LIKE '$this->cod_plato'");
      return $consulta->execute();

    }

    public function estadoParaServir()
    {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta = $objetoAccesoDato->RetornarConsulta("
      UPDATE `pedidosenvivo` SET `estado`= 2 WHERE id LIKE '$this->idPedido' AND cod_plato LIKE '$this->cod_plato'");
      return $consulta->execute();

    }

    public function estadoComiendo()
    {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta = $objetoAccesoDato->RetornarConsulta("
      UPDATE `pedidosenvivo` SET `estado`= 3 WHERE id LIKE '$this->idPedido' AND cod_plato LIKE '$this->cod_plato'");
      
       $rta = $consulta->execute();
       print_r($rta);
       return $rta;

    }

    public function productovendido()
    {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta = $objetoAccesoDato->RetornarConsulta("UPDATE `platos`
       SET `cant_ventas`= cant_ventas + $this->cantidad WHERE cod_plato = $this->cod_plato");
      return $consulta->execute();
    }

    public function productocancelado()
    {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta = $objetoAccesoDato->RetornarConsulta("UPDATE `platos`
       SET `veces_cancelado`= veces_cancelado + 1 WHERE cod_plato = $this->cod_plato");
      return $consulta->execute();
    }

    public function traerpaltosstats()
    {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta = $objetoAccesoDato->RetornarConsulta("SELECT `cod_plato`, `cant_ventas`, `cant_timeout`, `veces_cancelado` FROM `platos` WHERE 1");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

    public function pedPcuenta()
    {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM `pedidosenvivo` WHERE `nro_mesa` = $this->mesa");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

    public function removerPedidos()
    {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta = $objetoAccesoDato->RetornarConsulta("DELETE FROM `pedidosenvivo` WHERE id LIKE '$this->idPedido'");
      return  $consulta->execute();
    }

    public function removerUnPedidoUsuario()
    {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta = $objetoAccesoDato->RetornarConsulta("DELETE FROM `pedidosenvivo` WHERE id LIKE '$this->idPedido' AND cod_plato = '$this->cod_plato'");
      return  $consulta->execute();
    }

  }

  ?>