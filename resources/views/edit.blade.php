<!-- edit.blade.php -->

<form method="POST" action="{{ route('update.time', $time->id) }}">
    @csrf
    @method('PUT')
    <label for="start_at">Start At:</label>
    <input type="text" name="start_at" value="{{ $time->start_at }}" required>
    <label for="end_at">End At:</label>
    <input type="text" name="end_at" value="{{ $time->end_at }}" required>
    <button type="submit">更新</button>
</form>