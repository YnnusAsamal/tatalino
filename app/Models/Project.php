<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'projectId', 'projectName', 'projectDetails', 'projectPrice', 'user_id', 'projectStatus',
    ];
}
