<x-app-layout>
    <!-- X-APP-layoutの中に記述されている通りに日報のファイルを作成する。 -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <!-- <!DOCTYPE html> -->
                        <!-- <html lang="ja">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>日報登録</title>
                            <style>
                                /* スタイルを追加する場合はここに記述 */
                            </style>
                        </head> -->
                        <body>
                            <h1>日報登録</h1>
                            <form action="submit_report.php" method="post">
                                <label for="date">日付:</label>
                                <input type="date" id="date" name="date" required><br><br>

                                <label for="title">タイトル:</label>
                                <input type="text" id="title" name="title" required><br><br>

                                <label for="content">内容:</label><br>
                                <textarea id="content" name="content" rows="4" cols="50" required></textarea><br><br>
                                <input type="submit" value="登録">
                            </form>
                        </body>
                        <!-- </html> -->
                    </div>
                </div>
            </div>
        </div>
    </div>    
</x-app-layout>
