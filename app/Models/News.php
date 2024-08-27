<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class News extends Model
{
    use HasFactory;

    protected $table = 'news'; // Assuming the table name is 'news'

    protected $fillable = [
        'lang',
        'tieuDe',
        'tomTat',
        'slug',
        'urlHinh',
        'noiDung',
        'xem',
        'idLT',
        'id_user',
        'anHien',
        'tags'
    ];
    
    public function setTieuDeAttribute($value)
    {
        $this->attributes['tieuDe'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
    /**
     * Get the category that owns the news.
     */
    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }
}
