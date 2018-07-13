import { Component, OnInit } from '@angular/core';
import * as $ from 'jquery';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
   public container:any;
   public usericon:any;
   public login:any;
   public input:any;
   public forgotpass:any;
   public loginbtn:any;
   public showpass:any;
   public name:any;
   public pass:any;
  public title:any;
  public show_home:any;
  public input_name='';
  public input_pass='';
  public check:string;
   public constructor() 
   {

    
  }

  ngOnInit() {
     
             

    $(document).ready(function()
    {
      
 
       // Checking for blank fields and if blank highlight it
     $("#loginbtn").click(function()
     {
      var name = $("#name").val();
      var password = $("#pass").val(); 
      if( name =='')
      {
      $('input[type="text"]').css("border-bottom","2px solid red");
      $("#name-required").html("<i>*required</i>"); }
      if(password =='')
      {
      $('input[type="password"]').css("border-bottom","2px solid red");
      $("#pass-required").html("<i>*required</i>");
      $("#showpass").css("margin-top","-18%");
      
      }
      
        
         });


         //show and hide password
        $("#showpass").click(function()
        {
            if($("#pass").attr("type") === "password"){
              $("#pass").attr("type","text");
              $("#show-hide-icon").attr("class","far fa-eye-slash");
            }else{
              $("#pass").attr("type","password");
              $("#show-hide-icon").attr("class","far fa-eye");
            }
        });

        //hover effect on login button
        $("#loginbtn").mouseenter(function(){
          $(this).css("background-color","#228B22");

        });
        $("#loginbtn").mouseleave(function(){
          $(this).css("background-color","#006400");

        });

        //hover effect on forgot password
        $("#forgotpass").mouseenter(function(){
          $(this).css("font-size","104%");

        });
        $("#forgotpass").mouseleave(function(){
          $(this).css("font-size","102%");

        });
    
    });
  }
  

          validate()
          {
            if(this.input_name===''|| this.input_pass===''){
              this.check="";
                     }
          
                     else{
                      
                      this.check="home";
                     }
          }
      
       
}