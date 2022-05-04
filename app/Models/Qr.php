<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Qr extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'users_qr';
    protected $fillable = ['user_id', 'name', 'qr', 'link', 'key'];
    protected $connection = 'mysql';

}
