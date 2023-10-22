<?php

use Livewire\Attributes\On;

use Livewire\Volt\Component;
use App\Models\Book;


new class extends Component {

    public $books = [];
    public ?Book $selected_book;

    public function mount(): void {
        $this->books = Book::all('id', 'title');
        $this->selected_book = Book::first();
    }

    public function select(int $id): void {
        if ($id == 0) {
            $this->selected_book = null;
        } else  {
            $this->selected_book = Book::find($id);
        }
    }

    #[On('book-created')]
    public function newBook(): void {
        $this->books = Book::all('id', 'title');
        $this->selected_book = Book::latest('created_at', 'desc')->first();
    }
}; ?>

<div>
    <div class="mt-16  min-h-screen grid grid-cols-5 gap-5">
    <div>
            <button wire:click="select(0)">Create new Book</button>
        <ul class='overflow-auto max-h-96'>
            @foreach ($books as $book)
              <li> <x-nav-link wire:click="select({{$book->id}})"> <strong> {{$book->title}}</strong> <hr> </x-nav-link></li>
            @endforeach
        </ul>
    </div>
    <div class="col-span-4">
        <livewire:library.book-card :book="$selected_book" :key="$selected_book ? $selected_book->id : 0"/>
    </div>
    </div>
</div>
