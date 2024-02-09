@extends('app.main')

@section('content')
    <main class="wrapper">
        <div class="traffic-lights">
            <div class="traffic-lights__wrapper">
                <div class="traffic-lights__item red"></div>
                <div class="traffic-lights__item yellow early_yellow"></div>
                <div class="traffic-lights__item green active"></div>
            </div>

            <div class="traffic-lights__form">
                <h1>{{ env('APP_NAME') }}</h1>
                <button id="handleMove" class="button-primary">Вперед</button>
            </div>
        </div>

        <div class="logs">
            @forelse($logs as $log)
            <div class="logs__item">
                {{ \App\Repositories\LogRepository::getLabel($log->status) }}
            </div>
            @empty
                <div class="logs__item">
                    Лог пуст
                </div>
            @endforelse
        </div>
    </main>
@endsection
