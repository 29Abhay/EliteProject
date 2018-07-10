import { Component, OnInit, Testability } from '@angular/core';
import { checkAndUpdateBinding } from '@angular/core/src/view/util';
import { AsyncAction } from 'rxjs/internal/scheduler/AsyncAction';

declare var $:any;
@Component({
  selector: 'app-registration-form',
  templateUrl: './registration-form.component.html',
  styleUrls: ['./registration-form.component.css']
})
export class RegistrationFormComponent implements OnInit {
   val:any;
   public a=[];
   public upper:any;
   public isVisible='false';
   public localUrl:any;
   public selected:string;
   public jsonIndex:number;
   public studentSelected='';
   public students=[{fname:'shubham',lname:'mankar',mobile:'643895813',email:'abc@gmail.com',address:'agrhjhr  hrhgfgrbhg irfhq rg r',gender:'male',course:'java',inst_name:'gyfgriufg',class:'6sem'},
{fname:'shubham',lname:'singh',mobile:'643895813',email:'abc@gmail.com',address:'agrhjhr  hrhgfgrbhg irfhq rg r',gender:'male',course:'java',inst_name:'gyfgriufg',class:'6sem'},
{fname:'Dipesh',lname:'birla',mobile:'643895813',email:'abc@gmail.com',address:'agrhjhr  hrhgfgrbhg irfhq rg r',gender:'male',course:'java',inst_name:'gyfgriufg',class:'6sem'},
{fname:'rbgfrfj',lname:'giyefh',mobile:'643895813',email:'abc@gmail.com',address:'agrhjhr  hrhgfgrbhg irfhq rg r',gender:'male',course:'java',inst_name:'gyfgriufg',class:'6sem'},
{fname:'fgjve  ',lname:'ejkfjope',mobile:'643895813',email:'abc@gmail.com',address:'agrhjhr  hrhgfgrbhg irfhq rg r',gender:'male',course:'java',inst_name:'gyfgriufg',class:'6sem'},
{fname:'shfvfm',lname:'jfjjf',mobile:'643895813',email:'abc@gmail.com',address:'agrhjhr  hrhgfgrbhg irfhq rg r',gender:'male',course:'java',inst_name:'gyfgriufg',class:'6sem'}
];
  constructor() { }
    
  
  public  visible() {  
    this.isVisible='true';
  }
  
  getValue = (item : string) =>{
    this.studentSelected=item; 
    this.isVisible='false';
    var i=null;
      for(i=0;i<this.students.length;i++){
        if(this.students[i].fname===this.studentSelected){
         this.jsonIndex=i;
        alert(i)
      
          break;
        }
     
    }
    this.upper={bottom:'30px',color:'#2196F3','font-size':'15px',transitionDuration:'0.3s','border-bottom-color':'#2196F3'};
    
  }
   
showPreviewImage(event: any) {
  if (event.target.files && event.target.files[0]) {
      var reader = new FileReader();
      reader.onload = (event: any) => {
          this.localUrl = event.target.result;
      }
      reader.readAsDataURL(event.target.files[0]);
  }
} 



  
  ngOnInit() {
    this.studentSelected=null;
  
    var loadFile = function(event) {
      var output = $('#output');
      alert("hello")
      output.src = URL.createObjectURL(event.target.files[0]);
    };


    $("up").click(function(){
      $('#file').show();
  $(document).ready(function(){
        var filename = $('#image_file').val();
        alert(filename)
        $("#up").html(filename);
    });
});​
  
    function imagepreview(input){
      alert("hello")
      if(input.files && input.files[0]){
     var filerd=new FileReader();
     
       filerd.onload=function(e){
      //   $('#imgpreview').attr('src',e.target.result);
       };
       filerd.readAsDataURL(input.files[0]);
    }
    }
    
  
   // this.isVisible='false';
  
    $('#form input:text, textarea').each(function() {
      if($(this).val()==$(this).attr('value'))
    
      alert($(this.val()))
          $(this).val(" ");
  });
    $.getJSON(this, function (data) {
      $.each(data.response.venue.this.students.groups, function (index, value) {
          $.each(this.items, function () {
              alert(this.text);
          });
      });
  });

    $("#checkfeevariable").hide();
    var aadharvalidation;
     $("#paybtn").click(function(){
      var mobileno=$("#registration_mobno").val();
      var regex_mob=/^[6789]\d{9}$/;
      
      if(!(regex_mob.test(mobileno)))
      alert("Invalid Mobile Number")

      aadharvalidation= $("#registration_aadharcard").val();
    var regex=/^\d{4}\s\d{4}\s\d{4}$/;
   if(!regex.test(aadharvalidation))
   {
    alert('INVALID AADHAR NUMBER!!!!');
   }
  })
  $("#feecheckbox").change(function(){
    var a=$("#registration_course").val();
    this.selectedCourse=$("#registration_course").val();
    alert(this.selectedCourse)
    if(!(a==''))
    {
      $("#checkfeevariable").show(); 
    $("#feecheckbox").prop("checked",true);
     $("#selectedcoursename").text(a);
  
     $("#maindiv").css("height","800px");
        }
    else{
      $("#feecheckbox").prop("checked",false);
      $("#checkfeevariable").hide();  
    }
  })
}
  

  value()
  {
   this.val="dipeshbirla";
  }

}


