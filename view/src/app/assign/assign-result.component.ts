import { Component,Input} from '@angular/core';

@Component({
    selector: 'app-assign-result',
    templateUrl: './assign-result.component.html',
     styleUrls: ['./assign-result.component.css']
  })

  export class AssignResultComponent {
      
    @Input() fname:string;
    @Input() lname:string;
    @Input() mobileNo:number;
    @Input() batch:string;

}