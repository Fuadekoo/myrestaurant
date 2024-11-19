<x-app-layout>
    <div class="container mx-auto p-6 m-6 bg-slate-400 dark:bg-gray-800">
        <div class="flex justify-center pl-4">
            @include('mycomponent.sidebar')
            <div class="w-full p-6 bg-gray-100 dark:bg-gray-900">
                <!-- Main content goes here -->
                <div class="col-md-8 justify-center ">
                    <i class="fas fa-align-justify"></i>Category
                    <a href="/management/category/create" class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i>Create</a>
                    <hr>
                    @if(Session()->has('status'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-bs-dismiss="alert">X</button>
                            {{Session()->get('status')}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
