<x-app-layout>
    <div class="container mx-auto p-6 m-6 bg-slate-400 dark:bg-gray-800">
        <div class="flex justify-center pl-4">
            @include('mycomponent.sidebar')
            <div class="w-full p-6 bg-gray-100 dark:bg-gray-900">
                <!-- Main content goes here -->
                <div class="col-md-8 justify-center">
                    <i class="fas fa-align-justify"></i>Menu
                    <a href="/management/table/create" class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i>Create Table</a>
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
                                <th scope="col">Table</th>
                                <th scope="col">Status</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tables as $table)
                                <tr>
                                    <th scope="row">{{$table->id}}</th>
                                    <td>{{$table->name}}</td>
                                    <td>{{$table->status}}</td>
                                    <td><a href="/management/table/{{$table->id}}/edit" class="btn btn-warning">Edit</a></td>
                                    <td>
                                        <form action="/management/table/{{$table->id}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Delete" class="btn btn-danger">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{-- {{$menus->links()}} --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
