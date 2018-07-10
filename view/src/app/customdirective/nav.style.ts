import { Directive, Input, ElementRef, OnInit } from "@angular/core";

@Directive ({
    selector :'[navStyle]'
})

export class NavStyle implements OnInit{

    @Input() inpTxt:string;
    constructor(public ele:ElementRef) { }

    ngOnInit() {
        this.ele.nativeElement.style.width="100%";
        this.ele.nativeElement.style.color="white";
        this.ele.nativeElement.style.boxShadow="0px 0px 30px gray";
        this.ele.nativeElement.style.background="#2196f3";
        this.ele.nativeElement.style.height="60px";        
    }
  }
