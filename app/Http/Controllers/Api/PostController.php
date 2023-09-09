<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\PostService;
use App\Services\ResponseService;
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
     * response
     *
     * @var ResponseService
     */
    private $response;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        PostService $postService,
        ResponseService $response
    ) {
        $this->postService = $postService;
        $this->response = $response;
    }

    public function create(PostRequest $request)
    {
        try {
            $data = $request->validated();

            $post = $this->postService->create($data);

            return $this->response->success(['Post' => $post], 'Post created Successfully');

        }  catch (\Throwable $e) {
            return $this->response->badRequest([], $e->getMessage());
        }

        dd($data);

    }
}
