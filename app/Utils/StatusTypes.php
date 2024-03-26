<?php

namespace App\Utils;

use App\Utils\GetTypes;

enum StatusTypes : string
{
    use GetTypes;

    case DELETED = 'deleted';
    case NOT_DELETED = 'not_deleted';
}
