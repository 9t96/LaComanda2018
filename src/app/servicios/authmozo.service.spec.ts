import { TestBed } from '@angular/core/testing';

import { AuthmozoService } from './authmozo.service';

describe('AuthmozoService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: AuthmozoService = TestBed.get(AuthmozoService);
    expect(service).toBeTruthy();
  });
});
