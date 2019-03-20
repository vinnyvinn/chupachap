<?php

namespace App;

use App\Permission;
use App\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $table = 'users';
	
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
   
     public function roles(){
        return $this->belongsTo(Role::class,'role_id');
    }
     public function permissions() {
        return $this->belongsTo(Permission::class, 'permission_id');
  
     }
	
}
