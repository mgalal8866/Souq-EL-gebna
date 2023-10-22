<?php

namespace App\Enums;

enum OrderStatusEnum: string
{
    case New       = '1'; //جديد
    case Process   = '2'; //جارى التوصيل
    case Delivered = '3'; //تم التوصيل
    case Rejected  = '4'; //رفض الاستلام
}
