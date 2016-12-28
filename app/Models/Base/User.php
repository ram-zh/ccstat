<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

class User extends AbstractTable {

    /**
     * Generated
     */

    protected $table = 'Users';

    protected $fillable = ['Id', 'LDAPLogin', 'Email', 'Password', 'RememberToken', 'Enabled', 'LastName', 'FirstName', 'Patronymic', 'Phone', 'ResetToken', 'ResetTokenCreatedAt'];


    public function groups() {
        return $this->belongsToMany(\App\Models\Base\Group::class, 'GroupUsers', 'UserId', 'GroupId');
    }

    public function groupUsers() {
        return $this->hasMany(\App\Models\Base\GroupUser::class, 'UserId', 'Id');
    }

    public function permissions() {
        return $this->hasMany(\App\Models\Base\Permission::class, 'UserId', 'Id');
    }


}

