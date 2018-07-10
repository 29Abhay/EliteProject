import { Directive, Input, ElementRef, OnInit } from "@angular/core";

@Directive ({
    selector :'[fontSizeStyle]'
})

export class FontSizeStyle implements OnInit{

    @Input() inpTxt:string;
    fontSize:string;
    constructor(public ele:ElementRef) { }

    ngOnInit() {
        switch(this.inpTxt) {
            case "heading" : this.fontSize = "18px";break;
            case "paragraph" : this.fontSize = "15px";break;
            default : this.fontSize = "14px";
        }
        this.ele.nativeElement.style.fontSize=this.fontSize;
    }
  }
 