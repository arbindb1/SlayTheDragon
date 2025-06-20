<div>
    <form action="{{ $action }}" method="GET">
        @csrf
        <button type="submit">{{ $buttonName }}</button>
    </form>
</div>