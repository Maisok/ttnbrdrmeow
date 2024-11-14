<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Админка</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="{{asset('img/logo.png')}}" type="image/x-icon">
</head>
<body class="bg-[#5A7684] flex flex-col min-h-screen w-full">
    <x-header class="flex-shrink-0"/>
    <div class="flex-grow flex items-center justify-center w-full">
        <div class="w-full max-w-5xl">
            <h1 class="text-center text-white text-3xl mb-8">Админка</h1>
            <div class="bg-gradient-to-t from-[#5C7588] to-[#3A556A] p-4 rounded-lg w-full">
                <h2 class="text-white text-lg mb-4">Добро пожаловать в админку!</h2>
                <p class="text-white">Здесь вы можете управлять контентом и пользователями.</p>
                <div class="mt-4">
                    <a href="{{ route('admin.services.index') }}" class="bg-[#3A556A] text-white px-4 py-2 rounded mr-4">Управление услугами</a>
                    <a href="{{ route('admin.staff.index') }}" class="bg-[#3A556A] text-white px-4 py-2 rounded">Управление персоналом</a>
                </div>
                <div class="mt-4">
                    <a href="{{ route('export.active-appointments') }}" class="bg-[#3A556A] text-white px-4 py-2 rounded mr-4">Скачать активные заявки</a>
                    <a href="{{ route('export.completed-appointments') }}" class="bg-[#3A556A] text-white px-4 py-2 rounded">Скачать исполненные заявки</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>