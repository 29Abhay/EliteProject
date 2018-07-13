import { Component, OnInit } from '@angular/core';
import {style,trigger,transition,animate,state  } from "@angular/animations";
import { callLifecycleHooksChildrenFirst } from '@angular/core/src/view/provider';
@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css'],
  
 animations:[
   
  trigger('menuanimation',[
  state('true',style({ marginLeft:'-300%'})),
  state('false',style({marginLeft:'0%','backgroundColor':'#2196f3','width':'45%'})),
  transition('true=>false',animate('.5s ease-in')),
  transition('false=>true',animate('1s ease-in'))
]),

 trigger('settinganimation',[
   state('true',style({ 'display':'none','opacity':'0'})),
   state('false',style({'display':'inline',transform:'translateX(2px)','opacity':'1'})),
   transition('true=>false',animate('.5s ease-in')),
   transition('false=>true',animate('.5s ease-in')),

]),
trigger('settingIconAnimation',[
  state('true',style({})),
  state('false',style({transform:'rotate(45deg)'})),
  transition('true=>false',animate('.3s ease-in')),
  transition('false=>true',animate('.3s ease-in'))
]),

 trigger('settingsmallanimation',[
   state('true',style({'display':'none'})),
   state('false',style({'display':'inline'})),
  transition('true=>false',animate('.3s ease-in')),
   transition('false=>true',animate('.3s ease-in'))
]),



]

})
export class HomeComponent{
 
  menustate:string='true';
  menuIconState:string='true';
  public menutoggle()
{
  this.menustate=(this.menustate==='true')?'false':'true';
  this.settingsmallstate='true';
  this.settingstate='true';
 }
 settingstate:string='true';
 public settingtoggle()
 {
 this.settingstate=(this.settingstate==='true')?'false':'true';
this.settingsmallstate='true';
this.menuIconState = this.menuIconState==="true"?"false":"true";

}

 settingsmallstate:string='true';
 public settingsmalltoggle()
 {
 this.settingsmallstate=(this.settingsmallstate==='true')?'false':'true';
 this.settingstate='true';
 
}
}
