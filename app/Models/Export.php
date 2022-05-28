<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Export
 *
 * @property int $id
 * @property int $file_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Export newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Export newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Export query()
 * @method static \Illuminate\Database\Eloquent\Builder|Export whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Export whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Export whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Export whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Export extends Model
{
    use HasFactory;
}
