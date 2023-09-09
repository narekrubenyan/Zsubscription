<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttachRequest;
use App\Services\ResponseService;
use App\Services\UserService;

class UserController extends Controller
{
    /**
     * userService
     *
     * @var UserService
     */
    private $userService;

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
        UserService $userService,
        ResponseService $response
    ) {
        $this->userService = $userService;
        $this->response = $response;
    }

    /**
     * attach
     *
     * @param  AttachRequest $request
     * @return JsonResponse
     */
    public function attach(AttachRequest $request) //: JsonResponse
    {
        try {
            $data = $request->validated();

            $subscribtion = $this->userService->attach($data);

            return $this->response->success(['Subscribtion' => $subscribtion], 'User Attached Successfully');
        } catch (\Throwable $e) {
            return $this->response->badRequest([], $e->getMessage());
        }
    }
}
