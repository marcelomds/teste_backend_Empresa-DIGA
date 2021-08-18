<?php


namespace App\Http\Responses;


use App\Contracts\Exceptions\CustomException;
use Illuminate\Http\JsonResponse;

class ApiResponse
{
    /**
     * @param null $data
     * @param string $message
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    public static function success($data = null, string $message = 'Sucesso', int $status = 200): JsonResponse
    {
        return response()->json([
            'status'    => true,
            'response'  => $data,
            'message'   => $message
        ], $status);
    }

    /**
     * @param $data
     * @param string $message
     * @param int $status
     * @param bool $paramError
     * @return JsonResponse
     */
    public static function error($data = null, $message = 'Erro', $status = 400, $paramError = false)
    {
        if ($data instanceof \Throwable)
            return response()->json([
                'status'        => false,
                'response'      => self::mountErrorResponse($data),
                'message'       => $data instanceof CustomException ? $data->getMessage() : $message,
                'paramError'    => $data instanceof CustomException
            ],
                $data instanceof CustomException ? $status : 500);

        return response()->json([
            'status'        => false,
            'response'      => $data,
            'message'       => $message,
            'paramError'    => $paramError
        ], $status);
    }

    private static function mountErrorResponse(\Throwable $exception)
    {
        return [$exception->getMessage()];
    }
}
