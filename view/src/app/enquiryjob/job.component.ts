import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-job',
  templateUrl: './job.component.html',
  styleUrls: ['./job.component.css']
})
export class JobComponent implements OnInit {

  constructor() { }

  ngOnInit() {
  }


  public courses=[
      {'name':'--Select Courses--' },
      {'name':'C' },
      {'name':'C++' },
      {'name':'JAVA' },
      {'name':'PHP' },
      {'name':'ANGULAR' },
      {'name':'TALLY' },
      {'name':'DCA' },
  ];

}
