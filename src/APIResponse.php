<?php


namespace App\API;


use Illuminate\Http\JsonResponse;

class APIResponse
{

    /**
     * @param $status
     * @param $message
     * @param $data
     * @return JsonResponse
     */
    public function response($status, $message, $data)
    {
        return response()->json([
            'STATUS' => strval($status),
            'MESSAGE' => $message,
            'DATA' => $data
        ]);
    }

    /**
     * @param $data
     * @return JsonResponse
     */
    public function okWithoutMessage($data)
    {
        return $this->ok('No message', $data);
    }


    /**
     * @param $message
     * @param $data
     * @return JsonResponse
     */
    public function ok($message, $data)
    {
        return $this->response(200, $message, $data);
    }

    /**
     * @return JsonResponse
     */
    public function notFound()
    {
        return $this->response(404, __('general.404'), []);
    }

    /**
     * @param $message
     * @return JsonResponse
     */
    public function notFoundWithMessage($message)
    {
        return $this->response(404, $message, []);
    }

    /**
     * @param $errors
     * @return JsonResponse
     */
    public function validationFailed($errors)
    {
        return $this->response(422, 'Some Fields is required please check the it first', $errors);
    }


    /**
     * @param $errors
     * @param $message
     * @return JsonResponse
     */
    public function validationFailedWithMessage($message, $errors)
    {
        return $this->response(422, $message, $errors);
    }

    public function error($message, $data)
    {
        return $this->response(500, $message, $data);
    }
}