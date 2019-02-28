import { Injectable } from '@angular/core';
import { AuthService } from './auth.service';
import { CanActivate, Router, ActivatedRouteSnapshot, RouterStateSnapshot } from '@angular/router';

@Injectable({
  providedIn: 'root'
})
export class AuthproductorService implements CanActivate {


  token = null;
  user;

  constructor( private router: Router, private auth: AuthService ) {
    console.log('el rol es', auth.getRol());
  }

  canActivate(route: ActivatedRouteSnapshot, state: RouterStateSnapshot): boolean | Promise<boolean> {

        if ( this.auth.getRol() !== 10 && this.auth.getRol() !== 4 && this.auth.getRol() !== 9 ) {
          return true;
        } else {
          this.router.navigate(['/error']);
          return false;
        }
  }
}
