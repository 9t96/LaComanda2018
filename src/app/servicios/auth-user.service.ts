import { Injectable } from '@angular/core';
import { Router, ActivatedRouteSnapshot, RouterStateSnapshot, CanActivate } from '@angular/router';
import { AuthService } from './auth.service';

@Injectable({
  providedIn: 'root'
})
export class AuthUserService implements CanActivate{

  token = null;
  user;

  constructor( private router: Router, private auth: AuthService ) {
    console.log('el tipo es', auth.getTipo());
  }

  canActivate(route: ActivatedRouteSnapshot, state: RouterStateSnapshot): boolean | Promise<boolean> {

        if ( this.auth.getTipo() ===  1) {
          return true;
        }
        else {
          this.router.navigate(['/error']);
          return false;
        }
  }
}
