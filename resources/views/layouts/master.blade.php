<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="/css/app.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('partials.navbar.navbar')
        @include('partials.sidebar.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('pageTitle')</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        @if (Session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @elseif (Session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                        @yield('content')
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        @include('partials.footer.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ mix('js/app.js') }}"></script>
    <!-- Charting library -->
    <script src="https://unpkg.com/chart.js@^2.9.3/dist/Chart.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                language: {
                    url: '/DataTable/DataTable_Fr.json'
                }
            } );
        } );
    </script>
    @stack('scripts')
</body>

</html>
