<?php

namespace App\Models\Penumpang;

use App\Models\Travel\Travel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penumpang extends Model
{
    use HasFactory;

    protected $table = 'penumpang';

    protected $guarded = ['id'];

    public $timestamps = true; 

    public function travel()
    {
        return $this->belongsTo(Travel::class);
    }
}
