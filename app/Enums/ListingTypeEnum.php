<?php
namespace App\Enums;

enum ListingTypeEnum :string {
    case OPEN = 'open listing';
    case SELL = 'sell listing';
    case EXCLUSIVE = 'exclusive listing';
    case NET = 'net listing';
}