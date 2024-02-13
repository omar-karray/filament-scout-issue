<?php

namespace App\Filament\Resources\SynthetiserResource\Pages;

use App\Filament\Resources\SynthetiserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSynthetiser extends EditRecord
{
    protected static string $resource = SynthetiserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
