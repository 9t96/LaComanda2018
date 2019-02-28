import { Injectable } from '@angular/core';

import { CanActivate, Router, RouterStateSnapshot, ActivatedRouteSnapshot } from '@angular/router';
import { AuthService } from './auth.service';

@Injectable({
  providedIn: 'root'
})
export class AuthEmpleadoService implements CanActivate {

  token = null;
  user;

  constructor( private router: Router, private auth: AuthService ) {
    console.log('el tipo es', auth.getTipo());
  }

  canActivate(route: ActivatedRouteSnapshot, state: RouterStateSnapshot): boolean | Promise<boolean> {

        if ( this.auth.getTipo() === 2) {
          return true;
        } else {
          this.router.navigate(['/error']);
          return false;
        }
  }
}
