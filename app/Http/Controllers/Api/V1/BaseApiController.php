<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

/**
 * Class BaseController
 *
 * HTTP codes utilize inbuilt response codes defined in "Symfony\Component\HttpFoundation\Response"
 */
abstract class BaseApiController extends Controller
{
    /**
     * Send API response.
     *
     * @param $responseData
     * @param int $responseCode
     * @param string $message
     * @param array $headers
     * @return JsonResponse
     */
    public function sendResponse($responseData, int $responseCode, string $message = 'success', array $headers = []) : JsonResponse
    {
        return response()->json(
            ['data' => $responseData, 'message' => $message],
            $responseCode,
            $headers
        );
    }
}
