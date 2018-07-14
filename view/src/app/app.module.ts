import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import {MatGridListModule} from '@angular/material/grid-list';
import { AppComponent } from './app.component';
import { StudentregistrationformComponent } from './studentregistrationform/studentregistrationform.component';
import {BrowserAnimationsModule} from '@angular/platform-browser/animations';
import { FlexLayoutModule } from "@angular/flex-layout";
import {MatButtonModule, MatCheckboxModule, MatCardModule, MatFormFieldModule, MatInputModule, MatDatepickerModule, MatNativeDateModule, MatError, MatOptionModule, MatSelectModule, MatAutocomplete, MatAutocompleteModule, MAT_CHECKBOX_CLICK_ACTION, MatRadioModule} from '@angular/material';
import { FormControl, FormsModule, FormControlDirective } from '@angular/forms';
import {MatTableModule} from '@angular/material/table';
import { SearchPipe } from './search.pipe';
import { PaymentComponent } from './payment/payment.component';
import { InstallmentComponent } from './installment/installment.component';
import { OnetimepaymentComponent } from './onetimepayment/onetimepayment.component';
import { RouterModule } from '@angular/Router';
import { routes } from './routerconfig';
import { IdcardComponent } from './idcard/idcard.component';
@NgModule({
  declarations: [
    AppComponent,
    StudentregistrationformComponent,FormControlDirective,SearchPipe,PaymentComponent,
    InstallmentComponent,OnetimepaymentComponent,IdcardComponent
  ],
  imports: [
    BrowserModule,BrowserAnimationsModule,MatCardModule,MatFormFieldModule,MatInputModule,
MatGridListModule,MatDatepickerModule,MatNativeDateModule,MatTableModule,FormsModule,
FlexLayoutModule,MatOptionModule,MatSelectModule,MatCheckboxModule,MatButtonModule,MatAutocompleteModule,
RouterModule.forRoot(routes),MatRadioModule
  ],
  providers: [{provide: MAT_CHECKBOX_CLICK_ACTION, useValue: 'check'}],
  bootstrap: [AppComponent]
})
export class AppModule { }
