<?php 
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../composer/vendor/autoload.php';
require_once './clases/AccesoDatos.php';
require_once './clases/usuarioApi.php';
require_once './clases/pedidoApi.php';
require_once './clases/adminApi.php';
require_once './clases/mozoApi.php';
require_once './clases/mesasApi.php';
require_once './clases/encuestasApi.php';
require_once './clases/AutentificadorJWT.php';
require_once './clases/MWparaCORS.php';
require_once './clases/MWparaAutentificar.php';
require_once './clases/MWparaOperacion.php';
require_once './clases/MWparaProductos.php';
require_once './clases/MWparaMesas.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;


/*v

¡La primera línea es la más importante! A su vez en el modo de
desarrollo para obtener información sobre los errores
 (sin él, Slim por lo menos registrar los errores por lo que si está utilizando
  el construido en PHP webserver, entonces usted verá en la salida de la consola
  que es útil).

  La segunda línea permite al servidor web establecer el encabezado Content-Length,
  lo que hace que Slim se comporte de manera más predecible.
*/

$app = new \Slim\App(["settings" => $config]);
/*
$app->add(function ($req, $res, $next) {
  $response = $next($req, $res);
  return $response
          ->withHeader('Access-Control-Allow-Origin', '*')
          ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
          ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});*/


$app->group('/Publico', function () {

  $this->post('/Logear', \userApi::class . ':Logear');
  $this->post('/Registro', \userApi::class . ':Registro'); 
  $this->post('/Seguimiento', \userApi::class . ':SeguirUsuario'); 
  $this->post('/CerrarSeguimientoDiario', \userApi::class . ':CerrarSeguimiento'); 

});


//NUEVO PEDIDO SOLO MOZO
$app->post('/Pedidos/NuevoPedido', \pedidoApi::class . ':agregarPedido')
  ->add(\MWparaAutentificar::class . ':VerificarMozo')
  ->add(\MWparaMesas::class . ':AbrirMesa');
$app->post('/Pedidos/sumarvendidos', \pedidoApi::class . ':prodVendido')
  ->add(\MWparaAutentificar::class . ':VerificarMozo');


//GET PEDIDOS
$app->get('/Pedidos/TraerPedidos', \pedidoApi::class . ':traerPedidos')
  ->add(\MWparaAutentificar::class . ':VerificarEmpleado');
$app->get('/Pedidos/TraerPedidosCerveza', \pedidoApi::class . ':traerPedidosCerveza')
  ->add(\MWparaAutentificar::class . ':VerificarEmpleadoLinea');
$app->get('/Pedidos/TraerPedidosBartender', \pedidoApi::class . ':traerPedidosBart')
  ->add(\MWparaAutentificar::class . ':VerificarEmpleadoLinea');
$app->get('/Pedidos/TraerPedidosCocina', \pedidoApi::class . ':traerPedidosCocina')
  ->add(\MWparaAutentificar::class . ':VerificarEmpleadoLinea');
$app->get('/Pedidos/TraerPedidosPostre', \pedidoApi::class . ':traerPedidosPostre')
  ->add(\MWparaAutentificar::class . ':VerificarEmpleadoLinea');
$app->get('/Pedidos/TraerPedidoXid/{id}', \pedidoApi::class . ':traerPedidoXid')
 ->add(\MWparaAutentificar::class . ':VerificarUsuario');
$app->get('/Pedidos/PedidosParaCuenta/{mesa}', \pedidoApi::class . ':pedidoPcuenta')
 ->add(\MWparaAutentificar::class . ':VerificarAdmin');

  //CAMBIAR ESTADOS PEDIDOS
$app->post('/Pedidos/Preparando', \pedidoApi::class . ':enPreparacion')
  ->add(\MWparaAutentificar::class . ':VerificarEmpleado');
$app->post('/Pedidos/ListoParaServir', \pedidoApi::class . ':paraServir')
  ->add(\MWparaAutentificar::class . ':VerificarEmpleado')
  ->add(\MWparaOperacion::class . ':SumarOperacionEmpleado');
$app->post('/Pedidos/ClientesComiendo', \pedidoApi::class . ':clientesComiendo')
  ->add(\MWparaAutentificar::class . ':VerificarMozo')
  ->add(\MWparaOperacion::class . ':SumarOperacionEmpleado');
$app->get('/Pedidos/StatsPlatos', \pedidoApi::class . ':traerplatosvendidos')
  ->add(\MWparaAutentificar::class . ':VerificarAdmin');
$app->post('/Pedidos/removerPedido', \pedidoApi::class . ':eliminarPedidoLive')
  ->add(\MWparaAutentificar::class . ':VerificarAdmin');
$app->post('/Pedidos/CancelarPedido', \pedidoApi::class . ':cancelarpedidocliente')
  ->add(\MWparaAutentificar::class . ':VerificarUsuario');

  //Mesas
$app->post('/Mesas/mesaWaiting', \mesasApi::class . ':mesaesperando')
  ->add(\MWparaAutentificar::class . ':VerificarMozo');
$app->post('/Mesas/mesaComiendo', \mesasApi::class . ':mesacomiendo')
  ->add(\MWparaAutentificar::class . ':VerificarMozo');
$app->post('/Mesas/mesaPagando', \mesasApi::class . ':mesapagando')
  ->add(\MWparaAutentificar::class . ':VerificarMozo');
$app->post('/Mesas/mesaCerrada', \mesasApi::class . ':mesacerrada')
  ->add(\MWparaAutentificar::class . ':VerificarAdmin')
  ->add(\MWparaMesas::class . ':SumarMesaUsada');
$app->post('/Mesas/nuevostatsMesaCerrada', \mesasApi::class . ':newStatsMesas')
  ->add(\MWparaAutentificar::class . ':VerificarAdmin');
//stats
  $app->get('/Mesas/TraerMesasLive', \mesasApi::class . ':mesaslive')
  ->add(\MWparaAutentificar::class . ':VerificarMozoYAdmin');
$app->get('/Mesas/TraerMesasDisponibles', \mesasApi::class . ':mesasdisponibles')
  ->add(\MWparaAutentificar::class . ':VerificarMozo');
$app->get('/Mesas/StatsMesas', \mesasApi::class . ':traermesasusadas')
  ->add(\MWparaAutentificar::class . ':VerificarAdmin');
$app->get('/Mesas/TotalFacturadoXmesa', \mesasApi::class . ':totalmesasfacturadas')
  ->add(\MWparaAutentificar::class . ':VerificarAdmin');
$app->get('/Empleados/TotalXsector', \adminApi::class . ':TotXSector')
  ->add(\MWparaAutentificar::class . ':VerificarAdmin');
$app->get('/Empleados/OperacionesXempleado', \userApi::class . ':statsOpEmpleados')
  ->add(\MWparaAutentificar::class . ':VerificarAdmin');
$app->get('/Mesas/Max&MinFacturas', \mesasApi::class . ':statsFacturas')
  ->add(\MWparaAutentificar::class . ':VerificarAdmin');
$app->get('/Empleados/TraerLogins', \userApi::class . ':traerlogins')
 ->add(\MWparaAutentificar::class . ':VerificarAdmin');
$app->get('/Mesas/TotalMensual', \mesasApi::class . ':totalMensual')
 ->add(\MWparaAutentificar::class . ':VerificarAdmin');
//Encuesta
$app->post('/Encuesta/AltaEncuesta', \encuestasApi::class . ':AltaEncu')
  ->add(\MWparaAutentificar::class . ':VerificarUsuario');
$app->post('/Encuesta/EncuestaPendiente', \encuestasApi::class . ':AltaEncuPendiente')
  ->add(\MWparaAutentificar::class . ':VerificarUsuario');
$app->get('/Encuesta/BuscarEncuestaPendiente/{userid}', \encuestasApi::class . ':BuscarEncuestaPendiente')
  ->add(\MWparaAutentificar::class . ':VerificarUsuario');
$app->get('/Encuesta/TraerBuenosComentarios', \encuestasApi::class . ':TraerComentariosBuenos')
  ->add(\MWparaAutentificar::class . ':VerificarAdmin');
  $app->get('/Encuesta/TraerMalosComentarios', \encuestasApi::class . ':TraerComentariosMalos')
  ->add(\MWparaAutentificar::class . ':VerificarAdmin');

$app->post('/Administrador/AltaEmpleados', \adminApi::class . ':NewEmployee')
->add(\MWparaAutentificar::class . ':VerificarAdmin');
$app->get('/Administrador/TraerEmpleados',\adminApi::class . ':TraerAll')
->add(\MWparaAutentificar::class . ':VerificarAdmin');
$app->post('/Administrador/SuspEmpleado',\adminApi::class . ':SuspenderEmp')
->add(\MWparaAutentificar::class . ':VerificarAdmin');
$app->post('/Administrador/ReincEmpleado',\adminApi::class . ':ReincorporarEmp')
->add(\MWparaAutentificar::class . ':VerificarAdmin');
$app->post('/Administrador/EliminarEmpleado',\adminApi::class . ':EliminarEmp')
->add(\MWparaAutentificar::class . ':VerificarAdmin');



$app->run();
