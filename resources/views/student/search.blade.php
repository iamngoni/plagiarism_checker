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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <h6>Looking for past papers 🤲? We've got you covered here 👉</h6>
                            </div>
                            <div class="col-md-6">
                                <div class="row float-right">
                                    <div class="col-md-7">
                                        <input type="text" name="query" value="{{ $query }}" class="form-control" placeholder="Analysis of Algorithms using AI">
                                    </div>
                                    <div class="col-md-5">
                                        <input type="submit" value="Search" class="btn btn-success">
                                    </div>
                                </div>
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
                        {{ $query }} | Related Files
                        <button class="float-right btn btn-success fw-bold" data-toggle="modal" data-target="#file-upload-modal">Upload Document</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless table-striped">
                                <thead>
                                <tr class="text-uppercase font-size-11 text-muted">
                                    <th>Title</th>
                                    <th>Original Document</th>
                                    <th>Uploaded (For Checking)</th>
                                    <th>Processed</th>
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

    <div class="modal" id="file-upload-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Upload Document</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('student.upload') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Document Title</label>
                            <input type="text" class="form-control" name="title" id="title" required placeholder="e.g. Analysis of Algorithms">
                        </div>
                        <div class="form-group">
                            <label for="title">Document (word | pdf)</label>
                            <input type="file" name="document" id="title" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success fw-bold">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
