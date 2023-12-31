<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use DB;
use Illuminate\Contracts\Auth\MustVerifyEmail;
class User extends Authenticatable 
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded= [];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getpermissionGroups(){

        $permission_groups = DB::table('permissions')->select('guard_name')->groupBy('guard_name')->get();
        return $permission_groups;
    } // End Method 

    public static function getpermissionByGroupName($guard_name){
        $permissions = DB::table('permissions')
                        ->select('name','id')
                        ->where('guard_name',$guard_name)
                        ->get();
        return $permissions;
    }// End Method 

    public static function roleHasPermissions($role,$permissions){

        $hasPermission = true;
        foreach($permissions as $permission){
            if (!$role->hasPermissionTo($permission->name)) {
                $hasPermission = false;
                return $hasPermission;
            }
            return $hasPermission;
        } 

    }// End Method 

    public function product()
    {
        return $this->hasMany(Product::class, 'vendor_id');
    }
    public function order()
    {
        return $this->hasMany(Order::class, 'id');
    }
    public function orderItem()
    {
        return $this->hasMany(Product::class, 'id');
    }
}
