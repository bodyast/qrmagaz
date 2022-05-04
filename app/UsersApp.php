<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersApp extends Model{

    public $timestamps = false;
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'email_verified_at', 'password', 'remember_token'];
    protected $connection = 'mysql';

    public function form() {
        return $this->belongsTo(Form::class);
    }

}
