<?php

namespace App\Filament\Resources\Tenants;

use App\Filament\Resources\Tenants\Pages\ManageTenants;
use App\Models\Tenant;
use App\Rules\CvRule;
use App\Rules\ImageRule;
use BackedEnum;
use Closure;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Http\UploadedFile;

class TenantResource extends Resource
{
    private const int MAX_FILE_SIZE = 2097152;

    protected static ?string $model = Tenant::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Tenant';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('email')
                    ->required()
                    ->email(),
                TextInput::make('phone')
                    ->required(),
                Textarea::make('socials')
                    ->columnSpanFull()
                    ->required(),
                FileUpload::make('logo')
                    ->disk('public')
                    ->directory('tenants')
                    ->visibility('public')
                    ->image()
                    ->rule(new ImageRule(maxSize: self::MAX_FILE_SIZE, maxWidth: 400, maxHeight: 400, allowedRatio: 1)),
                FileUpload::make('cv')->disk('public')
                    ->directory('tenants')
                    ->visibility('public')
                    ->rule(new CvRule())
                    ->required(),
                Toggle::make('active')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Tenant')
            ->columns([
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('phone')
                    ->searchable(),
                TextColumn::make('socials'),
                TextColumn::make('logo'),
                TextColumn::make('cv'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageTenants::route('/'),
        ];
    }
}
