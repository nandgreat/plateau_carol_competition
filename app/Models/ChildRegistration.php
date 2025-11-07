<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'unique_code',
        'fullname',
        'organization',
        'age',
        'gender',
        'parent_email',
        'child_image_path',
        'qr_code_path',
        'birth_certificate_path',
        'parent_name',
        'parent_phone',
        'stage',
        'lga',
        'interest_area',
    ];
}
