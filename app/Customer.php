<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    // //Fillable Example
    // protected $fillable = ['name', 'email', 'active'];

    // Guarded Example
    //$guarded and $fillable are two opposite stuff.
    // //below means that all the fields inside the array cannot be mass assigned
    // protected $guarded =['name', 'email', 'active'];

    // below means that there is no guarded fields. "nothing is guarded, disable mass assignment errors"
    protected $guarded =[];

    protected $attributes = [
        'active' => 1
    ];

    public function getActiveAttribute($attribute){
        return $this->activeOptions()[$attribute];
    }

    public function scopeActive($query){
        return $query->where('active', 1);
    }

    public function scopeInactive($query){
        return $query->where('active', 0);
    }

    public function company() {
        return $this->belongsTo(Company::class);
    }
    
    public function activeOptions(){
        return [
            1 => 'Active',
            0 => 'Inactive',
            2 => 'In-Progress'
        ];
    }

}