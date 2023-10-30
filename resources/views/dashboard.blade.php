<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('出勤・退勤登録フォーム') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <body>
                            <!-- 出勤ボタン -->
                            @isset ($error)
                            <p>{{$error}}</p>
                            @endisset

                            @isset ($success)
                            <p>{{$success}}</p>
                            @endisset
                            <form action="{{ route('Attendance.recordAttendance') }}" method="POST">
                                @csrf
                                <label for="attendance_reason"><p class="font1">①出勤理由：</p></label>
                                <div class="text_color">
                                    <select name="attendance_reason" id="attendance_reason">
                                        <option value="0">通常勤務</option>
                                        <option value="1">遅刻</option>
                                    </select>
                                </div>
                                <p class="explain">②出勤ボタンで出勤登録</p>
                                    <button type="submit" class="botton_font"><p id="botton_font">出勤登録する</p></button>
                            </form>
                            <form action="{{ route('report.create') }}" method="post">
                                <input type='hidden' name='user_id' value="{{Auth::user()->id}}">
                            @csrf
                                <label for="date"><p class="font1">③日付:</p></label>
                            <div class="text_color">
                                <input type="date" id="date" name="date" required><br><br>
                            </div>
                            <div class="text_color2">   
                                <label for="title"><p class="font1">④タイトル:</p></label>
                            </div>
                                <div class="text_color">
                                    <input type="text" id="title" name="title" required><br><br>
                                </div>
                            <div class="naiyou">
                            <div class="text_color2">
                                <div class="naiyou"> 
                                    <label for="content"><p class="font1">⑤内容:</p></label>
                                </div>
                            </div>
                                <div class="text_color">
                                    <textarea id="content" name="content" rows="8" cols="40" required></textarea><br><br>
                                </div>
                            <div class="botton1">
                                <!-- 退勤ボタン -->
                                <input type="submit" value="退勤登録をする"  class="botton_font" id = "botton_font"></input>                        
                            </div>
                            </form>
                        </body>
                        <!-- </html> -->
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
@vite(['resources/js/calendar.js'])

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const contentTextArea = document.getElementById('content'); // 日報内容のテキストエリア
        const leaveButton = document.getElementById('botton_font'); // 退勤ボタンの要素
        
        leaveButton.disabled = true; // 退勤ボタンを初期状態で無効化

        contentTextArea.addEventListener('input', function() {
            if (contentTextArea.value.trim() !== '') {
                leaveButton.disabled = false; // 日報内容が入力されたら退勤ボタンを有効化
            } else {
                leaveButton.disabled = true; // 日報内容が空の場合は退勤ボタンを無効化
            }
        });
    });
</script>
