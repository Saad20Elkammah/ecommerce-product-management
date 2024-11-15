<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">Products Management</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 lg:px-8 w-full">
            <div class="bg-white shadow-xl sm:rounded-lg w-full">
                <div class="p-8 text-gray-900">
                    <!-- Add Product Button -->
                    <button onclick="openModal('create')"
                            class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded mb-4">
                        Add Product
                    </button>

                    <!-- Product Table -->
                    <table class="min-w-full w-full bg-white shadow-md rounded-lg overflow-hidden">
                        <thead>
                            <tr class="bg-gray-100 text-gray-600 uppercase text-sm">
                                <th class="px-6 py-4 text-left font-semibold">Name</th>
                                <th class="px-6 py-4 text-left font-semibold">Price</th>
                                <th class="px-6 py-4 text-left font-semibold">Quantity</th>
                                <th class="px-3 py-4 text-left font-semibold w-1/5">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($products as $product)
                                <tr class="hover:bg-gray-50 transition duration-200">
                                    <td class="px-6 py-4 text-gray-700 text-sm font-medium">{{ $product->name }}</td>
                                    <td class="px-6 py-4 text-gray-700 text-sm font-medium">${{ number_format($product->price, 2) }}</td>
                                    <td class="px-6 py-4 text-gray-700 text-sm font-medium">{{ $product->quantity }}</td>
                                    <td class="px-3 py-4 text-right text-sm font-medium space-x-2 w-1/5 flex">
                                        <button onclick="openModal('edit', {{ json_encode($product) }})" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Edit</button>
                                        <button onclick="deleteProduct({{ $product->id }})" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">Delete</button>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-gray-700 text-sm">No products found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Pagination Links -->
                    <div class="mt-4">{{ $products->links() }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add/Edit Product Modal -->
    <div id="productModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center min-h-screen">
        <div class="bg-white rounded-lg shadow-lg max-w-lg w-full p-4">
            <h2 id="modalTitle" class="text-xl font-semibold mb-4">Add/Edit Product</h2>

            <!-- Product Form -->
            <form id="productForm">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('name') }}" required>
                    <span class="text-red-500 text-sm error-message" id="error-name"></span>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('description') }}</textarea>
                    <span class="text-red-500 text-sm error-message" id="error-description"></span>
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="number" id="price" name="price" step="0.01" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('price') }}" required>
                    <span class="text-red-500 text-sm error-message" id="error-price"></span>
                </div>
                <div class="mb-4">
                    <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                    <input type="number" id="quantity" name="quantity" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('quantity') }}" required>
                    <span class="text-red-500 text-sm error-message" id="error-quantity"></span>
                </div>

                <div class="flex justify-end items-center">
                    <button type="button" onclick="closeModal()" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded mr-2">Cancel</button>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Save</button>
                </div>
                <input type="hidden" id="productId">
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{ asset('assets/js/script.js') }}"></script>
</x-app-layout>
