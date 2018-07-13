import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { StudentregistrationformComponent } from './studentregistrationform.component';

describe('StudentregistrationformComponent', () => {
  let component: StudentregistrationformComponent;
  let fixture: ComponentFixture<StudentregistrationformComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ StudentregistrationformComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(StudentregistrationformComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
