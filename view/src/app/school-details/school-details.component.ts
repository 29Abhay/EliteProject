import { Component, OnInit, Injectable } from '@angular/core';



declare var $:any;
@Injectable()
@Component({
  selector: 'app-school-details',
  templateUrl: './school-details.component.html',
  styleUrls: ['./school-details.component.css']
})
export class SchoolDetailsComponent implements OnInit {
  uncheck=false;
  eigth=false;
  ninth=false;
  tenth=false;
  eleventhcomm=false;
  eleventhmaths=false;
  eleventhbio=false;
  twelfthcomm=false;
  twelfthmaths=false;
  twelfthbio=false;
  
  term:any;
  constructor() {
  }

  classfunction(){
    this.dofalse();
    switch(this.term)
    {
      case "8":this.eigth=true;break;
      case "9":this.ninth=true;break;
      case "10":this.tenth=true;break;
      case "11maths":this.eleventhmaths=true;break;
      case "11commerce":this.eleventhcomm=true;break;
      case "11bio":this.eleventhbio=true;break;
      case "12maths":this.twelfthmaths=true;break;
      case "12commerce":this.twelfthcomm=true;break;
      case "12bio":this.twelfthbio=true;break;
      default:this.dofalse();
    }
  }
  dofalse()
  {
    this.eigth=false;
    this. ninth=false;
    this.tenth=false;
    this.eleventhcomm=false;
    this.eleventhmaths=false;
    this. eleventhbio=false;
    this.twelfthbio=false;
    this.twelfthcomm=false;
    this.twelfthmaths=false;
  }
  

  ngOnInit() {

  }
}

