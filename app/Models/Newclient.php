<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Newclient extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'newclient';
    protected $fillable = ['user_id', 'table_id','ip', 'date'];
    protected $connection = 'mysql';

}
