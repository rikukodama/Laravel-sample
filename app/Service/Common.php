<?php

namespace App\Services;

use Illuminate\Pagination\Paginator;

class Common
{
    public function paginate($searchColumnArray = [])
    {
        // Implement your paginate logic here
        // This is just a placeholder, you'll need to add your actual implementation
        return Paginator::make([], 1, 10);
    }
}
