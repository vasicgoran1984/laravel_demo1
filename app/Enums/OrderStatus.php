<?php

namespace App\Enums;


enum OrderStatus: string
{
    case Unpaid = 'unpaid';
    case Paid = 'paid';
    case Shipped = 'shipped';
    case Cancelled = 'cancelled';
    case Completed = 'complete';

    public static function getStatuses()
    {
        return [
            self::Paid, self::Unpaid, self::Shipped, self::Cancelled, self::Completed
        ];
    }
}
