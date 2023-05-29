<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum TaskStatus : string
{
    use EnumToArray;
    case OPEN = 'open';
    case IN_PROGRESS = 'in_progress';
    case ON_HOLD = 'on_hold';
    case CLOSED = 'closed';
    case CANCELLED = 'cancelled';
    case REOPENED = 'reopened';
}
