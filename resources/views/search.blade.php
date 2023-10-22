<x-app-layout>
    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="flex justify-center">
            Search
        </div>

        <form action="/search" method="POST">
            @csrf
        <x-text-input name="query"></x-text-input>
        <button type="submit">Search now</button>
        </form>

        @if ($query)
            <livewire:library.list :query="$query"/>
        @endif
    </div>
</x-app-layout>
