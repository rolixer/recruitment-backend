<x-app-layout>
    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="flex justify-center">
            Categories
        </div>

        <form action="/category" method="POST">
            @csrf

        <x-primary-button type="submit">Show books from</x-primary-button>
        <select name='category_id'>
            @foreach ($categories as $category)
            <option value="{{$category->id}}"
            @if ($category_id == $category->id)
                selected
            @endif

            > {{$category->name}} </option>

            @endforeach
        </select>
        </form>

        @if ($category_id)
            <livewire:library.list :category_id="$category_id"/>
        @endif
    </div>
</x-app-layout>
