<div class="bg-[#5E7585] text-white">
  <div class="container mx-auto flex items-center justify-between py-4 px-6">
    <!-- Logo -->
    <div class="flex items-center space-x-2">
      <img src="{{asset('img/logo.png')}}" alt="Logo" class="w-8 h-8"> <!-- Замените logo.svg на путь к вашему логотипу -->
      <span class="font-semibold text-lg">TOOTHLESS</span>
    </div>

    <!-- Navigation Links -->
    <div class="hidden md:flex space-x-6">
      <a href="{{route('home')}}" class="text-white text-sm">ГЛАВНАЯ</a>
      <a href="{{route('showservice')}}" class="text-white text-sm">УСЛУГИ</a>
      @if(Auth::check())
        <a href="{{ route('profile.show') }}" class="text-white text-sm">ЛИЧНЫЙ КАБИНЕТ</a>
        @if(Auth::user()->role === 'admin')
          <a href="{{ route('admin.dashboard') }}" class="text-white text-sm">АДМИНКА</a>
        @endif
      @else
        <a href="{{ route('login') }}" class="text-white text-sm">ЛИЧНЫЙ КАБИНЕТ</a>
      @endif
    </div>

    <!-- Button and Contact -->
    <div class="flex items-center space-x-6">
      <!-- Appointment Button -->
      <a href="#" class="hidden md:inline-block px-4 py-2 border border-white text-sm text-white rounded hover:bg-white hover:text-[#5E7585] transition">
        ЗАПИСАТЬСЯ
      </a>

      <!-- Phone Contact -->
      <div class="flex items-center space-x-2">
          <div>📞</div>
        <span class="text-sm">123-4567 890</span>
      </div>
    </div>

    <!-- Burger Menu for Mobile -->
    <div class="md:hidden">
      <button id="mobile-menu-button" class="text-white">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
      </button>
    </div>
  </div>

  <!-- Mobile Menu -->
  <div id="mobile-menu" class="hidden md:hidden">
    <div class="px-6 py-4 space-y-2">
      <a href="#" class="block text-white text-sm">ГЛАВНАЯ</a>
      <a href="#" class="block text-white text-sm">СПЕЦИАЛИСТЫ</a>
      <a href="#" class="block text-white text-sm">УСЛУГИ</a>
      @if(Auth::check())
        <a href="{{ route('profile.show') }}" class="block font-semibold text-white text-sm">ЛИЧНЫЙ КАБИНЕТ</a>
        @if(Auth::user()->role === 'admin')
          <a href="" class="block font-semibold text-white text-sm">АДМИНКА</a>
        @endif
      @else
        <a href="{{ route('login') }}" class="block font-semibold text-white text-sm">ЛИЧНЫЙ КАБИНЕТ</a>
      @endif
      <a href="#" class="block px-4 py-2 border border-white text-sm text-white rounded hover:bg-white hover:text-[#5E7585] transition">
        ЗАПИСАТЬСЯ
      </a>
    </div>
  </div>
</div>

<script>
document.getElementById('mobile-menu-button').addEventListener('click', function() {
  document.getElementById('mobile-menu').classList.toggle('hidden');
});
</script>