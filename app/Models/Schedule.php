<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the user that owns the Schedule
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function asessor()
    {
        return $this->belongsTo(User::class, 'asessor_id', 'id');
    }

    /**
     * Get the schema that based the Schedule
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function schema()
    {
        return $this->belongsTo(Schema::class);
    }
}
