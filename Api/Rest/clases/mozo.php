<?php

  require_once "AccesoDatos.php";


  class mozo{

    public $mesa;
    public $mozo;
    public $cod_plato;
    public $estado;
    public $idPedido;
    public $cliente;

    public function nuevopedidolive()
    {   
        $date = date("Y-m-d H:i:s");
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $consulta =$objetoAccesoDato->RetornarConsulta("
      INSERT INTO `pedidosenvivo`(`nro_mesa`, `mozo`, `cod_plato`, `hora_pedido`, `estado`, `id`,`cliente`)
      VALUES ('$this->mesa','$this->mozo','$this->cod_plato','$date',0,'$this->idPedido', '$this->cliente')");
      return $consulta->execute();
         
    } 
  }

  ?>