<?php

namespace App\Http\Controllers;

use App\Services\TrafficMoveService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TrafficController extends Controller
{
    /**
     * Вызов обработчика кнопки "Вперед"
     *
     * @param string $color
     * @return JsonResponse
     */
    public function handleMove(string $color = "red") {
        $service = new TrafficMoveService();

        return $service->handleMove(color: $color);
    }
}
