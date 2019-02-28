import { TestBed } from '@angular/core/testing';

import { AuthEmpleadoService } from './auth-empleado.service';

describe('AuthEmpleadoService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: AuthEmpleadoService = TestBed.get(AuthEmpleadoService);
    expect(service).toBeTruthy();
  });
});
