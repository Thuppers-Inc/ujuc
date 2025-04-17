@props(['categories', 'currentCategory' => null])

<div class="bg-white rounded-lg shadow-md p-6 sticky top-4">
    <h3 class="text-xl font-semibold mb-4 border-b pb-2 text-gray-800">Catégories</h3>
    <ul class="space-y-2">
        <li>
            <a href="{{ route('formations.index') }}" 
               class="block py-2 px-3 {{ !$currentCategory ? 'bg-orange-500 text-white font-medium rounded-md' : 'text-gray-700 hover:bg-gray-100 hover:rounded-md' }}">
                Toutes les formations
            </a>
        </li>
        @foreach($categories as $category)
            <li>
                <a href="{{ route('formations.categorie', $category->slug) }}" 
                   class="block py-2 px-3 {{ $currentCategory && $category->id === $currentCategory->id ? 'bg-orange-500 text-white font-medium rounded-md' : 'text-gray-700 hover:bg-gray-100 hover:rounded-md' }}">
                    {{ $category->nom }}
                </a>
            </li>
        @endforeach
    </ul>
</div>