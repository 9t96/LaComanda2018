import { Injectable } from '@angular/core';
import {HttpserviceService} from './httpservice.service';
import { Observable } from 'rxjs';
import { map } from 'rxjs/operators';
import { UserData } from '../componentes/admin/emp-list/emp-list.component';
import { RequestOptions } from '@angular/http';

@Injectable({
  providedIn: 'root'
})
export class AdminService {
//url: string = 'https://claudiomanza.000webhostapp.com/Api/Rest';
 // url: string = 'https://xgameprocom2.000webhostapp.com/Api/Rest';
  //url: String = 'http://localhost/Api/Rest';
  url: string = 'http://localhost:3000';
  constructor(public http: HttpserviceService) { }

  AltaEmpleados(usuario): any {

    return  this.http.postHttp(this.url + '/admin/altaempleados', usuario);
  }

  public traerEmpleados<T>(): Observable<T> {

    return this.http.GetObservable<T>(this.url + '/admin/traerempleados');

  }

  public traerLogins<T>(): Observable<T> {

    return this.http.GetObservable<T>(this.url + '/Empleados/TraerLogins');

  }

  public SuspenderEmp(objeto): any {
    return this.http.postHttp(this.url + '/admin/suspempleado', objeto );
  }

  public ReincorporarEmp(objeto): any {
    return this.http.postHttp(this.url + '/admin/reincorporaremp', objeto );
  }

  public BajaLogica(objeto): any {
    return this.http.postHttp(this.url + '/admin/eliminarempleado', objeto );
  }

  public cambiarComiendo(objeto): any{
    return this.http.postHttp(this.url + '/mesas/mesaComiendo', objeto );
  }

  public cambiarPagando(objeto): any{
    return this.http.postHttp(this.url + '/mesas/mesaPagando', objeto );
  }

  public cambiarCerrada(objeto): any{
    return this.http.postHttp(this.url + '/mesas/mesaCerrada', objeto );
  }

  public mesaslive(): any
  {
    return this.http.getHttp(this.url + '/mesas/TraerMesasLive');
  }

  public statsplatos(): any{
    return this.http.getHttp(this.url + '/pedidos/statsplatos');
  }

  public statsmesas(): any{
    return this.http.getHttp(this.url + '/mesas/statsmesas');
  }

  public totalMesas(): any{
    return this.http.getHttp(this.url + '/mesas/totalfacturadoxmesa');
    
  }
  
  public totalPorSector(): any{
    return this.http.getHttp(this.url + '/admin/totalxsector');
  }
  
  public StatsEmployee(): any{
    return this.http.getHttp(this.url + '/admin/operacionesxempleado');
  }
  public FacturasMaxYmin(): any{
    return this.http.getHttp(this.url + '/mesas/max&minfacturas');
  }

  public totalMensual(): any{
    return this.http.getHttp(this.url + '/Mesas/TotalMensual');
  }
  public BuenosComentarios(): any{
    return this.http.getHttp(this.url + '/Encuesta/TraerBuenosComentarios');
  }

  public MalosComentarios(): any{
    return this.http.getHttp(this.url + '/Encuesta/TraerMalosComentarios');
  }
}
