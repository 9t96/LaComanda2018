import { Injectable } from '@angular/core';
import {HttpserviceService} from './httpservice.service';
@Injectable({
  providedIn: 'root'
})
export class UsuariosService {
  url: string = 'http://localhost:3000';
  //url: string = 'https://claudiomanza.000webhostapp.com/Api/Rest';
  //url: String = 'http://localhost/Api/Rest';

  constructor(public http: HttpserviceService ) { }

   InciarSesion(usuario): any {
    return this.http.postHttp(this.url + '/publico/logear', usuario);
  }
  AltaUsuarios(usuario): any{
    return  this.http.postHttp(this.url + '/publico/Registro' , usuario);
  }

  loginParaSeguimiento(emp): any {
    return this.http.postHttp( this.url + '/publico/Seguimiento', emp);
  }

  CerrarSeguimiento(emp): any {
    return this.http.postHttp( this.url + '/publico/CerrarSeguimientoDiario', emp);
  }

  guardarEncuesta(encuesta)
  {
    return this.http.postHttp( this.url + '/encuesta/AltaEncuesta', encuesta);
  }

  agregarEncuestaPendiente(userImesa)
  {
    return this.http.postHttp( this.url + '/encuesta/EncuestaPendiente', userImesa);
  }

  BuscarEncuestasPendientes(userID)
  {
    return this.http.getHttp( this.url + '/encuesta/BuscarEncuestaPendiente/' + userID);
  }
}
