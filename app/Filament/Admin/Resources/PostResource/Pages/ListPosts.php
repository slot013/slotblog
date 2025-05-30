<?php

namespace App\Filament\Admin\Resources\PostResource\Pages;

use App\Filament\Admin\Resources\PostResource;
use App\Filament\Admin\Resources\PostResource\Widgets\PostsPerMonthChart;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;
    protected static ?string $title = 'Список постов';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

   /* protected function getHeaderWidgets(): array
    {
        return [
            PostsPerMonthChart::class,
        ];
    }*/

}
