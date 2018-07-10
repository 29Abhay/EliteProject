import {Directive,ElementRef} from '@angular/core';

@Directive({
    selector:'[labelField]'
})
 
export class LabelFieldDirective{
    constructor(ele:ElementRef){
        ele.nativeElement.style.fontSize='18px';
        ele.nativeElement.style.color='gray';
        ele.nativeElement.style.position= 'relative';
        ele.nativeElement.style.bottom='1px';
        ele.nativeElement.style .display= 'block';
        ele.nativeElement.style.height='0px';
          
    }
}