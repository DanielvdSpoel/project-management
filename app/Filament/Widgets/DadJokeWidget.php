<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Http;

/**
 * Based on https://github.com/phpsa/filament-dadjokes/tree/master
 */
class DadJokeWidget extends Widget
{

    protected static string $view = 'filament.widgets.dad-joke-widget';

    /**
     * @return array<string, ?string>
     */
    protected function getViewData(): array
    {
        try {
            $json = Http::acceptJson()->timeout(2)->get('https://icanhazdadjoke.com/')->throw()->json();
            return [
                'joke'         => $json['joke'],
                'provider_url' => 'https://icanhazdadjoke.com/',
                'provider'     => 'icanhazdadjoke.com',
            ];
        } catch (\Throwable $e) {
            return [
                'joke' => false
            ];
        }
    }

    public static function canView(): bool
    {
        if (app()->environment('local')) {
            return true;
        }

        return request()->user()->hasPermissionTo('view_jokes');
    }
}
