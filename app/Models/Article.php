<?php

namespace App\Models;

use App\Traits\PublishmentTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory, PublishmentTrait;
}
