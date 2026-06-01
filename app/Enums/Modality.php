<?php
namespace App\Enums;

enum Modality: string{

    case REMOTE = 'Remoto';
    case PRESENTIAL = 'Presencial';
    case HYBRID = 'Híbrido';
}