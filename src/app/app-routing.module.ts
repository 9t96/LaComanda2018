import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import {LoginComponent} from './componentes/login/login.component';
import { AdminComponent } from './componentes/admin/admin.component';
import { EmpleadoComponent } from './componentes/empleado/empleado.component';
import { UsuarioComponent } from './componentes/usuario/usuario.component';
import { RegistrarComponent } from './componentes/registrar/registrar.component';
import { AuthAdminService } from './servicios/auth-admin.service';
import { AuthUserService } from './servicios/auth-user.service';
import { AuthEmpleadoService } from './servicios/auth-empleado.service';
import { SinLogearAuthService } from './servicios/sin-logear-auth.service';
import { ErrorComponent } from './componentes/error/error.component';
import { EmpListComponent } from './componentes/admin/emp-list/emp-list.component';
import { AuthWardService } from './servicios/auth-ward.service';
import { AuthService } from './servicios/auth.service';
import { MesasComponent } from './componentes/admin/mesas/mesas.component';
import { MozoComponent } from './componentes/empleado/mozo/mozo.component';
import { EmpProductoresComponent } from './componentes/empleado/emp-productores/emp-productores.component';
import { AuthmozoService } from './servicios/authmozo.service';
import { AuthproductorService } from './servicios/authproductor.service';
import { ComandaComponent } from './componentes/empleado/mozo/comanda/comanda.component';
import { ListadopedidosComponent } from './componentes/empleado/listadopedidos/listadopedidos.component';
import { BuscarpedidoComponent } from './componentes/usuario/buscarpedido/buscarpedido.component';
import { EstadisticasComponent } from './componentes/admin/estadisticas/estadisticas.component';
import { StatsEmpleadosComponent } from './componentes/admin/estadisticas/stats-empleados/stats-empleados.component';
import { StatsPedidosComponent } from './componentes/admin/estadisticas/stats-pedidos/stats-pedidos.component';
import { StatsMesasComponent } from './componentes/admin/estadisticas/stats-mesas/stats-mesas.component';
import { EncuestaComponent } from './componentes/usuario/encuesta/encuesta.component';
import { ComentariosComponent } from './componentes/admin/comentarios/comentarios.component';


const routes: Routes = [ {path: '' , redirectTo: '/login', pathMatch: 'full'},
{path: '#' , component: ErrorComponent},
{path: 'error' , component: ErrorComponent},
{path: 'login' , component: LoginComponent, canActivate: [SinLogearAuthService]},
{path: 'registrar' , component: RegistrarComponent, canActivate: [SinLogearAuthService]},
{path: 'Admin' , component: AdminComponent , canActivate: [AuthWardService, AuthAdminService],
    children: [
      {path: 'ListEmpleados', component: EmpListComponent , canActivate: [AuthWardService, AuthAdminService]},
      {path: 'Pedidos', component: ListadopedidosComponent , canActivate: [AuthWardService, AuthAdminService]},
      {path: 'Mesas', component: MesasComponent , canActivate: [AuthWardService, AuthAdminService]},
      {path: 'Estadisticas', component: EstadisticasComponent , canActivate: [AuthWardService, AuthAdminService],
        children: [
          {path: 'Empleados', component: StatsEmpleadosComponent , canActivate: [AuthWardService, AuthAdminService]},
          {path: 'Platos', component: StatsPedidosComponent , canActivate: [AuthWardService, AuthAdminService]},
          {path: 'Mesas', component: StatsMesasComponent , canActivate: [AuthWardService, AuthAdminService]},
          {path: 'Comentarios', component: ComentariosComponent , canActivate: [AuthWardService, AuthAdminService]}]
      }
    ]},
{path: 'Empleado' , component: EmpleadoComponent, canActivate: [AuthWardService, AuthEmpleadoService],
    children: [
      {path: 'Mozo', component: MozoComponent , canActivate: [AuthWardService, AuthmozoService], children: [
        {path: 'NuevaComanda', component: ComandaComponent , canActivate: [AuthWardService, AuthmozoService]},
        {path: 'Mesas', component: MesasComponent , canActivate: [AuthWardService, AuthmozoService]},
      ]},
      {path: 'PedidosLive', component: ListadopedidosComponent , canActivate: [AuthWardService, AuthEmpleadoService]},
    ]},
{path: 'Cliente' , component: UsuarioComponent, canActivate: [AuthWardService, AuthUserService],
  children: [
  {path: 'BuscarPedido', component: BuscarpedidoComponent , canActivate: [AuthWardService, AuthUserService]},
  {path: 'Encuesta', component:  EncuestaComponent, canActivate: [AuthWardService, AuthUserService]}
  ]},

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule],
  providers: [ AuthAdminService, AuthEmpleadoService, AuthUserService, SinLogearAuthService, AuthWardService,
     AuthService, AuthmozoService, AuthproductorService]
})
export class AppRoutingModule { }
