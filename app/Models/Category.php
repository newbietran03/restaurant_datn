<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'lang',
        'ten',
        'thuTu',
        'anHien'
    ];
    public function setTenAttribute($value)
    {
        $this->attributes['ten'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

}
