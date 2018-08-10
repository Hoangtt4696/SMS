<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'product_type_tbl';

    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'updated_date';

//    protected $fillable = [
//      'name',
//      'picture',
//    ];
}
