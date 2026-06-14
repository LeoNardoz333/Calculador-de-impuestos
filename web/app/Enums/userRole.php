<?php

namespace App\Enums;

enum UserRole: string
{
    case ADMIN = 'admin';
    case ACCOUNTANT = 'accountant';
    case TAXPAYER = 'taxpayer';
};
