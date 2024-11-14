<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Услуги</title>
  @vite('resources/css/app.css')
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="shortcut icon" href="{{asset('img/logo.png')}}" type="image/x-icon">
  <style>
    .description-cell {
      max-width: 200px; /* Ограничиваем максимальную ширину ячейки */
      white-space: normal; /* Разрешаем перенос текста на новую строку */
      word-wrap: break-word; /* Разрешаем перенос длинных слов */
    }
  </style>
</head>
<body class="bg-[#5A7684] flex flex-col min-h-screen w-full">
  <x-header class="flex-shrink-0"/>
  <div class="flex-grow flex items-center justify-center w-full">
    <div class="w-full max-w-5xl">
      <h1 class="text-center text-white text-3xl mb-8">Услуги</h1>
      <a href="{{ route('admin.services.create') }}" class="bg-[#3A556A] text-white px-4 py-2 rounded mb-4">Добавить услугу</a>
      <table class="w-full text-white">
        <thead>
          <tr>
            <th class="border border-white px-4 py-2">Название</th>
            <th class="border border-white px-4 py-2">Описание</th>
            <th class="border border-white px-4 py-2">Цена</th>
            <th class="border border-white px-4 py-2">Фото</th>
            <th class="border border-white px-4 py-2">Действия</th>
          </tr>
        </thead>
        <tbody>
          @foreach($services as $service)
          <tr>
            <td class="border border-white px-4 py-2">{{ $service->name }}</td>
            <td class="border border-white px-4 py-2 description-cell">{{ $service->description }}</td>
            <td class="border border-white px-4 py-2">{{ $service->price }}</td>
            <td class="border border-white px-4 py-2"><img src="{{asset('images/' .  $service->image)}}" alt="" width="200px"></td>
            <td class="border border-white px-4 py-2">
              <a href="{{ route('admin.services.edit', $service) }}" class="text-white">Редактировать</a>
              <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline">
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