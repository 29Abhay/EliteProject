import { Component} from '@angular/core';

@Component({
    selector: 'app-assign',
    templateUrl: './assign.component.html',
     styleUrls: ['./assign.component.css']
  })

  export class AssignComponent {
    FName:string;
    LName:string;
    MobileNo:number;
    Batch:string='';
    batchId:string='';
   

    public students:any=[
        {'FName':'Raj','LName':'Verma','MobileNo':'00000000','Courses':'C'},
        {'FName':'Arjun','LName':'Gupta','MobileNo':'1111111','Courses':'C++'},
        {'FName':'Ranbir','LName':'Kapoor','MobileNo':'2222222','Courses':'JAVA'},
        {'FName':'Rishi','LName':'Sharma','MobileNo':'3333333','Courses':'C#'},
        {'FName':'Moin','LName':'Khan','MobileNo':'44444444','Courses':'Angular'},
        {'FName':'Jay','LName':'Pal','MobileNo':'5555555','Courses':'Kotlin'}];
      
        selectChangeHandler (event:any){
            this.Batch=event.target.value;
        }

       setResult(FName:string,LName:string,MobileNo:number,){
           this.FName = FName;
           this.LName = LName;
           this.MobileNo = MobileNo;
           this.batchId = this.Batch;
       }



  }