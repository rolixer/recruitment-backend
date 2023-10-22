<?php

use Livewire\Attributes\Reactive;
use Livewire\Attributes\Rule;
use Livewire\Volt\Component;

use Illuminate\Support\Facades\DB;

use App\Models\Book;

new class extends Component {
    #[Reactive]
    public $book;

    #[Rule('required|min:3|max:255')]
    public $title;
    #[Rule('required|min:3|max:255')]
    public $author;
    #[Rule('required')]
    public $publish_year;
    #[Rule('required|min:3')]
    public $description;
    #[Rule('required')]
    public $copies_available;

    public function mount(): void
    {
        if ($this->book) {
            $this->title = $this->book->title;
            $this->author = $this->book->author;
            $this->publish_year = $this->book->publish_year;
            $this->description = $this->book->description;
            $this->copies_available = $this->book->copies_available;
        }
    }

    public function create(): void
    {
        $validated = $this->validate();

        if ($this->book) {
            Book::find($this->book->id)->update($validated);
        } else {
            $validated['created_at'] = now();
            Book::insert($validated);
            $this->dispatch('book-created');
        }


    }

    public function delete(int $key): void {
        $book = Book::find($key);
        $book->delete();
        redirect('/manage');
    }
}; ?>

<div class="min-h-fit">

    <form wire:submit="create">
        Title: <x-text-input wire:model='title' name='title' /> <br><br>

        Author: <x-text-input wire:model='author' name='author' /> <br> <br>
        Publish year: <input wire:model="publish_year" min='0' max='2023' type="number" name="publish_year"
            id="publish_year"> <br> <br>

        Descrition: <br>
        <textarea wire:model="description" name='description' placeholder="Brief book description"
            class="block w-full min-h-fit ">
        </textarea> <br> <br>

        Copies available: <input wire:model="copies_available" type="number" name="copies_available"
            id="copies_available" min=0 />
        <br>
        <x-primary-button class="mt-4"> Save </x-primary-button>
        @if ($book)
        <x-secondary-button
            wire:click="delete({{$book->id}})"
        > Delete </x-secondary-button>

        @endif

    </form>
</div>
