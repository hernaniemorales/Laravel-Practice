<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    //mass assignment protection off.
    protected $guarded = [];

    public function customers(){
        //A Company has many customers.
        return $this->hasMany(Customer::class);
    }


}
