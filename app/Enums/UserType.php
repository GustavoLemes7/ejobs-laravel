<?php
namespace App\Enums;

enum UserType: string
{
    case Candidate = 'CANDIDATE';
    case Company = 'COMPANY';
    case Adm = 'ADM';
}