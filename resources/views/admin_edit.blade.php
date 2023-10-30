<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('管理者用ページ') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                            <!-- 出勤ボタン -->
                            
                                <!-- @isset ($error)
                                <p>{{$error}}</p>
                                @endisset

                                @isset ($success)
                                <p>{{$success}}</p>
                                @endisset -->
                            <!-- <div class="bottons">    
                                <div class="botton1">
                                    <button type="button" onclick="location.href='{{ route('Attendance.recordAttendance') }}'" method="POST" id = botton_font>出勤登録する</button>
                                </div>    
                                <div class="botton1">
                                    <button type="button" onclick="location.href='{{ route('Attendance.recordLeave') }}'" method="POST" id = botton_font>退勤登録する</button>
                                </div>  
                            </div> -->
                            <h1 id="dayly_title">管理者用日報登録</h1>
                            <div>
                                <div>                        
                                    <form action="{{ route('Attendance.recordAttendance') }}" method="POST">
                                        @csrf
                                        <label for="attendance_reason">①：出勤理由</label>
                                        <div class="text_color">
                                            <select name="attendance_reason" id="attendance_reason">
                                                <option value="0">通常勤務</option>
                                                <option value="1">遅刻</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <form action="{{ route('report.create') }}" method="post">
                                    <div class="nippou">
                                        <div>
                                            <input type='hidden' name='user_id' value="{{Auth::user()->id}}">
                                            @csrf
                                            <label for="date">②:日付</label>
                                            <div class="text_color">
                                                <input type="date" id="date" name="date" required><br><br>
                                            </div>  
                                            <label for="title">③:タイトル:</label>
                                            <div class="text_color">
                                                <input type="text" id="title" name="title" required><br><br>
                                            </div>
                                        </div>
                                        <div class="naiyou">
                                            <label for="content">④:内容:</label><br>
                                            <div class="text_color">
                                                <textarea id="content" name="content" rows="8" cols="100" required></textarea><br><br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="botton_row">
                                        <div class="botton_inside">
                                            <input type="submit" value="登録">
                                        </div>
                                        <div class="botton_inside">
                                            <a href="{{ route('time.edit', $user->id) }}" class="btn btn-primary">編集</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
    
    @vite(['resources/js/calendar.js'])
</x-app-layout>
