<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

/**
 * Class UserService
 * @package App\Services
 */
class UserService
{
    /**
     * attach
     *
     * @param  mixed $data
     * @return void
     */
    public function attach($data)
    {
        DB::beginTransaction();

        $subscribtion = DB::table('website_subscribtions')->insert([
            'user_id' => $data['user_id'],
            'website_id' => $data['website_id']
        ]);

        DB::commit();

        return $subscribtion;
    }
}
