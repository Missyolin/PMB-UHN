<?php

/*
 * This file is part of the IndoRegion package.
 *
 * (c) Azis Hapidin <azishapidin.com | azishapidin@gmail.com>
 *
 */

namespace App\Models;

use AzisHapidin\IndoRegion\Traits\ProvinceTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Province Model.
 */
class Province extends Model
{
    use ProvinceTrait;
    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'provinces';
    public $incrementing = false;
    protected $keyType = 'char';

    protected $fillable = ['id', 'name'];
    
    public function regencies()
    {
        return $this->hasMany(Regency::class, 'province_id', 'id');
    }
}
