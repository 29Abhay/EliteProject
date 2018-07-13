import {Routes} from '@angular/Router';
import { PaymentComponent } from './payment/payment.component';
import { OnetimepaymentComponent } from './onetimepayment/onetimepayment.component';
import { IdcardComponent } from './idcard/idcard.component';
// import { RegistrationFormComponent } from './registration-form/registration-form.component';
import { InstallmentComponent } from './installment/installment.component';
import { StudentregistrationformComponent } from './studentregistrationform/studentregistrationform.component';

export const routes:Routes=[{path:'',component:StudentregistrationformComponent,children:[{
    path:'payment',component:PaymentComponent, children:[{path:'onetime',component:OnetimepaymentComponent},{path:'installment',component:InstallmentComponent}]
}]},
{path:'idcard',component:IdcardComponent}
];
