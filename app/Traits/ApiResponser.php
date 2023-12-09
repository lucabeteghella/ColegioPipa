<?php

namespace App\Traits;
use Illuminate\Http\Response;

trait ApiResponser {

    /**
     * Return a json success response
     * @param array|string $data
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function successResponse($data = [], $code = Response::HTTP_OK) {
        return response()->json(
            [
                "success" => true,
                "code" => $code,
                "data" => $data
            ],
        $code);
    }

    /**
     * Return a json error response
     * @param string $msg
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorResponse(string|array $msg = "", $code = Response::HTTP_BAD_REQUEST) {
        return response()->json(
            [
                "success" => false,
                "code" => $code,
                "message" => $msg
            ],
        $code);
    }

}
