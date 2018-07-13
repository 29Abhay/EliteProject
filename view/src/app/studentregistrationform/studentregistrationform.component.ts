import { Component, OnInit, OnChanges } from '@angular/core';
import {FormControl, Validators} from '@angular/forms';

import {map, startWith} from 'rxjs/operators';

declare var $:any;


export interface PeriodicElement {
  name: string;
  position: number;
  weight: number;
  symbol: string;
}

const ELEMENT_DATA: PeriodicElement[] = [
  {position: 1, name: 'Hydrogen', weight: 1.0079, symbol: 'H'},
 
];

@Component({
  selector: 'app-studentregistrationform',
  templateUrl: './studentregistrationform.component.html',
  styleUrls: ['./studentregistrationform.component.css']
})


export class StudentregistrationformComponent implements OnInit {

  displayedColumns: string[] = ['position', 'name', 'weight'];
  dataSource = ELEMENT_DATA;  
public localUrl:any;
public isVisible='false';
jsonIndex:number;
public term:any;
public auto={
  fname:'',lname:'',email:'',course:'',mobile:'',address:''
};
showfeetable=false;
public studentSelected='';
public students=[{fname:'shubham',lname:'mankar',mobile:'643895813',email:'abc@gmail.com',address:'agrhjhr  hrhgfgrbhg irfhq rg r',gender:'male',course:'java',inst_name:'gyfgriufg',class:'6sem'},
{fname:'shubham',lname:'singh',mobile:'79587613',email:'abc@gmail.com',address:'agrhjhr  hrhgfgrbhg irfhq rg r',gender:'male',course:'java',inst_name:'gyfgriufg',class:'6sem'},
{fname:'Dipesh',lname:'birla',mobile:'643893',email:'abc@gmail.com',address:'agrhjhr  hrhgfgrbhg irfhq rg r',gender:'male',course:'java',inst_name:'gyfgriufg',class:'6sem'},
{fname:'rbgfrfj',lname:'giyefh',mobile:'6495813',email:'abc@gmail.com',address:'agrhjhr  hrhgfgrbhg irfhq rg r',gender:'male',course:'java',inst_name:'gyfgriufg',class:'6sem'},
{fname:'fgjve  ',lname:'ejkfjope',mobile:'43895813',email:'abc@gmail.com',address:'agrhjhr  hrhgfgrbhg irfhq rg r',gender:'male',course:'java',inst_name:'gyfgriufg',class:'6sem'},
{fname:'shfvfm',lname:'jfjjf',mobile:'3895813',email:'abc@gmail.com',address:'agrhjhr  hrhgfgrbhg irfhq rg r',gender:'male',course:'java',inst_name:'gyfgriufg',class:'6sem'}
];
checkvar='';


ourFile: File;
checked=false;
disabled=true;

constructor(){}
email = new FormControl('', [Validators.required, Validators.email]);

getErrorMessage() {
  return this.email.hasError('required') ? 'You must enter a value' :
      this.email.hasError('email') ? 'Not a valid email' :
          '';
}
visible()
{
  this.isVisible='true';
 
  var j=this.term;
  if(j==='')
  {
    this.isVisible='false';
  }
}
  getValue(item : string){
    this.term='';
    this.isVisible='false'; 
    this.disabled=false;
    for(let i=0;i<this.students.length;i++)
    {
      this.studentSelected=this.term;      
      if(this.students[i].mobile===item)
      {
        this.auto.fname='';
        this.auto.lname=this.students[i].lname;
        this.auto.fname=this.students[i].fname;
        this.term=this.auto.fname;
        this.auto.email=this.students[i].email;
        this.auto.course=this.students[i].course;
        this.auto.mobile=this.students[i].mobile;
        this.auto.address=this.students[i].address;
          break;
      }
      
    }
  }

  showPreviewImage(event:any){
    if(event.target.files && event.target.files[0]){
      var reader =new FileReader();
      reader.onload=(event:any)=>{
        this.localUrl=event.target.result;
      
      }
      reader.readAsDataURL(event.target.files[0]);
    }
  }

  openInput(){ 
    // your can use ElementRef for this later
    document.getElementById("fileInput").click();
  }

  fileChange(files: File[]) {
    if (files.length > 0) {
      this.ourFile = files[0];
    }
  }

  checkfee(){
    if(!(this.checkvar===''))
    {
    this.disabled=false;
    
    }
    else{ 
      this.disabled=true;
    }
  }

  showcoursefeetable()
  {
    this.showfeetable=(this.showfeetable===false)?true:false;
  }

  ngOnInit() {

    $(document).ready(function(){
      $(document).click()
      this.isVisible='false';
    })
  //  $(document).ready(function(){
  //   $("#feetable").hide();
  //   $("#checkbox").click(function(){
  //     var a=$("#coursevar").val();
      // var selectedCourse=$("#registration_course").val();
      // alert(a)
      // if(!(a==''))
      // {
      //   $("#feetable").show(); 
      // $("#checkbox").attr("checked",true);
      //  $("#selectedcoursename").text(a);
    
      //  $("#maindiv").css("height","800px");
  //         }
  //     else{
  //       $("#checkbox").attr("checked",false);
  //       $("#checkfeevariable").hide();  
  //     }
  //   })
  // })
   }

}

