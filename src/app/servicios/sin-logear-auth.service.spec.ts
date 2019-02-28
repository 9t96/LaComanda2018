import { TestBed } from '@angular/core/testing';

import { SinLogearAuthService } from './sin-logear-auth.service';

describe('SinLogearAuthService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: SinLogearAuthService = TestBed.get(SinLogearAuthService);
    expect(service).toBeTruthy();
  });
});
