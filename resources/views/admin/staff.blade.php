<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Персонал</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="{{asset('img/logo.png')}}" type="image/x-icon">
</head>
<body class="bg-[#5A7684] flex flex-col min-h-screen w-full">
    <x-header class="flex-shrink-0"/>
    <div class="flex-grow flex items-center justify-center w-full">
        <div class="w-full max-w-5xl">
            <h1 class="text-center text-white text-3xl mb-8">Персонал</h1>
            <a href="{{ route('admin.staff.create') }}" class="bg-[#3A556A] text-white px-4 py-2 rounded mb-4">Добавить сотрудника</a>
            <table class="w-full text-white">
                <thead>
                    <tr>
                        <th class="border border-white px-4 py-2">Фамилия</th>
                        <th class="border border-white px-4 py-2">Имя</th>
                        <th class="border border-white px-4 py-2">Отчество</th>
                        <th class="border border-white px-4 py-2">Фото</th>
                        <th class="border border-white px-4 py-2">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($staff as $employee)
                    <tr>
                        <td class="border border-white px-4 py-2">{{ $employee->last_name }}</td>
                        <td class="border border-white px-4 py-2">{{ $employee->first_name }}</td>
                        <td class="border border-white px-4 py-2">{{ $employee->middle_name }}</td>
                        <td class="border border-white px-4 py-2"><img src="{{asset('images/' . $employee->image)}}" alt="" width="200px"></td>
                        <td class="border border-white px-4 py-2">
                            <a href="{{ route('admin.staff.edit', $employee) }}" class="text-white">Редактировать</a>
                            <form action="{{ route('admin.staff.destroy', $employee) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">Удалить</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>