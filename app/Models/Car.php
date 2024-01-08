<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mail;
use App\Mail\ContactMail;

class Car extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
    'carTitle',
    'description',
    'image',
    'published',
    ];


/**

     * Write code on Method

     *

     * @return response()

     */

    public static function boot() {

  

        parent::boot();

  

        static::created(function ($item) {

                

            $adminEmail = "esraaramada11@gmail.com";

            Mail::to($adminEmail)->send(new ContactMail($item));

        });

    }
}