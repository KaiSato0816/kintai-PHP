@foreach ($times as $time)
    <form method="POST" action="{{ route('update.time', $time->id) }}">
        @csrf
        @method('PUT')

        <label for="start_at">勤務開始時間:</label>
        <input type="text" name="start_at" value="{{ $time->start_at }}" required>

        <label for="end_at">退勤時間:</label>
        <input type="text" name="end_at" value="{{ $time->end_at }}" required>

        <button type="submit">更新</button>
    </form>
@endforeach
