<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public array $response = [];

    public function __construct()
    {
        $this->response['message'] = '';
        $this->response['data'] = [];
        $this->response['success'] = true;
    }

    /**
     * @param $data
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendResponse($data = [], $statusCode = 200): \Illuminate\Http\JsonResponse
    {
        return response()->json($this->response, $statusCode);
    }
}
