import { Directive, Input, ElementRef, OnInit } from "@angular/core";

@Directive ({
    selector :'[ngDivStyle]'
})

export class NgDivStyle implements OnInit{

    @Input() inpTxt:string;
    constructor(public ele:ElementRef) { }

    ngOnInit() {
        this.ele.nativeElement.style.padding="10px";     
    }
  }
