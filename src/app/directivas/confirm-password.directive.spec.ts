import { ConfirmPasswordDirective } from './confirm-password.directive';
import {Validator} from '@angular/forms';
import {Directive} from '@angular/core';

@Directive({
  selector: '[appConfirmPass]'
})

export class ConfirmPasswordDirective implements Validator {

}

describe('ConfirmPasswordDirective', () => {
  it('should create an instance', () => {
    const directive = new ConfirmPasswordDirective();
    expect(directive).toBeTruthy();
  });
});
