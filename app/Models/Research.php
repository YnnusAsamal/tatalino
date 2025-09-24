<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use App\Models\Research;

class Research extends Model
{
    use HasFactory, Searchable;

    const SEARCHABLE_FIELDS = [
        'researchTitle',
        'researchDescription',
        'author',
        'researchStatus',
        'department',
        'meta_title',
        'meta_keywords',
        'meta_description'
    ];


    protected $table ='research';

    protected $fillable =[
        'user_id',
        'researchTitle',
        'researchDescription',
        'author',
        'file',
        'researchStatus',
        'department',
        'approved_at',
        'remarks',
        'meta_title',
        'meta_keywords',
        'meta_description'
    ];

    public function toSearchableArray()
    {
        return[
        'researchTitle' =>$this->researchTitle,
        'researchDescription'=>$this->researchDescription,
        'author'=>$this->author,
        'department'=>$this->department,
        'researchStatus'=>$this->researchStatus,
        'remarks'=>$this->remarks,
        'meta_title'=>$this->meta_title,
        'meta_keywords'=>$this->meta_keywords,
        'meta_description'=>$this->meta_description,
        ];
    }

}
