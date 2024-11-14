<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Toothless</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="{{asset('img/logo.png')}}" type="image/x-icon">
</head>
<body class="bg-[#5A7684] min-h-screen">
  <x-header/>
  <div class="flex justify-center items-center">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4">
      @foreach($services as $service)
      <a href="{{ route('services.show', $service) }}" class="block">
        <div class="bg-[#3A5A6C] text-white p-4 rounded-lg shadow-lg h-full flex flex-col">
            <h2 class="text-lg font-semibold mb-2">{{ $service->name }}</h2>
            <p class="mb-4 whitespace-normal flex-grow w-4/5 break-word">{{ $service->description }}</p>
            <div class="border-t border-white pt-2">
                <p>{{ $service->price }} РУБ</p>
            </div>
        </div>
      </a>
      @endforeach
    </div>
  </div>
</body>
</html>