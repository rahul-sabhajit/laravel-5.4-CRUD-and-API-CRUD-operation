<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>
## laravel-5.4-Simple-CRUD-and-API-CRUD-operation

### Setup
1. Simply download the project and run following command.

 *. composer dump-autoload -o
 
 *. composer update --no-scripts
 
2. Import databae (you will get DB in database folder)
 
3. How to run api

 open postman and run following command
 
 i- get employee details
 * http://localhost/laravel5.4/public/api/getEmpdetails
 
 ii- get particular employee details- parameter(id)
  * http://localhost/laravel5.4/public/api/getEmpdetails/1
   1 is id.
  
 iii- submit employee details- parameter(emp_name, empphoto)
  * http://localhost/laravel5.4/public/api/postEmpdetails
  
 iv- update particular employee details- parameter(id, emp_name, empphoto )
  * http://localhost/laravel5.4/public/api/updateEmpdetails/1
  1 is id.

 iv- update particular employee details- parameter(id)
  * http://localhost/laravel5.4/public/api/deleteEmpdetails/1
  1 is id.
  
  ## Enjoy thank you


## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
"# git-version-controll-command" 
