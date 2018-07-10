import { Directive, Input, ElementRef, OnInit } from "@angular/core";

@Directive ({
    selector :'[containerHeadingStyle]'
})

export class ContainerHeadingStyle implements OnInit{

    @Input() inpTxt:string;
    constructor(public ele:ElementRef) { }

    ngOnInit() {
        this.ele.nativeElement.style.display="inline";
        this.ele.nativeElement.style.color="white";
        this.ele.nativeElement.style.outline="none";
        this.ele.nativeElement.style.textTransform="uppercase";
        this.ele.nativeElement.style.fontSize='22px';
        
    }
  }