import { Injectable } from '@angular/core';
import { Router, RouterState, RouterStateSnapshot, ActivatedRouteSnapshot, CanActivate } from '@angular/router';
import { AuthService } from './auth.service';

@Injectable({
  providedIn: 'root'
})
export class AuthmozoService implements CanActivate {

  token = null;
  user;

  constructor( private router: Router, private auth: AuthService ) {
    console.log('el rol es', auth.getRol());
  }

  canActivate(route: ActivatedRouteSnapshot, state: RouterStateSnapshot): boolean | Promise<boolean> {
        console.log(this.auth.getRol());
        if (this.auth.getRol() === 4) {
          return true;
        } else {
          this.router.navigate(['/error']);
          return false;
        }
  }
}
