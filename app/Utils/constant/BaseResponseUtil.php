<?php

namespace App\Utils\constant;

enum BaseResponseUtil: string
{
    case SUCCESSFUL = "100";
    case ERROR = "105";
    case FAILED_VALIDATION = "110";
    case SOMETHING_WENT_WRONG = "115";
    case SYSTEM_MALFUNCTION = "120";
    case OTP_EXPIRED = "125";
    case OTP_INVALID = "130";
    case NOT_FOUND = "135";
}

