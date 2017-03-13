<?php

namespace App\Models;

class Group extends AbstractTable {

    /**
     * Generated
     */

    protected $table = 'Groups';

    protected $fillable = ['Id', 'Name'];


    public function users() {
        return $this->belongsToMany(\App\Models\User::class, 'GroupUsers', 'GroupId', 'UserId');
    }

    public function groupUsers() {
        return $this->hasMany(\App\Models\GroupUser::class, 'GroupId', 'Id');
    }

    public function permissions() {
        return $this->hasMany(\App\Models\Permission::class, 'GroupId', 'Id');
    }


}

