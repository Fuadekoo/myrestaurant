<x-app-layout>
    <div class="container mx-auto p-6 m-6 bg-slate-400 dark:bg-gray-800">
        <div class="flex justify-center pl-4">
            @include('mycomponent.sidebar')
            <div class="w-full p-6 bg-gray-100 dark:bg-gray-900">
                <!-- Main content goes here -->
                <div class="col-md-8 justify-center ">
                    <i class="fas fa-align-justify"></i>Category
                    <hr>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    <form action="/management/menu" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="menuName">Menu name</label>
                            <input type="text" name="menuName" id="menuName" class="form-control" placeholder="Category...">
                        </div>

                            <label for="menuPrice">Price</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="number" name="Price" id="menuName" class="form-control" placeholder="price..." aria-label="Amount(to the nearest dollar)">
                            <div class="input-group-append">
                                <span class="input-group-text">00</span>
                            </div>

                        <button type="submit" class="btn btn-primary">save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
