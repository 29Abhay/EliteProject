import { Directive, Input, ElementRef, OnInit } from "@angular/core";

@Directive ({
    selector :'[containerHeadingBackgroundStyle]'
})

export class ContainerHeadingBackgroundStyle implements OnInit{

    @Input() inpTxt:string;
    constructor(public ele:ElementRef) { }

    ngOnInit() {
        this.ele.nativeElement.style.background="#2196f3";
        this.ele.nativeElement.style.padding="10px";
        this.ele.nativeElement.style.color="white";
        this.ele.nativeElement.style.borderRadius='5px';
        this.ele.nativeElement.style.boxShadow='0px 4px 22px darkgrey';
        this.ele.nativeElement.style.textAlign='center';
    }
  }



