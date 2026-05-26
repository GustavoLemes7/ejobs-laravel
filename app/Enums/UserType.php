<?php
namespace App\Enums;

enum UserType: string
{
    case CANDIDATE = 'candidate';
    case COMPANY = 'company';
    case ADM = 'adm';
}