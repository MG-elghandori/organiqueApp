<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;
    protected $guarded = [];

  /**
 * Mettre à jour la colonne "compteBank" avec la valeur donnée.
 *
 * @param  float  $value
 * @return void
 */

    public static function updateCompteCIH($value)
    {
        $finance = static::firstOrFail();
        $finance->compteCIH += $value;
        $finance->save();
    }

    public static function updateCompteTIJARI($value)
    {
        $finance = static::firstOrFail();
        $finance->compteTIJARI += $value;
        $finance->save();
    }


    public static function updateArgent($value)
    {
        $finance = static::firstOrFail();
        $finance->argent += $value;
        $finance->save();
    }
}
