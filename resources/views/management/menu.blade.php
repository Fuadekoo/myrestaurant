<x-app-layout>
    <div class="container mx-auto p-6 m-6 bg-slate-400 dark:bg-gray-800">
        <div class="flex justify-center pl-4">
            @include('mycomponent.sidebar')
            <div class="w-full p-6 bg-gray-100 dark:bg-gray-900">
                <!-- Main content goes here -->
                <div class="col-md-8 justify-center">
                    <i class="fas fa-align-justify"></i>Menu
                    <a href="/management/menu/create" class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i>Create Menu</a>
                    <hr class="mb-4 p-1">
                    @if(Session()->has('status'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-bs-dismiss="alert">x</button>
                            {{Session()->get('status')}}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Picture</th>
                                <th scope="col">Description</th>
                                <th scope="col">Category</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($menus as $menu)
                                <tr>
                                    <th scope="row">{{$menu->id}}</th>
                                    <td>{{$menu->name}}</td>
                                    <td>{{$menu->price}}</td>
                                    <td><img src="{{ asset('menu_images') }}/{{$menu->image}}" alt="{{$menu->name}}" width="120"></td>
                                    <td>{{$menu->description}}</td>
                                    <td>{{$menu->category->name}}</td>
                                    <td><a href="/management/menu/{{$menu->id}}/edit" class="btn btn-warning">Edit</a></td>
                                    <td>
                                        <form action="/management/menu/{{$menu->id}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Delete" class="btn btn-danger">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
