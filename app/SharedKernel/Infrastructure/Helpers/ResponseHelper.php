<?php
namespace App\SharedKernel\Infrastructure\Helpers;

class ResponseHelper {

    public static function error($message, $code = 422, $data = []): \Illuminate\Http\JsonResponse
    {
        return response()->json(['success' => false, 'message' => $message, 'data' => $data], $code);
    }

    public static function success($data = []): \Illuminate\Http\JsonResponse
    {
        $res = [
            'success' => true
        ];

        if (!empty($data))
            $res['data'] = $data;
        return response()->json($res);
    }
}