<?php

namespace App\Repositories;

use App\Models\Log;
use Illuminate\Database\Eloquent\HigherOrderBuilderProxy;

class LogRepository
{
    /**
     * Записать лог в БД
     *
     * @param $status
     * @return HigherOrderBuilderProxy|mixed
     */
    public function setLog($status) {
        $log = Log::create([
            'status' => $status,
        ]);

        $log->save();

        return $log->id;
    }

    /**
     * Получить все логи в нужном порядке
     *
     * @param $order
     * @return mixed
     */
    public function getLogs($order = "desc") {
        $logs = Log::get()->orderBy('id', $order);

        return $logs;
    }

    /**
     * Получить нужный лог по ID
     *
     * @param $log_id
     * @return mixed
     */
    public function getLog($log_id) {
        $log = Log::findOrFail($log_id);

        return $log;
    }

    /*
     * Получить текст лога по статусу
     *
     * @return string
     */
    public static function getLabel(int $status) {
        return match ($status) {
            0 => "Проезд на красный. Штраф!",
            1 => "Проезд на зеленый!",
            2 => "Успели на желтый!",
            3 => "Слишком рано начали движение!",
        };
    }
}
