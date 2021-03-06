<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoleUser extends Model
{
    use SoftDeletes;

    protected $table = 'role_user';

    protected $attributes = ['role_id' => 1];

    protected $fillable = ['user_id', 'role_id'];

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
