<x-app-layout>
    <div class="container mx-auto p-6 m-6 bg-slate-400 dark:bg-gray-800">
        <div class="flex justify-center pl-4">
            @include('mycomponent.sidebar')
            <div class="w-full p-6 bg-gray-100 dark:bg-gray-900">
                <!-- Main content goes here -->
                <div class="col-md-8 justify-center">
                    <i class="fas fa-align-justify"></i> Menu
                    <hr>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="/management/menu" method="post" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        <div class="form-group">
                            <label for="menuName" class="block text-sm font-medium text-gray-700">Menu Name</label>
                            <input type="text" name="name" id="menuName" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Menu Name...">
                        </div>

                        <div class="form-group">
                            <label for="menuPrice" class="block text-sm font-medium text-gray-700">Price</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">$</span>
                                </div>
                                <input type="number" name="price" id="menuPrice" class="block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md focus:border-indigo-500 focus:ring-indigo-500" placeholder="0.00" aria-label="Amount (to the nearest dollar)">

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="menuImage" class="block text-sm font-medium text-gray-700">Image</label>
                            <input type="file" name="image" id="menuImage" class="mt-1 block w-full text-sm text-gray-900 bg-gray-50 rounded-md border-gray-300 cursor-pointer focus:outline-none focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div class="form-group">
                            <label for="menuDescription" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="menuDescription" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Description..."></textarea>
                        </div>

                        <div class="form-group">
                            <label for="categoryId" class="block text-sm font-medium text-gray-700">Category ID</label>
                            <select name="category_id" id="categoryId" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                        </div>

                        <button type="submit" class="btn btn-primary bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
