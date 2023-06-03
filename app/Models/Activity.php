<?php

namespace App\Models;

use Spatie\Activitylog\Models\Activity as SpatieActivity;
use Xetaio\Mentions\Models\Traits\HasMentionsTrait;

class Activity extends SpatieActivity
{
    use HasMentionsTrait;

}
