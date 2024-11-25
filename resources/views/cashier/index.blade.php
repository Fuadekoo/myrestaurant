<x-app-layout>
    <div class="container mx-auto p-6 m-6 bg-slate-400 dark:bg-gray-800">
        <div class="flex justify-center pl-4">
            <div class="container">
                <div class="row" id="table-detail"></div>
                <div class="row justify-content-center py-5">
                    <div class="col-md-5">
                        <button class="btn btn-primary btn-block" id="btn-show-tables">View All Tables</button>
                        <button class="btn btn-secondary btn-block mt-2" id="btn-hide-tables" style="display: none;">Hide Tables</button>
                        <div id="selected-table" class="mt-4"></div>
                    </div>

                    <div class="col-md-7">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                <div class="navbar-nav">
                                    @foreach($categories as $category)
                                        <a class="nav-item nav-link" id="nav-{{ $category->id }}-tab" data-id="{{$category->id}}" data-toggle="tab" href="#nav-{{ $category->id }}" role="tab" aria-controls="nav-{{ $category->id }}" aria-selected="true">{{ $category->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </nav>
                        <div id="list-menu" class="row mt-2 animate__animated animate__fadeIn"></div>

                    </div>
                </div>
            </div>
            <div class="w-full">
                <!-- Main content goes here -->
            </div>
        </div>
    </div>
    <!-- Ensure jQuery is included -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Ensure Bootstrap JS is included -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#btn-show-tables').on('click', function() {
                $.get('/cashier/getTables', function(data) {
                    $('#table-detail').html(data).slideDown();
                    $('#btn-show-tables').hide();
                    $('#btn-hide-tables').show();
                });
            });

            $('#btn-hide-tables').on('click', function() {
                $('#table-detail').slideUp(function() {
                    $('#btn-show-tables').show();
                    $('#btn-hide-tables').hide();
                });
            });


            // load menus by category
            $('.nav-link').on('click', function() {
                let categoryId = $(this).data('id');
                $.get('/cashier/getMenusByCategory/' +$(this).data("id"), function(data) {
                    $('#list-menu').html(data);
                });
            });

            // detect button table onclick to show table data
            // Detect button table onclick to show table data
        $("#table-detail").on("click", ".btn-table", function() {
            var SELECTED_TABLE_ID = $(this).data('id');
            var SELECT_TABLE_NAME = $(this).data('name');
            $('#selected-table').html('<br><h3>Table: ' + SELECT_TABLE_NAME + '</h3>');
        });

        });
    </script>
</x-app-layout>
