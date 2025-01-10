<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'user_id']; // Adicione 'title' e 'description' aqui
    public $timestamps = true; // Isso é padrão e pode ser omitido
}
