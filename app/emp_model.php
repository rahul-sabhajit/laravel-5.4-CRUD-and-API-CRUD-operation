<?php

namespace App;

use Illuminate\Database\Eloquent\model;
class emp_model extends model
{

	protected $table='table_emp';
	public $timestamp= false;
	protected $primary_key= 'id';
}


 ?>