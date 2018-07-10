import { Directive, Input, ElementRef, OnInit } from "@angular/core";

@Directive ({
    selector :'[containerStyle]'
})

export class ContainerStyle implements OnInit{

    @Input() inpTxt:string;
    constructor(public ele:ElementRef) { }

    ngOnInit() {
        this.ele.nativeElement.style.width="90%";
      
       
        this.ele.nativeElement.style.textAlign="center";
        this.ele.nativeElement.style.padding="15px";
        this.ele.nativeElement.style.backgroundColor="white";
        this.ele.nativeElement.style.margin="auto";
        this.ele.nativeElement.style.boxShadow="0px 0px 10px rgba(0,0,0,0.2)";
    }
  }
  
