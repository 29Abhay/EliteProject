import { Component, OnInit } from '@angular/core';
import { MatInput,MatFormField, MatButton,MatCheckbox,MatOption,MatSelect,MatCard,MatDatepicker,MatRadioButton } from '@angular/material';

@Component({
  selector: 'app-enquiry',
  templateUrl: './enquiry.component.html',
  styleUrls: ['./enquiry.component.css']
})
export class EnquiryComponent implements OnInit {
  studentType:string;
  school:string; college:string; job:string;
  constructor() { }

  ngOnInit() {
  }
  assignType(){
    if(this.studentType==="school"){
      this.school = "true";
      this.college = null;this.job = null;
    }else if(this.studentType==="college"){
      this.college = "true";
    }else if(this.studentType==="job"){
      this.job = "true"; 
      this.college = null;this.school = null;
    }
  }
  genders=[
    {value:"Male"},
    {value:"Female"},
  ]
  courses=[
    {value:"Java"},
    {value:"C"},
    {value:"C++"},
    {value:"PhP"}
  ]
  studentTypes=[
    "School",
    "College",
    "Job"
  ]
 

  
}
