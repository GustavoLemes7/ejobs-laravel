<?php

namespace App\Enums;

enum Status:string {

    case DRAFT = 'draft';
    case OPEN = 'open';
    case PAUSED = 'paused';
    case CLOSED = 'closed';
    case FILLED = 'filled';
    case CANCELLED = 'cancelled';
    case EXPIRED = 'expired';
    case ARQUIVED = 'arquived';
    

}