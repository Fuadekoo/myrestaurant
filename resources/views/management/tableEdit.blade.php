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
                    <form action="/management/table/{{$table->id}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="categoryName">Table name</label>
                            <input type="text" name="name" id="name" value="{{$table->name}}" class="form-control" placeholder="table...">
                        </div>
                        <button type="submit" class="btn btn-primary">update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
