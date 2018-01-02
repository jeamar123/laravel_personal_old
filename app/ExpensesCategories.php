<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpensesCategories extends Model
{
    //
	protected $table = 'expenses_categories';
  protected $fillable = ['category_name', 'created_at', 'updated_at'];
}
