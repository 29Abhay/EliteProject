import { Directive, Input, ElementRef, OnInit } from "@angular/core";

declare var $:any;
@Directive ({
    selector :'[resetButton]'
})

export class ContainerResetButton implements OnInit{

    @Input() inpTxt:string;
    constructor(public ele:ElementRef) { }

    ngOnInit() {
        this.ele.nativeElement.style.width="20%";
        this.ele.nativeElement.style.textTransform="uppercase";
        this.ele.nativeElement.style.padding="10px";
        this.ele.nativeElement.style.color=" #aa66cc";
        this.ele.nativeElement.style.cursor="pointer";
        this.ele.nativeElement.style.boxShadow="0px 3px 10px rgba(0,0,0,0.5)";
        this.ele.nativeElement.style.border="none";
        this.ele.nativeElement.style.border="solid 2px #aa66cc";
        this.ele.nativeElement.style.fontSize="15px";
        this.ele.nativeElement.style.outline="none";     
        this.ele.nativeElement.style.borderRadius="3px";
        this.ele.nativeElement.style.background="white";

        $(document).ready(function(){
            $(".resetButton").mouseover(function(){
                $(this).css({background:"#2196f3",color:"white",transitionProperty:"background",transitionDuration:"0.3s"})
            })
            $(".resetButton").mouseleave(function(){
                $(this).css({background:"white",color:"#aa66cc",transitionProperty:"background",transitionDuration:"0.3s"})
            })
        });
    }
  }
 