<?php

namespace App\Utils\constant;

enum UserStatusUtil: string
{
    case SUSPENDED = "suspended";
    case ACTIVE = "active";
    case INACTIVE = "inActive";
    case PENDING = "pending";
}
