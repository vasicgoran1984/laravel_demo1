<?php

namespace App\Enums;


enum ServiceName: string
{
    case smallService = 'Mali Servis';
    case bigService = 'Veliki Servis';
    case brakes = 'Kočnice';

    case default = 'Ostalo';
}
