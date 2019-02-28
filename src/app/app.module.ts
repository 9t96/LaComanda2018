import { BrowserModule } from '@angular/platform-browser';
import {BrowserAnimationsModule} from '@angular/platform-browser/animations';
import { NgModule } from '@angular/core';
import { AppComponent } from './app.component';

// componentes
import { LoginComponent } from './componentes/login/login.component';
import { PrincipalComponent } from './componentes/principal/principal.component';
import { EmpleadoComponent } from './componentes/empleado/empleado.component';
import { UsuarioComponent } from './componentes/usuario/usuario.component';
import { AdminComponent } from './componentes/admin/admin.component';
import { RegistrarComponent } from './componentes/registrar/registrar.component';
import { ErrorComponent } from './componentes/error/error.component';
import { EmpListComponent } from './componentes/admin/emp-list/emp-list.component';
import { ComandaComponent } from './componentes/empleado/mozo/comanda/comanda.component';
import { MesasComponent } from './componentes/admin/mesas/mesas.component';
import { MozoComponent } from './componentes/empleado/mozo/mozo.component';
import { EmpProductoresComponent } from './componentes/empleado/emp-productores/emp-productores.component';
import { ListadopedidosComponent } from './componentes/empleado/listadopedidos/listadopedidos.component';
import { EncuestaComponent } from './componentes/usuario/encuesta/encuesta.component';
import { EstadisticasComponent } from './componentes/admin/estadisticas/estadisticas.component';
import { StatsEmpleadosComponent } from './componentes/admin/estadisticas/stats-empleados/stats-empleados.component';
import { StatsPedidosComponent } from './componentes/admin/estadisticas/stats-pedidos/stats-pedidos.component';
import { StatsMesasComponent } from './componentes/admin/estadisticas/stats-mesas/stats-mesas.component';
import { BuscarpedidoComponent } from './componentes/usuario/buscarpedido/buscarpedido.component';
// modulos
import { AppRoutingModule } from './app-routing.module';
import {FormsModule, FormControl, ReactiveFormsModule} from '@angular/forms';
import {HttpClient, HttpClientModule, HTTP_INTERCEPTORS} from '@angular/common/http';

// complementos
import {MaterialAndPrime} from './materialandprime';
import {NgbModule} from '@ng-bootstrap/ng-bootstrap';
import { ChartsModule } from 'ng2-charts';
// servicios
import {UsuariosService} from './servicios/usuarios.service';
import {HttpserviceService} from './servicios/httpservice.service';
import { AuthAdminService } from './servicios/auth-admin.service';
import { AuthEmpleadoService } from './servicios/auth-empleado.service';
import { AuthUserService } from './servicios/auth-user.service';
import { SinLogearAuthService } from './servicios/sin-logear-auth.service';
import { AuthService } from './servicios/auth.service';
import { AuthWardService } from './servicios/auth-ward.service';

// Directivas
import { ConfirmPasswordDirective } from './directivas/confirm-password.directive';
import { JWTInterceptor } from './servicios/Interceptors/JWTInterceptor';
// pipes
import { EstadoPipe } from './pipes/estado.pipe';
import { RolPipe } from './pipes/rol.pipe';
import { InverserolPipe } from './pipes/inverserol.pipe';
import { CodprodToNamePipe } from './pipes/codprod-to-name.pipe';
import { TestPipePipe } from './pipes/test-pipe.pipe';
import { EstadoPedidoPipe } from './pipes/estado-pedido.pipe';
import { EstadoMesaPipe } from './pipes/estado-mesa.pipe';
import { PrecioProductoPipe } from './pipes/precio-producto.pipe';
import { DemoraPedidoPipe } from './pipes/demora-pedido.pipe';
import { ComentariosComponent } from './componentes/admin/comentarios/comentarios.component';










@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    PrincipalComponent,
    EmpleadoComponent,
    UsuarioComponent,
    AdminComponent,
    RegistrarComponent,
    ConfirmPasswordDirective,
    ErrorComponent,
    EmpListComponent,
    EstadoPipe,
    RolPipe,
    InverserolPipe,
    MesasComponent,
    MozoComponent,
    EmpProductoresComponent,
    ComandaComponent,
    CodprodToNamePipe,
    TestPipePipe,
    ListadopedidosComponent,
    EstadoPedidoPipe,
    BuscarpedidoComponent,
    EstadoMesaPipe,
    EncuestaComponent,
    EstadisticasComponent,
    StatsEmpleadosComponent,
    StatsPedidosComponent,
    StatsMesasComponent,
    PrecioProductoPipe,
    DemoraPedidoPipe,
    ComentariosComponent




  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    MaterialAndPrime,
    FormsModule,
    HttpClientModule,
    ReactiveFormsModule,
    BrowserAnimationsModule,
    ChartsModule,
    NgbModule,
    


  ],
  exports: [MaterialAndPrime],
  providers: [HttpserviceService, UsuariosService, AuthAdminService, AuthEmpleadoService,
    AuthUserService, SinLogearAuthService, AuthService, AuthWardService,     {
      provide : HTTP_INTERCEPTORS,
      useClass: JWTInterceptor,
      multi : true
    }],
  bootstrap: [AppComponent]
})
export class AppModule { }
