<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Добавить сотрудника</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="{{asset('img/logo.png')}}" type="image/x-icon">
</head>
<body class="bg-[#5A7684] flex flex-col min-h-screen w-full">
    <x-header class="flex-shrink-0"/>
    <div class="flex-grow flex items-center justify-center w-full">
        <div class="w-full max-w-5xl">
            <h1 class="text-center text-white text-3xl mb-8">Добавить сотрудника</h1>
            <form action="{{ route('admin.staff.store') }}" method="POST" enctype="multipart/form-data" class="w-full">
                @csrf
                <div class="mb-4">
                    <label for="last_name" class="block text-white">Фамилия</label>
                    <input type="text" name="last_name" id="last_name" class="w-full bg-transparent border border-white text-white px-4 py-2 rounded">
                </div>
                <div class="mb-4">
                    <label for="first_name" class="block text-white">Имя</label>
                    <input type="text" name="first_name" id="first_name" class="w-full bg-transparent border border-white text-white px-4 py-2 rounded">
                </div>
                <div class="mb-4">
                    <label for="middle_name" class="block text-white">Отчество</label>
                    <input type="text" name="middle_name" id="middle_name" class="w-full bg-transparent border border-white text-white px-4 py-2 rounded">
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-white">Картинка</label>
                    <input type="file" name="image" id="image" class="w-full bg-transparent border border-white text-white px-4 py-2 rounded">
                </div>
                <button type="submit" class="bg-[#3A556A] text-white px-4 py-2 rounded">Добавить</button>
            </form>
        </div>
    </div>
</body>
</html>