<?php

namespace App;

enum DishOrderEnum: string
{
    case Newest = "1";
    case Oldest = "2";
    case MostViewed = "3";
    case MostLiked = "4";
    case Alphabetical = "5";
}
