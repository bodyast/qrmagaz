<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'product';
    protected $fillable = ['user_id', 'cat_id', 'name', 'description', 'mass', 'price', 'img'];
    protected $connection = 'mysql';

}
