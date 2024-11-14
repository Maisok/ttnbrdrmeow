<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Редактировать услугу</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="{{asset('img/logo.png')}}" type="image/x-icon">
</head>
<body class="bg-[#5A7684] flex flex-col min-h-screen w-full">
    <x-header class="flex-shrink-0"/>
    <div class="flex-grow flex items-center justify-center w-full">
        <div class="w-full max-w-5xl">
            <h1 class="text-center text-white text-3xl mb-8">Редактировать услугу</h1>
            <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data" class="w-full">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-white">Название</label>
                    <input type="text" name="name" id="name" value="{{ $service->name }}" class="w-full bg-transparent border border-white text-white px-4 py-2 rounded">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-white">Описание</label>
                    <textarea name="description" id="description" class="w-full bg-transparent border border-white text-white px-4 py-2 rounded">{{ $service->description }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-white">Цена</label>
                    <input type="text" name="price" id="price" value="{{ $service->price }}" class="w-full bg-transparent border border-white text-white px-4 py-2 rounded">
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-white">Картинка</label>
                    <input type="file" name="image" id="image" class="w-full bg-transparent border border-white text-white px-4 py-2 rounded">
                </div>
                <button type="submit" class="bg-[#3A556A] text-white px-4 py-2 rounded">Обновить</button>
            </form>
        </div>
    </div>
</body>
</html>