<?php

namespace App\Enums;

enum Role: string
{
    case ADMIN = 'admin';
    case ACCOUNTANT = 'accountant';
    case TAXPAYER = 'taxpayer';
};
