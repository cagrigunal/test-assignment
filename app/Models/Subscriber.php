<?php

namespace App\Models;

use App\Http\Resources\Field;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'state'];


    public function fields()
    {
        return $this->hasMany(Field::class);
    }
}
