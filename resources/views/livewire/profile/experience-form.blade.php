<div>
    <form wire:submit.prevent="submit">
        {{ $this->form }}

        <div wire:loading wire:target="submit">
            Processing ...
        </div>

        <button type="submit" wire:loading.remove wire:target="submit">
            Submit
        </button>
    </form>
</div>
