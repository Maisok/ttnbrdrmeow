<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Весь коллектив</title>
  @vite('resources/css/app.css')
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="shortcut icon" href="{{asset('img/logo.png')}}" type="image/x-icon">
</head>
<body class="bg-[#5E7585] flex flex-col min-h-screen">
  <x-header class="flex-shrink-0"/>
  <div class="flex-grow flex items-center justify-center">
    <div class="text-center w-full max-w-5xl">
      <h1 class="text-4xl text-white mb-8">Весь коллектив</h1>
      <div class="space-y-8">
        @foreach($specialists as $specialist)
        <div class="bg-gradient-to-t from-[#3A556A] to-[#5C7588] p-4 rounded-lg shadow-lg text-white">
          <div class="flex flex-col md:flex-row items-center">
            <img src="{{asset('images/' . $specialist->image)}}" alt="{{ $specialist->first_name }}" class="w-32 h-32 object-cover rounded-full mb-4 md:mb-0 md:mr-4" />
            <div class="text-left">
              <h2 class="text-2xl font-semibold">{{ $specialist->last_name}}</h2>
              <p class="text-lg">{{ $specialist->first_name }}</p>
              <p class="text-lg">{{ $specialist->middle_name }}</p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</body>
</html>