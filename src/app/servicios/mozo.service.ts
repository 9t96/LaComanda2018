import { Injectable } from '@angular/core';
import { HttpserviceService } from './httpservice.service';

@Injectable({
  providedIn: 'root'
})
export class MozoService {
  
  //url: string = 'https://xgameprocom2.000webhostapp.com/Api/Rest';
 // url: string = 'https://claudiomanza.000webhostapp.com/Api/Rest';
  //url: String = 'http://localhost/Api/Rest';
  url: string = 'http://localhost:3000';

  constructor(public http: HttpserviceService) { }

  NuevosPedidos(pedido) {
    return  this.http.postHttp(this.url + '/pedidos/NuevoPedido' , pedido);
  }

  guardarPedVendido(pedidos) {
    return  this.http.postHttp(this.url + '/pedidos/sumarvendidos' , pedidos);
  }

  TraerMesasLive() {
    return this.http.getHttp(this.url + '/mesas/TraerMesas');
  }

  TraerMesasDisponibles() {
    return this.http.getHttp(this.url + '/mesas/traermesasdisponibles');
  }
}
 