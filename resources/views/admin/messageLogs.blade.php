@extends('components.admin-components.admin-layout')

@push('assets')
    <link rel="stylesheet" href="/css/admin-css/admin-message.css">

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.bootstrap5.js"></script>
    <script src="js/data-table.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.1/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.html5.min.js"></script>
@endpush

@section('content')
    <div class="table-header">
        <div class="col">
            <x-admin-components.admin-page-title>Message Logs</x-admin-components.page-title>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/message">Send Message</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Message Logs</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="table-container">
        @if(!empty($messages))
            <table class="table" id="message">
                <thead class="table-dark">
                    <tr>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Sent At</th>
                        <th>Date sent</th>
                        {{-- <th></th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                    <tr>
                        <td>{{ $message['message'] }}</td>
                        <td>{{ $message['status'] }}</td>
                        <td>{{ $message['recipient'] }}</td> 
                        <td style="text-align: start">{{ \Carbon\Carbon::parse($message['created_at'])->format('F j, Y, g:i A') }}</td>
                        {{-- <td>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#{{ $message['message_id'] }}">Delete</button>
                        </td> --}}
                    </tr>
                @endforeach
                
                </tbody>
            </table>
        @else
        <p>No messages found.</p>
        @endif
    </div>  
@endsection
@push('footer')
    <x-admin-components.admin-footer/>
@endpush
@push('scripts')
    <script>
        new DataTable('#message', {
            
            language: {
                buttons: {
                    selectAll: 'Select all items',
                    selectNone: 'Select none'
                }
            },
        });
    </script>
@endpush