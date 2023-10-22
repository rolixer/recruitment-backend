<?php

use Livewire\WithPagination;
use Livewire\Volt\Component;
use App\Models\Book;

new class extends Component {
    use WithPagination;

    public function with()
    {
        return [
            'books' => Book::paginate(10),
        ];
    }
}; ?>

<div>
    <div class="mt-16  min-h-screen grid grid-cols-5 gap-5">
        @foreach ($books as $book)
            <div class="min-h-fit">
                <div>
                    <strong>{{ $book->title }}</strong> <br>{{ $book->author }}
                    <span class="float-right">
                        {{ $book->publish_year }}
                    </span>
                </div>
                <hr>
                <p>
                    {{ $book->description }}
                </p>
                <hr>
                <span>
                    Copies available: {{ $book->copies_available }}
                </span>
            </div>
        @endforeach

    </div>
    {{ $books->links() }}
</div>
