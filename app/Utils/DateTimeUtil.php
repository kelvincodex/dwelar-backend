<?php

namespace App\Utils;

use Carbon\Carbon;

class DateTimeUtil
{
  public function convertTimestamp($timestamp, $format="j F Y"){
        return Carbon::createFromTimestamp($timestamp)->format($format);
  }
}
