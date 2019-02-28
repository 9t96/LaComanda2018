import { Injectable } from '@angular/core';
import { CanActivate, Router } from '@angular/router';
import {JwtHelperService} from '@auth0/angular-jwt';
import { AuthService } from './auth.service';

@Injectable({
  providedIn: 'root'
})
export class AuthWardService implements CanActivate {

  helper = new JwtHelperService();
  token = null;
  user;

  canActivate() {

    if (this.user !== null && this.auth.isAuthenticated()) {
      return true;
    }
    else{
      this.router.navigate(['/error']);
      return false;
    }
    
  }


  constructor(public auth: AuthService, public router: Router) {
    this.token = localStorage.getItem('token');
    let datos = this.helper.decodeToken(this.token);
    this.user = datos.data;
  }
}
