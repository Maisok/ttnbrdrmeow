<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Toothless</title>
  @vite('resources/css/app.css')
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="shortcut icon" href="{{asset('img/logo.png')}}" type="image/x-icon">
  <style>
    .description-container {
      flex-basis: 50%;
      flex-grow: 1;
      overflow-wrap: break-word;
      word-wrap: break-word;
      word-break: break-word;
    }
  </style>
</head>
<body class="bg-[#5C7588] flex flex-col min-h-screen">
  <x-header class="flex-shrink-0"/>
  <div class="flex-grow flex items-center justify-center">
    <div class="bg-gradient-to-t from-[#3A556A] to-[#5C7588] text-white p-8 rounded-lg shadow-lg max-w-4xl w-full">
      <h1 class="text-3xl mb-6 text-center">
        {{ $service->name }}
      </h1>
      <div class="flex flex-col md:flex-row">
        <div class="flex-1 flex flex-col">
          <div class="p-6 rounded-lg flex-grow">
            <div class="flex justify-between items-center mb-4">
              <h2 class="text-xl">
                Описание
              </h2>
            </div>
            <p class="mb-4 description-container">
              {{ $service->description }}
            </p>
          </div>
          <p class="mt-4 text-lg">
            Стоимость: {{ $service->price }} РУБ
          </p>
        </div>
        <div class="ml-0 md:ml-8 mt-4 md:mt-0 flex items-center justify-center">
          <img alt="{{ $service->name }}" class="rounded-lg" width="200px" src="{{asset('images/' .  $service->image)}}" />
        </div>
      </div>
    </div>
  </div>
  <div class="flex justify-center mb-20">
    <form action="{{ route('appointments.create', $service) }}" method="POST" class="flex items-center space-x-4">
      @csrf
      <input type="datetime-local" name="appointment_time" class="p-2 border border-gray-300 rounded bg-transparent text-white placeholder-white">
      <button type="submit" class="bg-[#3A556A] text-white py-2 px-4 rounded-lg">
        Записаться
      </button>
    </form>
  </div>
</body>
</html>