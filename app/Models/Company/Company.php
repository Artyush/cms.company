<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    const STATUS_ACTIVE = '1';
    const STATUS_INACTIVE = '2';
    const STATUS_DELETED = '0';

    const IMAGES_PATH = '/company';

    protected $table = 'companies';


    protected $fillable = [
        'name',
        'email',
        'logo',
        'URL',
        'show_status'
    ];

}
