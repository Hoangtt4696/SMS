<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>S.M.S - @yield('title')</title>
    <meta href="{{asset('')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/scss/style.css">
    <link rel="stylesheet" href="/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="/css/lib/chosen/chosen.min.css">
    <link rel="stylesheet" href="/css/styles.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <script src="/js/vendor/jquery-2.1.4.min.js"></script>
</head>
<body>
    @yield('sidebar')

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        @yield('header')
        <!-- Header-->

        @yield('content')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="/js/plugins.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="/js/dashboard.js"></script>

    <script src="/js/lib/data-table/datatables.min.js"></script>
    <script src="/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="/js/lib/data-table/buttons.print.min.js"></script>
    <script src="/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="/js/lib/data-table/datatables-init.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable({
                language: {
                    paginate: {
                        next: 'Trang sau', // or '→'
                        previous: 'Trang trước' // or '←'
                    }
                }
            });
        } );
    </script>

    <script src="/js/lib/chosen/chosen.jquery.min.js"></script>
    <script>
        jQuery(document).ready(function() {
            jQuery(".standardSelect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%"
            });
        });
    </script>

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('ckfinder/ckfinder.js') }}"></script>
    <script> CKEDITOR.replace('description'); </script>

    <script src="/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="/js/lib/chart-js/chartjs-init.js"></script>
    @yield('script')
</body>
</html>