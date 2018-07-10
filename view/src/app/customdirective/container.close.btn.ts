import { Directive, Input, ElementRef, OnInit } from "@angular/core";

declare var $:any;
@Directive ({
    selector :'[closeButton]'
})

export class ContainerCloseButton implements OnInit{

    @Input() inpTxt:string;
    constructor(public ele:ElementRef) { }

    ngOnInit() {
        this.ele.nativeElement.style.width="20%";
        this.ele.nativeElement.style.textTransform="uppercase";
        this.ele.nativeElement.style.padding="10px";
        this.ele.nativeElement.style.color="white";
        this.ele.nativeElement.style.cursor="pointer";
        this.ele.nativeElement.style.boxShadow="0px 3px 10px rgba(0,0,0,0.5)";
        this.ele.nativeElement.style.border="none";
        this.ele.nativeElement.style.border="3px";
        this.ele.nativeElement.style.fontSize="15px";
        this.ele.nativeElement.style.outline="none";     
        this.ele.nativeElement.style.background=" #ef5350";
        
        $(document).ready(function(){
            $(".closeButton").mouseover(function(){
                $(this).css({background:"#e57373",transitionProperty:"background",transitionDuration:"0.3s"})
            })
            $(".closeButton").mouseleave(function(){
                $(this).css({background:"#ef5350",transitionProperty:"background",transitionDuration:"0.3s"})
            })
        });
    }
  }
  