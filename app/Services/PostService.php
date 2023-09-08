<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

/**
 * Class PostService
 * @package App\Services
 */
class PostService
{

    public function create ($data)
    {
        DB::beginTransaction();

        

        DB::commit();
    }

}
