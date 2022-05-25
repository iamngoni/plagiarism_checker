@extends('layouts.app')

@section('content')
    <!-- begin::page loader-->
    <div class="page-loader">
        <div class="spinner-border"></div>
    </div>

    @include('layouts.partials.header')

    <!-- begin::main content -->
    <main class="main-content">

        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h2 class="font-weight-bold mb-2">{{ $allFiles }}</h2>
                                <h6 class="text-uppercase font-size-11 mb-2 text-primary font-weight-bold">Files Uploaded</h6>
                                <p class="m-0 small text-muted">Plagiarism Checker.</p>
                            </div>
                            <div>
                                <span class="dashboard-pie-1">2/5</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h2 class="font-weight-bold mb-2">{{ $processed }}</h2>
                                <h6 class="text-uppercase font-size-11 mb-2 text-success font-weight-bold">Processed Uploads</h6>
                                <p class="m-0 small text-muted">Plagiarism Checker.</p>
                            </div>
                            <div>
                                <span class="dashboard-pie-2">4/5</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h2 class="font-weight-bold mb-2">{{ $pending }}</h2>
                                <h6 class="text-uppercase font-size-11 mb-2 text-warning font-weight-bold">Pending Processing</h6>
                                <p class="m-0 small text-muted">Plagiarism Checker.</p>
                            </div>
                            <div>
                                <span class="dashboard-pie-3">1/5</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h2 class="font-weight-bold mb-2">0</h2>
                                <h6 class="text-uppercase font-size-11 mb-2 text-info font-weight-bold">Processing Failed</h6>
                                <p class="m-0 small text-muted">Plagiarism Checker.</p>
                            </div>
                            <div>
                                <span class="dashboard-pie-4">2/5</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Student Files
                        <button class="float-right btn btn-success text-bold">Upload File</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                <tr class="text-uppercase font-size-11 text-muted">
                                    <th>Title</th>
                                    <th>Uploaded</th>
                                    <th>Processed</th>
                                    <th>Results</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($files as $file)
                                        <tr>
                                            <td>
                                                {{ $file->title }}
                                            </td>
                                            <td>False</td>
                                            <td>
                                                False
                                            </td>
                                            <td>None</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">No files</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <!-- end::main content -->

    <div class="colors"> <!-- To use theme colors with Javascript -->
        <div class="bg-primary"></div>
        <div class="bg-primary-bright"></div>
        <div class="bg-secondary"></div>
        <div class="bg-secondary-bright"></div>
        <div class="bg-info"></div>
        <div class="bg-info-bright"></div>
        <div class="bg-success"></div>
        <div class="bg-success-bright"></div>
        <div class="bg-danger"></div>
        <div class="bg-danger-bright"></div>
        <div class="bg-warning"></div>
        <div class="bg-warning-bright"></div>
    </div>
@endsection
