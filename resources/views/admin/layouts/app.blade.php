<!DOCTYPE html>
<html lang="en">
@include('admin.layouts.partials.head')


<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('admin.layouts.partials.header')

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->

            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            @include('admin.layouts.partials.sidebar')

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @include('admin.layouts.partials.errors')
                    @yield('content')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->

                @include('admin.layouts.partials.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{ adminVendors('js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ adminVendors('chart.js/Chart.min.js') }}"></script>
    <script src="{{ adminVendors('datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ adminVendors('datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="" {{ adminJs('dataTables.select.min.js') }}"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ adminJs('off-canvas.js') }}"></script>
    <script src="{{ adminJs('hoverable-collapse.js') }}"></script>
    <script src="{{ adminJs('template.js') }}"></script>
    <script src="{{ adminJs('settings.js') }}"></script>
    <script src="{{ adminJs('todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ adminJs('dashboard.js') }}"></script>
    <script src="{{ adminJs('Chart.roundedBarCharts.js') }}"></script>
    <!-- End custom js for this page-->






    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    <script>
        document.querySelectorAll('.ckeditor').forEach(function(textarea) {
            ClassicEditor
                .create(document.querySelector('#' + textarea.id), {
                    // CKEditor configuration options
                    fontColor: {
                        colors: [{
                                color: 'hsl(0, 0%, 0%)',
                                label: 'Black'
                            },
                            {
                                color: 'hsl(0, 0%, 30%)',
                                label: 'Dim grey'
                            },
                            {
                                color: 'hsl(0, 0%, 60%)',
                                label: 'Grey'
                            },
                            {
                                color: 'hsl(0, 0%, 90%)',
                                label: 'Light grey'
                            },
                            {
                                color: 'hsl(0, 0%, 100%)',
                                label: 'White',
                                hasBorder: true
                            },
                            // More colors.
                            // ...
                        ]
                    },
                    fontBackgroundColor: {
                        colors: [{
                                color: 'hsl(0, 75%, 60%)',
                                label: 'Red'
                            },
                            {
                                color: 'hsl(30, 75%, 60%)',
                                label: 'Orange'
                            },
                            {
                                color: 'hsl(60, 75%, 60%)',
                                label: 'Yellow'
                            },
                            {
                                color: 'hsl(90, 75%, 60%)',
                                label: 'Light green'
                            },
                            {
                                color: 'hsl(120, 75%, 60%)',
                                label: 'Green'
                            },
                            // More colors.
                            // ...
                        ]
                    },
                    toolbar: {
                        items: [
                            'exportPDF', 'exportWord', '|',
                            'findAndReplace', 'selectAll', '|',
                            'heading', '|',
                            'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript',
                            'superscript', 'removeFormat', '|',
                            'bulletedList', 'numberedList', 'todoList', '|',
                            'outdent', 'indent', '|',
                            'undo', 'redo', '|',
                            'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight',
                            '|', // Added 'fontColor'
                            'alignment', '|',
                            'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock',
                            'htmlEmbed', '|',
                            'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                            'textPartLanguage', '|',
                            'sourceEditing'
                        ],

                        shouldNotGroupWhenFull: true
                    },
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
    @yield('js')

</body>

</html>
