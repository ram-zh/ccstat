<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

class GroupUser extends AbstractTable {

    /**
     * Generated
     */

    protected $table = 'GroupUsers';

    protected $fillable = ['Id', 'UserId', 'GroupId'];


    public function user() {
        return $this->belongsTo(\App\Models\Base\User::class, 'UserId', 'Id');
    }

    public function group() {
        return $this->belongsTo(\App\Models\Base\Group::class, 'GroupId', 'Id');
    }


}

