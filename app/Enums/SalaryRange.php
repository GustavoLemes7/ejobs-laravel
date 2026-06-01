<?php
namespace App\Enums;

enum SalaryRange: string
{
    case UP_TO_1500 = 'UP_TO_1500';
    case FROM_1500_TO_3000 = '1500_3000';
    case FROM_3000_TO_6000 = '3000_6000';
    case ABOVE_6000 = 'ABOVE_6000';
    case NEGOTIABLE = 'NEGOTIABLE';
}