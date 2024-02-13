<?php

namespace App\Filament\Resources\SynthetiserResource\Pages;

use App\Filament\Resources\SynthetiserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSynthetisers extends ListRecords
{
    protected static string $resource = SynthetiserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
