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
<body class="bg-[#5E7585] flex flex-col min-h-screen">
  <x-header class="flex-shrink-0"/>
  <div class="flex-grow flex items-center justify-center">
    <div class="text-center">
      <h1 class="text-4xl text-white mb-8">Авторизация</h1>
      <form action="{{ route('login') }}" method="POST" class="space-y-4" onsubmit="return validateForm()">
        @csrf
        <input type="text" name="phone" placeholder="Номер телефона" class="block w-full md:w-64 mx-auto p-2 border border-gray-300 rounded bg-transparent text-white placeholder-white" oninput="formatPhoneNumber(this)">
        <input type="password" name="password" placeholder="Пароль" class="block w-full md:w-64 mx-auto p-2 border border-gray-300 rounded bg-transparent text-white placeholder-white">
        <button type="submit" class="w-full md:w-32 mx-auto p-2 bg-[#3A556A] text-white rounded">Войти</button>
      </form>
      <div class="mt-4">
        <a href="{{route('register')}}" class="text-white underline">нет аккаунта</a>
      </div>
    </div>
  </div>

  <script>
    function formatPhoneNumber(input) {
      let phone = input.value.replace(/\D/g, ''); // Удаляем все нецифровые символы
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

      input.value = formattedPhone;
    }

    function validateForm() {
      const phoneInput = document.querySelector('input[name="phone"]');
      const phonePattern = /^8 \d{3} \d{3} \d{2} \d{2}$/;

      if (!phonePattern.test(phoneInput.value)) {
        alert('Номер телефона должен быть в формате 8 888 888 88 88');
        return false;
      }

      return true;
    }
  </script>
</body>
</html>