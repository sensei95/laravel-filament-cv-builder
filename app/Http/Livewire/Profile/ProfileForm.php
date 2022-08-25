<?php

namespace App\Http\Livewire\Profile;

use App\Models\Profile;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\View\View;
use Livewire\Component;

class ProfileForm extends Component implements HasForms
{
    use InteractsWithForms;

    public string|null $biography = null;
    public int $profileId;

    public function mount(Profile $profile): void
    {
        $this->biography = $profile->biography;
        $this->profileId = $profile->id;
    }

    protected function rules(): array
    {
        return [
          'biography' => [
              'string',
              'required'
          ]
        ];
    }

    protected function getFormSchema(): array
    {
        return [

            MarkdownEditor::make('biography')->required(),
            // ...
        ];
    }

    public function submit(): void
    {
        $this->validate();
        Profile::query()
            ->whereId($this->profileId)
            ->update([
               'biography' => $this->biography
            ]);

    }

    public function render(): View
    {
        return view('livewire.profile.profile-form');
    }
}
