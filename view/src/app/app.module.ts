import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';
import { RegistrationFormComponent } from './registration-form/registration-form.component';
import { InputFieldDirective } from './newcustomDirectives/designDirective/InputFieldDirective/inputfield.directive';
import { LabelFieldDirective } from './newcustomDirectives/designDirective/InputFieldDirective/label.directive';
import { ComboBoxDirective } from './newcustomDirectives/designDirective/comboBox/combobox.directive';
import { ContainerHeadingBackgroundStyle } from './newcustomDirectives/containerHeadingBackground/container.heading.background';
import { ContainerStyle } from './newcustomDirectives/containerStyle/container.style.directive';
import { ContainerSubmitButton } from './newcustomDirectives/containerSubmitBtn/container.submit.btn';
import { ContainerHeadingStyle } from './newcustomDirectives/containerHeading/container.heading.directive';
import { PaymentComponent } from './payment/payment.component';
import { OnetimepaymentComponent } from './onetimepayment/onetimepayment.component';
import { RouterModule } from '@angular/Router';
import { routes } from './routerconfig';
import { ContainerSuccessButton } from './newcustomDirectives/containerSuccessBtn/container.success.btn';
import { FontFamilyStyle } from './newcustomDirectives/fontFamily/font.family.style';
import { IdcardComponent } from './idcard/idcard.component';
import {BrowserAnimationsModule} from '@angular/platform-browser/animations';
import {MatDatepickerModule, MatDatepickerToggle, MatDatepickerInput, MatDatepicker} from '@angular/material/datepicker';
import { MatFormFieldModule, MatSuffix } from '@angular/material/form-field';
// import { MatNativeDateModule } from '@angular/material/core';
import {MatButtonModule, MatCheckboxModule, MatOptionModule, MatSelectModule, MatInputModule, MatNativeDateModule} from '@angular/material';

import{Ng2SearchPipeModule} from 'ng2-search-filter';
import { FormsModule } from '@angular/forms';
import { InstallmentComponent } from './installment/installment.component';

@NgModule({
  declarations: [
    AppComponent,
    RegistrationFormComponent,
    InputFieldDirective,
    LabelFieldDirective,
    ContainerHeadingBackgroundStyle,
    ContainerStyle,
    ContainerSubmitButton,
    ComboBoxDirective,
    ContainerHeadingStyle,
    PaymentComponent,
    OnetimepaymentComponent,ContainerSuccessButton,
    FontFamilyStyle,
    IdcardComponent,
   InstallmentComponent
   

  ],
  imports: [
    BrowserModule,RouterModule.forRoot(routes),
    BrowserAnimationsModule,Ng2SearchPipeModule,FormsModule,
    MatDatepickerModule,MatFormFieldModule,MatNativeDateModule,MatInputModule
    
  ],
  providers: [MatDatepickerToggle,MatDatepickerInput,MatDatepicker],
  bootstrap: [AppComponent]
})
export class AppModule { }
