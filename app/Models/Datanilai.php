<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;

class Datanilai extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guarded = ['id'];
}
