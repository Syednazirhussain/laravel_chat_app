<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChatMessages extends Model
{
    use SoftDeletes;

    public $table = 'chat_messages';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'friend_id',
        'from_user',
        'to_user',
        'text',
        'status',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'from_user' => 'integer',
        'to_user' => 'integer',
        'friend_id' => 'integer',
        'status' => 'string',
        'text' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'from_user' => 'required',
        'to_user' => 'required',
        'friend_id' => 'required',
        'status' => 'required',
        'text' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'from_user', 'to_user');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function friend()
    {
        return $this->belongsTo(\App\Friend::class, 'friend_id', 'id');
    }


}
