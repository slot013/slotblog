<?php

namespace App\Filament\Admin\Resources\CommentResource\Widgets;

use App\Filament\Admin\Resources\CommentResource;
use App\Models\Comment;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestCommentsWidget extends BaseWidget
{
    protected static ?string $heading = 'Последние комментарии';
    protected int | string | array $columnSpan = 'full';
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Comment::whereDate('created_at', '>', now()->subDays(70)->startOfDay())
            )
            ->columns([
                TextColumn::make('user.name')->label('Пользователь'),
                TextColumn::make('post.title')->label('Пост'),
                TextColumn::make('comment')->label('Комментарий'),
                TextColumn::make('created_at')->label('Время публикации')->date()->sortable(),



            ])
            ->actions([
                Action::make('Перейти')
                    ->url(fn (Comment $record): string => CommentResource::getUrl('edit', ['record' => $record]))
                    ->openUrlInNewTab()
            ]);

    }
}
