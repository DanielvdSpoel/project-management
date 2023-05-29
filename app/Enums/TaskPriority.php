<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum TaskPriority: string
{
    use EnumToArray;
    case HIGH = 'high';
    CASE NORMAL = 'normal';
    case LOW = 'low';
    case NONE = 'none';


}
