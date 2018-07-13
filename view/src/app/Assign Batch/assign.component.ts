import { Component } from '@angular/core';
import { MatDialog} from '@angular/material';
 import { MyDialogComponent } from '../assign/my-dialog/my-dialog.component';
// import { AssignResultComponent } from './assign-result.component';
  

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
    catch:string;
   
    get(val:string){
        this.catch = val;
    }

    public students:any=[
        {'FName':'Raj','LName':'Verma','MobileNo':'00000000','Courses':'C'},
        {'FName':'Arjun','LName':'Gupta','MobileNo':'1111111','Courses':'C++'},
        {'FName':'Ranbir','LName':'Kapoor','MobileNo':'2222222','Courses':'JAVA'},
        {'FName':'Rishi','LName':'Sharma','MobileNo':'3333333','Courses':'C#'},
        {'FName':'Moin','LName':'Khan','MobileNo':'44444444','Courses':'Angular'},
        {'FName':'Jay','LName':'Pal','MobileNo':'5555555','Courses':'Kotlin'},
        {'FName':'Shubham','LName':'Jain','MobileNo':'666666','Courses':'Python'}];

        public batchs=[
           
            {'name':'C','value':'A' },
            {'name':'C++','value':'C++' },
            {'name':'JAVA','value':'D' },
            {'name':'PHP','value':'E' },
            {'name':'ANGULAR' ,'value':'F'},
            {'name':'TALLY' ,'value':'G'},
            {'name':'DCA' ,'value':'H'},
        ];
      
        selectChangeHandler (event:any){
            this.Batch=event.target.value;
        }

       setResult(FName:string,LName:string,MobileNo:number,){
           this.FName = FName;
           this.LName = LName;
           this.MobileNo = MobileNo;
           this.batchId = this.Batch;
       }
       
       constructor(public dialog: MatDialog) {}


  openDialog(): void {
      
    const dialogRef = this.dialog.open(MyDialogComponent, {
        width: '280px',
        height:'300px',
        data:{
            fname:this.FName,
            lname:this.LName,
            mobileNo:this.MobileNo,
            batch:this.catch,

        }


    });

    dialogRef.afterClosed().subscribe(result => {
      console.log('The dialog was closed');
     
    });
  }


  }
  