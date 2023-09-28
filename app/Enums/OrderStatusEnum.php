<?php

namespace App\Enums;

enum OrderStatusEnum:string {
case New       = 'جديد';
case Process   = 'قيد التحضير';
case Delivered = 'تم التوصيل';
case Rejected  = 'رفض الاستلام';
}
