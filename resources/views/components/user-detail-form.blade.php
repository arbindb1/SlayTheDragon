<div>
    <form action="{{ $action }}" method="POST">
        @csrf
        <label for="name">Your name:</label>
        <input type="text" id="name" name="name" required>

        <label for="emailAddress">Your email:</label>
        <input type="email" id="emailAddress" name="emailAddress">
        <button type="submit">Start</button>
    </form>
</div>