<?php

namespace App\Models;

class GroupUser extends AbstractTable {

    /**
     * Generated
     */

    protected $table = 'GroupUsers';

    protected $fillable = ['Id', 'UserId', 'GroupId'];


    public function group() {
        return $this->belongsTo(\App\Models\Group::class, 'GroupId', 'Id');
    }

    public function user() {
        return $this->belongsTo(\App\Models\User::class, 'UserId', 'Id');
    }


}

