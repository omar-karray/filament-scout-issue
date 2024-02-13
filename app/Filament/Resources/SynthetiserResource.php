<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SynthetiserResource\Pages;
use App\Filament\Resources\SynthetiserResource\RelationManagers;
use App\Models\Synthetiser;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Log;

class SynthetiserResource extends Resource
{
    protected static ?string $model = Synthetiser::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('name')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('description'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->searchable()
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSynthetisers::route('/'),
            'create' => Pages\CreateSynthetiser::route('/create'),
            'edit' => Pages\EditSynthetiser::route('/{record}/edit'),
        ];
    }

    protected function applySearchToTableQuery(Builder $query): Builder
{
    $this->applyColumnSearchesToTableQuery($query);
    
    if (filled($search = $this->getTableSearch())) {
        $query->whereIn('id', Synthetiser::search($search)->keys());
        Log::info($query);
    }
 
    return $query;
}
}
