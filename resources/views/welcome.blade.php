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
    .hidden {
      display: none;
    }
  </style>
</head>
<body>
  <div class="bg-gray-900 text-white">
    <div class="relative bg-cover bg-center h-[700px] flex flex-col justify-between" style="background-image: url({{asset("img/bgnav.png")}});">
      <!-- Navbar -->
      <header class="flex items-center justify-between px-8 py-4 bg-opacity-90">
        <div class="flex items-center space-x-2">
          <img src="{{asset('img/logo.png')}}" alt="Logo" class="w-8 h-8" />
          <span class="text-xl font-semibold">TOOTHLESS</span>
        </div>
        <nav class="hidden md:flex items-center space-x-6 text-white">
          <a href="{{route('home')}}" class="hover:underline">Главная</a>
          <a href="{{route('showservice')}}" class="hover:underline">Услуги</a>
          
          @if(Auth::check())
            <a href="{{ route('profile.show') }}" class="text-white text-sm">ЛИЧНЫЙ КАБИНЕТ</a>
            @if(Auth::user()->role === 'admin')
            <a href="{{ route('admin.dashboard') }}" class="text-white text-sm">АДМИНКА</a>
          @endif
          @else
            <a href="{{ route('login') }}" class="text-white text-sm">ЛИЧНЫЙ КАБИНЕТ</a>
          @endif
          
          <a href="#" class="block px-4 py-2 border border-white text-sm text-white rounded hover:bg-white hover:text-[#5E7585] transition">
            ЗАПИСАТЬСЯ
          </a>
        </nav>
        <div class="text-white">📞 123-4567 890</div>
        <button id="burger" class="md:hidden text-white">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </header>

      <!-- Mobile Navigation -->
      <nav id="nav" class="hidden md:hidden bg-gray-800 text-white text-center py-4">
        <a href="{{route('home')}}" class="block py-2 hover:underline">Главная</a>
        <a href="" class="block py-2 hover:underline">Услуги</a>
        
        @if(Auth::check())
          <a href="{{ route('profile.show') }}" class="block py-2 text-sm">ЛИЧНЫЙ КАБИНЕТ</a>
        @else
          <a href="{{ route('login') }}" class="block py-2 text-sm">ЛИЧНЫЙ КАБИНЕТ</a>
        @endif
        
        <a href="#" class="block py-2 border border-white text-sm text-white rounded hover:bg-white hover:text-[#5E7585] transition">
          ЗАПИСАТЬСЯ
        </a>
      </nav>

      <div class="w-full h-full flex justify-center items-center">
        <section class="relative flex flex-col justify-center items-center text-center p-8 w-full">
          <div>
            <h1 class="text-4xl font-bold">КЛИНИКА ВАШЕЙ МЕЧТЫ</h1>
            <p class="mt-2 text-lg max-w-md">Лучшая клиника России открылась в Иркутске. У нас 150 филиалов по всей стране и более 2000 постоянных клиентов. Приходите к нам и мы вас не подведем.</p>
          </div>
        </section>
      </div>
    </div>

    @if($specialists->isNotEmpty())
    <section class="py-10 bg-white text-center">
      <h2 class="text-2xl font-bold text-black">Наши специалисты</h2>
      <p class="mt-2 text-gray-600 text-sm">Мы покажем вам одних из лучших дантистов, которые успели поработать за границей.</p>
      <div class="w-full md:w-3/4 lg:w-3/4 mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6 px-6">
          <!-- Верхняя строка -->
          @foreach($specialists->take(3) as $specialist)
          <div class="relative rounded-lg overflow-hidden h-64">
            <img src="{{asset('images/' . $specialist->image)}}" alt="{{ $specialist->first_name }}" class="w-full h-full object-cover" />
            <div class="absolute top-0 left-0 p-4 text-white font-semibold text-lg">{{ $specialist->first_name }}</div>
          </div>
          @endforeach
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6 px-6">
          <!-- Нижняя строка -->
          <div class="relative rounded-lg overflow-hidden h-64">
            <img src="{{asset('images/' . $specialists->last()->image)}}" alt="{{ $specialists->last()->first_name }}" class="w-full h-full object-cover" />
            <div class="absolute top-0 left-0 p-4 text-white font-semibold text-lg">{{ $specialists->last()->first_name }}</div>
          </div>
          <a href="{{ route('all.specialists') }}" class="relative rounded-lg overflow-hidden col-span-2 h-64">
            <img src="{{asset('img/all.png')}}" alt="Specialist 4" class="object-cover w-full h-full" />
            <div class="absolute top-0 left-0 p-4 text-white font-semibold text-lg">Весь коллектив</div>
          </a>
        </div>
      </div>
    </section>
    @endif

    @if($services->isNotEmpty())
    <!-- Services Section -->
    <section class="py-12 bg-white text-center">
      <h2 class="text-3xl font-bold text-black">Услуги</h2>
      <p class="mt-2 text-gray-600">Расскажем о малой части наших услуг и ценах</p>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mt-8 px-8">
        @foreach($services as $service)
        <a href="{{ route('services.show', $service) }}"> <div>
            <h3 class="font-semibold text-black">{{ $service->name }}</h3>
            <p class="text-blue-600">{{ $service->price }} РУБ</p>
            <p class="text-gray-500">{{ Str::limit($service->description, 20) }}</p>
          </div></a>
        @endforeach
      </div>
      <form action="{{route('showservice')}}" method="get">
        <button class="mt-6 bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700">Записаться</button>
      </form>
     
    </section>
    @endif

    <!-- Footer Section -->
    <footer class="py-12 bg-gray-800 text-center text-white h-[300px]" style="background-image: url({{asset("img/footer.png")}});">
      <h2 class="text-3xl font-bold">Самое удобное расположение в шаговой доступности</h2>
      <p class="mt-2 text-gray-400">До нас можно добраться на общественном транспорте или же на своей машине и припарковаться рядом с клиникой.</p>
     
    </footer>
  </div>

  <script>
    document.getElementById('burger').addEventListener('click', function() {
      const nav = document.getElementById('nav');
      nav.classList.toggle('hidden');
    });
  </script>
</body>
</html>