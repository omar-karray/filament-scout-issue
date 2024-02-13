<?php

namespace App\Models;

use Database\Factories\SynthetiserFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Synthetiser extends Model
{
    use Searchable;
    use HasFactory;


     /**
     * Get the name of the index associated with the model.
     */
    public function searchableAs(): string
    {
        return 'synths_index';
    }


    /**
     * Get the indexable data array for the model.
     *
     * @return array<string, mixed>
     */
    public function toSearchableArray(): array
    {
        $array =  [
            'id' => (int) $this->id,
            'name' => $this->name,
            'description' => $this->description
                ];
 
        // Customize the data array...
 
        return $array;
    }

    protected static function newFactory(): Factory
{
    return SynthetiserFactory::new();
}
}
