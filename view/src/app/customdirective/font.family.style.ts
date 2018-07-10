import { Directive, Input, ElementRef, OnInit } from "@angular/core";

@Directive ({
    selector :'[fontFamilyStyle]'
})

export class FontFamilyStyle implements OnInit{

    @Input() inpTxt:string;
    constructor(public ele:ElementRef) { }

    ngOnInit() {
        this.ele.nativeElement.style.fontFamily="'Raleway', sans-serif";
    }
  }
 