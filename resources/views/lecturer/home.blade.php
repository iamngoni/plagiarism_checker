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
                        Student Documents
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless table-striped">
                                <thead>
                                <tr class="text-uppercase font-size-11 text-muted">
                                    <th>Title</th>
                                    <th>Original Document</th>
                                    <th>Uploaded To CopyLeaks (For Checking)</th>
                                    <th>Processed By CopyLeaks</th>
                                    <th>Request For Export</th>
                                    <th>Has Results</th>
                                    <th>Failure Status</th>
                                    <th>Lecturer Approved</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($files as $file)
                                    <tr>
                                        <td>
                                            {{ $file->title }}
                                        </td>
                                        <td>
                                            <a href="{{ route('copyleaks.download', ['id' => $file->id]) }}" class="btn btn-success fw-bold text-white"><i class="fa fa-download"></i></a>
                                        </td>
                                        <td>
                                            @if ($file->uploaded == 1)
                                                <span class="badge badge-pill badge-success">uploaded</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">not yet</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($file->processed == 1)
                                                <span class="badge badge-pill badge-success">processed</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">not yet</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($file->requested_for_export == 1)
                                                <span class="badge badge-pill badge-success"><i class="fa fa-check text-white"></i></span>
                                            @else
                                                @if ($file->processed == 1)
                                                    <a href="{{ route('copyleaks.exports', ['id' => $file->id]) }}" class="btn btn-success text-white">Request For Export</a>
                                                @else
                                                    <span class="badge badge-pill badge-danger">Processing Not Complete</span>
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            @if ($file->export_html_result == null)
                                                <span>N/A</span>
                                            @else
                                                <a href="{{ route('copyleaks.results', ['id' => $file->id]) }}">View Results</a>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($file->failed == 1)
                                                <span class="badge badge-pill badge-danger">Failed to Process</span>
                                            @else
                                                <span class="badge badge-pill badge-success">Okay</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($file->approved == 1)
                                                <span class="badge badge-pill badge-success">
                                                        <i class="fa fa-check text-white"></i>
                                                    </span>
                                            @else
                                                <span class="badge badge-pill badge-danger">
                                                        <i class="fa fa-close text-white"></i>
                                                    </span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8">No files</td>
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
