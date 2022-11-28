<x-app-layout>
    <x-slot name="header">
        楽曲を選択
    </x-slot>
    <div class="tracks">
        @foreach($tracks->items as $track)
            <form action="/comments/create" method="POST">
                @csrf
                <p>{{ $track->name }}</p>
                <input type="hidden" name="track_name" value="{{ $track->name }}">
                <input type="submit" value="選択">
                <br>
            </form>
        @endforeach
    </div>
</x-app-layout>