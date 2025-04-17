<header class="flex justify-between items-center p-4 bg-white shadow">
    <div class="flex items-center">
        <button id="sidebar-toggle" class="mr-4 text-gray-500 focus:outline-none lg:hidden">
            <i class="fas fa-bars"></i>
        </button>
        <h2 class="text-xl font-semibold">@yield('header', 'Dashboard')</h2>
    </div>
    <div class="flex items-center">
        <div class="relative" x-data="{ open: false }">
            <button @click="open = !open" class="flex items-center text-gray-700 focus:outline-none">
                <span class="mr-2">{{ Auth::user()->name }}</span>
                <i class="fas fa-chevron-down text-xs"></i>
            </button>
            <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-10">
                <a href="{{ route('admin.profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Mon profil</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        Déconnexion
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const sidebarToggle = document.getElementById('sidebar-toggle');
    const sidebar = document.querySelector('.sidebar');
    
    if (sidebarToggle && sidebar) {
        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('-translate-x-full');
        });
    }
});
</script>
@endpush 