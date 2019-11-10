<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'users';
    protected $primaryKey = 'id_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user',
        'username',
        'name',
        'email',
        'password',
        'name',
        'birth',
        'cpf',
        'type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function rules()
    {
        return [
            'rules' => [
                'username' => 'required|min:3|max:20|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'name' => 'required|min:2|max:255',
                'birth' => 'required|date',
                'cpf' => 'required|min:11|max:11'
            ],
            'messages' => self::messages()
        ];
    }

    public static function messages()
    {
        return [
            'required' => 'Campo obrigatório',
            'min' => 'Campo inválido',
            'max' => 'Campo inválido',
            'username.unique' => 'Este usuário já está em uso',
            'email' => 'Email inválido',
            'email.unique' => 'Este email já está em uso',
            'cpf.unique' => 'Este cpf já está em uso'
        ];
    }
}
