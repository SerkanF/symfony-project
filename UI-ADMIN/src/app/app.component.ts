import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent implements OnInit {

  constructor(
    private _http : HttpClient
  ) {

  }

  ngOnInit(): void {
    
    let self = this;

    self._http.get("http://symfony-project.com/api/users").subscribe(users => {
      console.log(users);
    });

  }

  title = 'angularSymfony';
}
