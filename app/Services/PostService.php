<?php

namespace App\Services;

use App\Models\Post;
use App\Mail\SendNewPostEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

/**
 * Class PostService
 * @package App\Services
 */
class PostService
{

    public function create ($data)
    {
        DB::beginTransaction();

        // $email = new SendNewPostEmail($data['title'],$data['description']);
        // Mail::to('narek.rubenyan@gmail.com')->send($email);

        $post = Post::create($data);

        DB::commit();

        return $post;
    }

}
