<?php

namespace App\Models\Api;

use App\Models\Reivew;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticateContract;

use Laravel\Passport\HasApiTokens;

class Customer extends Model implements AuthenticateContract
{
    use HasFactory, HasApiTokens, Authenticatable;

    public $timestamps = false;

    protected $fillable=['name','email','password'];

    public function review(){
        return $this->hasOne(Reivew::class);
    }
}
