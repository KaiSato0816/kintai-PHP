<link rel="stylesheet" type="text/css" href="{{ asset('css/syles.css') }}">


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('管理者専用画面') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table>
                        <thead>
                            <tr>
                                <th class="test">Name</th>
                                <th class="test">Email</th>
                                <th class="test">edit</th>
                                <th class="test">CSV_DL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="test">{{ $user->name }}</td>
                                    <td class="test">{{ $user->email }}</td>
                                    <td class="edit_botton">
                                        <a href="{{ route('admin.edit', ['id' => $user->id]) }}" class="btn btn-primary">編集する</a>
                                    </td>
                                    <td class="edit_botton">
                                        <a href="{{ route('downloadCsv', ['id' => $user->id]) }}" class="btn btn-primary">CSVダウンロード</a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>