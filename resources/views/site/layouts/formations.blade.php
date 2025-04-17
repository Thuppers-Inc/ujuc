@extends('site.layouts.app')

@section('content')
    <!-- Hero Section -->
    @yield('hero')

    <!-- Formations List Section -->
    <section class="py-16" id="formations-list">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Sidebar with categories -->
                <div class="lg:col-span-1">
                    @yield('sidebar')
                </div>
                
                <!-- Formations grid -->
                <div class="lg:col-span-3">
                    @yield('formations-content')
                </div>
            </div>
        </div>
    </section>
    
    <!-- CTA Section -->
    @yield('cta')
@endsection 