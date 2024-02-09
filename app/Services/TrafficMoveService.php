<?php

namespace App\Services;

use App\Models\Log;
use App\Repositories\LogRepository;
use Illuminate\Http\JsonResponse;

class TrafficMoveService
{
    /**
     * Обработчик кнопки "Вперед"
     *
     * @param string $color
     * @return JsonResponse
     */
    public function handleMove(string $color = "red") : JsonResponse {
        $status = match ($color) {
            "red" => 0,
            "green" => 1,
            "yellow" => 2,
            "early_yellow" => 3,
        };

        $log = new LogRepository();

        $log->setLog($status);

        return response()->json(['message' => $log->getLabel($status)], 200);
    }
}
