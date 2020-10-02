import { HttpClient } from '@angular/common/http';
import { Component, Input, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, FormControl, Validators } from '@angular/forms';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit {
  getUrl: string = 'http://localhost/get.php';
  postUrl: string = 'http://localhost/post.php';

  array = [];
  reactiveForm = new FormGroup({
    name: new FormControl()
  });

  constructor(private httpClient: HttpClient, private formBuilder: FormBuilder) { }

  ngOnInit() {
    this.getMethod();
  }

  postMethod() {
    let myFormData = new FormData();
    myFormData.append('name', this.reactiveForm.value.name);

    return this.httpClient.post(this.postUrl, myFormData,
      { responseType: 'text' }).subscribe(
        (response) => this.array.push(response),
        (error) => console.log(error)
      );
  }

  getMethod() {
    this.httpClient.get(this.getUrl).subscribe(data => {
      this.array.push(data);
    }, error => console.error(error));
  };

  onSubmit() {
    this.postMethod();
    alert('Bienvenue à bord' + this.reactiveForm.value.name);
  };
}
