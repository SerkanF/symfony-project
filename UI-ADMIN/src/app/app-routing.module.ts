import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { LoginComponent } from './login/login.component';
import { UserComponent } from './user/user.component';


const routes: Routes = [
  {
    path: '', // Default
    component : LoginComponent
  },
  {
    path: 'login.do', // Default
    component : LoginComponent
  },
  {
    path: 'user.do', // Default
    component : UserComponent
  },
  {
    path      : '**',
    redirectTo: 'login.do'
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
