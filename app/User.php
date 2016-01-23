<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    //use UserACL, UserRelationships;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_useracct';
    protected $primaryKey = 'userID';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['userID', 'empID','username','password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    public function getAuthPassword()
    {
        return $this->Pwd;
    }

    public function getAuthIdentifier(){
        return $this->userID;
    }

    // public function isEmployee() {
    //     $roles = $this->roles->toArray();
    //     return !empty(roles);
    // }

    // public function hasRole($check) {
    //     return in_array($check, array_fetch($this->roles->toArray(), 'name'));
    // }

    // private function getIdInArray($array, $term) {
    //     foreach ($array as $key => $value) {
    //         if ($value == $term) {
    //             return $key;
    //         }
    //     }

    //     throw new UnexpectedValueException;  
    // }

    // public function makeEmployee($title) {
    //     $assigned_roles = array();

    //     $roles = array_fetch(Role::all()->toArray(), 'name');

    //     switch ($title) {
    //         case 'super_admin':
    //             $assigned_roles[] = $this->getIdInArray($roles, 'add_employee');
    //             $assigned_roles[] = $this->getIdInArray($roles, 'create_po');
    //         case 'bookkeeper':
    //             $assigned_roles[] = $this->getIdInArray($roles, 'edit_employee')
    //             break;
    //         default:
    //             throw new Exception ("Erro");
    //     }
    //     $this->roles()->attach($assigned_roles);
    // }

    //--------------------------------------------------------------
    public function role() {
        return $this->hasOne('App\Role', 'id', 'roleID');
    }

    public function hasRole($roles) {
        $this->have_role = $this->getUserRole();

        if(is_array($roles)) {
            foreach ($roles as $need_role) {
               if($this->checkIfUserHasRole($need_role)) {
                    return true;
               }
            }
        }else {
            return $this->checkIfUserHasRole($roles);
        }
        return false;
    }

    private function getUserRole() {
        return $this->role()->getResults();
    }

    private function checkIfUserHasRole($need_role) {
        return (strtolower($need_role)==strtolower($this->have_role->name)) ? true : false;
    } 
}

