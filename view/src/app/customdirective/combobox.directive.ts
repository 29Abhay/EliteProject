import {Directive,ElementRef, OnInit} from '@angular/core';

declare var $:any;
@Directive({ 
   selector:'[comboBox]'
})

export class ComboBoxDirective implements OnInit{

    constructor(ele:ElementRef){
       ele.nativeElement.style.borderTop= 'none';
       ele.nativeElement.style.borderRight= 'none';
       ele.nativeElement.style.borderLeft= 'none';
       ele.nativeElement.style.outline='none';
       ele.nativeElement.style.fontSize= '16px';
       ele.nativeElement.style.backgroundColor= 'white';
       ele.nativeElement.style.width= '50%';
       ele.nativeElement.style.borderBottom='2px solid darkgray';
    }
ngOnInit(){
    $(document).ready(function(){
    var selectvar;
   
$("select").focusin(function(){
    selectvar=$(this).attr('id');
    console.log(selectvar);
    $("#"+selectvar).css('border-bottom-color','#2196F3');
})

$("select").focusout(function(){
    $("#"+selectvar).css('border-bottom-color','darkgray');  
})
})
}
}