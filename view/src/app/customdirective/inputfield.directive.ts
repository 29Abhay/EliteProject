import {Directive,ElementRef, OnInit} from '@angular/core';

declare var $:any;
@Directive({
    selector:'[inputField]'
})

export class InputFieldDirective implements OnInit{
constructor(public ele:ElementRef)
{
   
   ele.nativeElement.style.borderTop='none';
   ele.nativeElement.style.borderRight= 'none';
   ele.nativeElement.style.borderLeft= 'none';
   ele.nativeElement.style.outline= 'none';
   ele.nativeElement.style.borderBottomColor='darkgray';
   ele.nativeElement.style.fontSize='16px';
 
}
ngOnInit(){

$(document).ready(function(){
  var a;

$("input").focusin(function () {
a=$(this).attr('id');   
$("#"+a+"label").css('bottom','30px')
$("#"+a).css('border-bottom-color','#2196F3')
$("#"+a+"label").css('color','#2196F3')
$("#"+a+"label").css({'font-size':'15px','transition-duration':'0.3s'})
})
$('input').focusout(function(){

  if($("#"+a).val()=='')
  {
 $("#"+a+"label").css('bottom','1px')	
  $("#"+a).css('border-bottom-color','darkgray')
$("#"+a+"label").css('color','gray')
$("#"+a+"label").css('font-size','18px')
}
$("#"+a).css('border-bottom-color','darkgray')
$("#"+a+"label").css('color','gray')

})
})
}
}