import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'testPipe'
})
export class TestPipePipe implements PipeTransform {

  wich;

  transform(cod_prod: number): string {

        switch (cod_prod) {
          case 101:
            this.wich = 'Cerveza rubia';
            break;
          default:
            break;
        }

        return this.wich;
  }


}
