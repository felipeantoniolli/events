<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    protected $table = 'events';
    protected $primaryKey = 'id_event';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_event',
        'id_user',
        'name',
        'start_date',
        'description',
        'end_date',
        'address',
        'tickets',
        'start_time'
    ];

    public static function rules()
    {
        return [
            'rules' => [
                'id_user' => 'required',
                'name' => 'required|min:2|max:100',
                'description' => 'required|min:5|max:100',
                'start_date' => 'required',
                'end_date' => 'required',
                'address' => 'required|min:2|max:100',
                'tickets' => 'required'
            ],
            'messages' => self::messages()
        ];
    }

    public static function messages()
    {
        return [
            'required' => 'Campo obrigatório',
            'min' => 'Campo inválido',
            'max' => 'Campo inválido'
        ];
    }
}
