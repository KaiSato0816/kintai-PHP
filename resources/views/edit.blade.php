@foreach ($times as $time)
    <form class="time-form" method="POST" action="{{ route('update.time', $time->id) }}">
        @csrf
        @method('PUT')
    
        <div class="form-group">
            <label for="start_at">勤務開始時間:</label>
            <input type="text" name="start_at" value="{{ $time->start_at }}" required>
        </div>

        <div class="form-group">
            <label for="end_at">退勤時間:</label>
            <input type="text" name="end_at" value="{{ $time->end_at }}" required>
        </div>

        <div class="form-group">
            <label for="comment">日報コメント:</label>
            <p>{{ $time->content }}</p>
        </div>
        
        <button type="submit" class="submit-button">更新</button>
    </div>
    </form>
@endforeach
