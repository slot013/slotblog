<?php

namespace App\Filament\Admin\Resources\PostResource\Widgets;

use App\Models\Post;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class PostsPerMonthChart extends ChartWidget
{
    protected int | string | array $columnSpan = 'full';
    protected static ?string $heading = 'Посты';

    protected function getData(): array
    {

        $data = Trend::model(Post::class)
            ->between(
                start: now()->startOfMonth(),
                end: now()->endOfMonth(),
            )
            ->perDay()
            ->dateColumn('published_at')
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Blog posts',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }


    protected function getType(): string
    {
        return 'line';
    }
}
