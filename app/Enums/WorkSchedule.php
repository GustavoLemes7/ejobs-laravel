<?php
namespace App\Enums;

enum WorkSchedule: string
{
    case FULL_TIME = 'integral';   // Integral
    case PART_TIME = 'meio período';   // Meio período
    case FLEXIBLE = 'flexível';     // Flexível
    
}