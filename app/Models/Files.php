<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * App\Models\Files
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $path
 * @property int $uploaded
 * @property int $processed
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $failed
 * @property string|null $failure_reason
 * @property-read User|null $user
 * @method static Builder|Files newModelQuery()
 * @method static Builder|Files newQuery()
 * @method static Builder|Files query()
 * @method static Builder|Files whereCreatedAt($value)
 * @method static Builder|Files whereFailed($value)
 * @method static Builder|Files whereFailureReason($value)
 * @method static Builder|Files whereId($value)
 * @method static Builder|Files wherePath($value)
 * @method static Builder|Files whereProcessed($value)
 * @method static Builder|Files whereTitle($value)
 * @method static Builder|Files whereUpdatedAt($value)
 * @method static Builder|Files whereUploaded($value)
 * @method static Builder|Files whereUserId($value)
 * @mixin Eloquent
 * @property int $requested_for_export
 * @property int|null $export_html_result
 * @property int $approved
 * @property float|null $grade
 * @method static Builder|Files whereApproved($value)
 * @method static Builder|Files whereExportHtmlResult($value)
 * @method static Builder|Files whereGrade($value)
 * @method static Builder|Files whereRequestedForExport($value)
 */
class Files extends Model
{
    use HasFactory;

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
