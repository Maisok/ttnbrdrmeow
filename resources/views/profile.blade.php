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
<body class="bg-[#5A7684] flex flex-col min-h-screen w-full">
  <x-header class="flex-shrink-0"/>
  <div class="flex-grow flex items-center justify-center w-full">
    <div class="w-full max-w-5xl p-4">
      <h1 class="text-center text-white text-3xl mb-8">Личный кабинет</h1>

      <!-- Отображение сообщения об успешном обновлении -->
      @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
          <span class="block sm:inline">{{ session('success') }}</span>
        </div>
      @endif

      <form action="{{ route('profile.update') }}" method="POST" class="flex flex-col md:flex-row justify-between mb-8 w-full">
        @csrf
        <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4 mb-4 md:mb-0">
          <input type="text" name="name" placeholder="Имя" value="{{ old('name', $user->name) }}" class="bg-transparent border border-white text-white px-4 py-2 rounded w-full md:w-auto">
          @error('name')
            <span class="text-red-500">{{ $message }}</span>
          @enderror
        </div>
        <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4 mb-4 md:mb-0">
          <input type="text" name="phone" placeholder="Номер телефона" value="{{ old('phone', $user->phone) }}" class="bg-transparent border border-white text-white px-4 py-2 rounded w-full md:w-auto">
          @error('phone')
            <span class="text-red-500">{{ $message }}</span>
          @enderror
        </div>
        <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4 mb-4 md:mb-0">
          <input type="password" name="password" placeholder="Пароль" class="bg-transparent border border-white text-white px-4 py-2 rounded w-full md:w-auto">
          @error('password')
            <span class="text-red-500">{{ $message }}</span>
          @enderror
        </div>
        <button type="submit" class="bg-transparent border border-white text-white px-4 py-2 rounded w-full md:w-auto">изменить</button>
      </form>
      <div class="flex flex-col md:flex-row justify-between space-y-4 md:space-y-0 md:space-x-4">
        <div class="bg-gradient-to-t from-[#5C7588] to-[#3A556A] p-4 rounded-lg w-full md:w-1/2">
          <h2 class="text-white text-lg mb-4">Актуальные записи</h2>
          @forelse ($upcomingAppointments as $appointment)
            <div class="text-white flex justify-between mb-2">
              <span>{{ $appointment->service->name }}</span>
              <span>{{ $appointment->appointment_time}}</span>
            </div>
          @empty
            <div class="text-white">Нет актуальных записей</div>
          @endforelse
        </div>
        <div class="bg-gradient-to-t from-[#5C7588] to-[#3A556A] p-4 rounded-lg w-full md:w-1/2">
          <h2 class="text-white text-lg mb-4">История</h2>
          @forelse ($pastAppointments as $appointment)
            <div class="text-white flex justify-between mb-2">
              <span>{{ $appointment->service->name }}</span>
              <span>{{ $appointment->appointment_time }}</span>
            </div>
          @empty
            <div class="text-white">Нет прошедших записей</div>
          @endforelse
        </div>
      </div>
      <div class="flex justify-center mt-8">
        <form action="{{route('logout')}}" method="POST">
            @csrf
            <button class="bg-[#3A556A] text-white px-4 py-2 rounded">Выйти</button>
        </form>
      </div>
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const phoneInput = document.querySelector('input[name="phone"]');

      phoneInput.addEventListener('input', function(event) {
        let phone = event.target.value.replace(/\D/g, ''); // Удаляем все нецифровые символы
        let formattedPhone = '';

        if (phone.length > 0) {
          formattedPhone = '8 ';
        }
        if (phone.length > 1) {
          formattedPhone += phone.substring(1, 4) + ' ';
        }
        if (phone.length > 4) {
          formattedPhone += phone.substring(4, 7) + ' ';
        }
        if (phone.length > 7) {
          formattedPhone += phone.substring(7, 9) + ' ';
        }
        if (phone.length > 9) {
          formattedPhone += phone.substring(9, 11);
        }

        event.target.value = formattedPhone;
      });

      document.querySelector('form').addEventListener('submit', function(event) {
        const phoneInput = document.querySelector('input[name="phone"]');
        const passwordInput = document.querySelector('input[name="password"]');
        const phonePattern = /^8 \d{3} \d{3} \d{2} \d{2}$/;
        const passwordPattern = /^.{8,}$/;

        let isValid = true;

        if (!phonePattern.test(phoneInput.value)) {
          alert('Номер телефона должен быть в формате 8 888 888 88 88');
          isValid = false;
        }

        if (!passwordPattern.test(passwordInput.value)) {
          alert('Пароль должен быть не менее 8 символов');
          isValid = false;
        }

        if (!isValid) {
          event.preventDefault();
        }
      });
    });
  </script>
</body>
</html>