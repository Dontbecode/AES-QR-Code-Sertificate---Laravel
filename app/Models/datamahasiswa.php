<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
class datamahasiswa extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guarded = ['id'];
}
