<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class LandingPage extends Model
{
    public function landing_page_products()
    {
        return $this->hasMany(LandingPageProduct::class);
    }
}