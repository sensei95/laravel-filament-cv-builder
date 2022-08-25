<?php

namespace App\Http\Livewire\Profile;

use App\Models\Profile;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class ExperienceForm extends Component implements HasForms
{
    use InteractsWithForms;
    public Profile $profile;

    public function mount(Profile $profile)
    {
        $this->profile = $profile;
        $this->form->fill(['experiences' => $profile->experiences]);
    }

    protected function getFormModel(): Profile
    {
        return $this->profile;
    }

    protected function getFormSchema(): array
    {
        return [
            Repeater::make('experiences')
                ->relationship('experiences')
                ->schema([
                    Textarea::make('description')->required(),
                    Select::make('job_title_id')
                        ->required()
                        ->searchable()
                        ->preload()
                        ->relationship('jobTitle', 'name'),
                    Select::make('company_id')
                        ->required()
                        ->searchable()
                        ->preload()
                        ->relationship('company', 'name'),
                    DatePicker::make('started_at')
                        ->required(),
                    DatePicker::make('finished_at')
                    ->hidden(fn($get) => $get('current')),
                    Checkbox::make('current')
                        ->reactive()
                        ->nullable()
                ])
                ->orderable()
        ];
    }

    public function submit()
    {
        $this->profile->update( $this->form->getState());
    }

    public function render()
    {
        return view('livewire.profile.experience-form');
    }
}
