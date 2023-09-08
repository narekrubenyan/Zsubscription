<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\PostService;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

    /**
     * postService
     *
     * @var mixed
     */
    private $postService;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        PostService $postService
    ) {
        $this->postService = $postService;
    }

    public function create(PostRequest $request)
    {
        $data = $request->validated();

        $this->postService->create($data);

        dd($data);

    }
}
