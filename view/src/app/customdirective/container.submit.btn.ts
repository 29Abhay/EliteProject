import { Directive, Input, ElementRef, OnInit } from "@angular/core";

declare var $:any;
@Directive ({
    selector :'[submitButton]'
})

export class ContainerSubmitButton implements OnInit{

    @Input() inpTxt:string;
    constructor(public ele:ElementRef) { }

    ngOnInit() {
        this.ele.nativeElement.style.width="20%";
        this.ele.nativeElement.style.textTransform="uppercase";
        this.ele.nativeElement.style.padding="10px";
        this.ele.nativeElement.style.color=" white";
        this.ele.nativeElement.style.cursor="pointer";
        this.ele.nativeElement.style.boxShadow="0px 2px 11px rgba(0,0,0,0.5)";
        this.ele.nativeElement.style.border="none";
        this.ele.nativeElement.style.border="solid 2px #2196f3";
        this.ele.nativeElement.style.borderRadius="3px";
        this.ele.nativeElement.style.background="#2196f3";
        this.ele.nativeElement.style.outline="none";     
        
        $(document).ready(function(){
                $(".submitButton").mouseover(function(){
                    $(this).css({background:"rgb(33, 140, 243)",transitionProperty:"background",transitionDuration:"0.3s",boxShadow:"0px 2px 15px rgba(0,0,0,0.5)"})
                })
                $(".submitButton").mouseleave(function(){
                    $(this).css({background:"#2196f3",transitionProperty:"background",transitionDuration:"0.3s",boxShadow:"0px 2px 11px rgba(0,0,0,0.5)"})
                })
        });
    }
  }
