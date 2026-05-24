<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jurusan;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
        // return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }
}
