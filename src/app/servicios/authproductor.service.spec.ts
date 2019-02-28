import { TestBed } from '@angular/core/testing';

import { AuthproductorService } from './authproductor.service';

describe('AuthproductorService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: AuthproductorService = TestBed.get(AuthproductorService);
    expect(service).toBeTruthy();
  });
});
