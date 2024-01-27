<?php
namespace App\Enums;

enum PropertyTypeEnum :string {
    case SINGLE = 'single-family home';
    case TOWNHOUSE = 'townhouse';
    case MULTIFAMILY = 'multi-family home';
    case BUNGALOW = 'bungalow';
}
