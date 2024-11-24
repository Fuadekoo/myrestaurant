<x-app-layout>
    <div class="container mx-auto p-6 m-6 bg-slate-400 dark:bg-gray-800">
        <div class="flex justify-center pl-4">
            <div class="container">
                <div class="row" id="table-detail"></div>
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <button class="btn btn-primary btn-block" id="btn-show-tables">View All Tables</button>
                        <button class="btn btn-secondary btn-block mt-2" id="btn-hide-tables" style="display: none;">Hide Tables</button>
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
        });
    </script>
</x-app-layout>
