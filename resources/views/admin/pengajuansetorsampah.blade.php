<!-- resources/views/admin/pengajuansetorsampah.blade.php -->

@extends('admin.admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/kelolasetorsampah.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="table-container">
            <h2>Pengajuan Setor Sampah</h2>
            
            <!-- Display success message -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Display error message -->
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID Event</th>
                        <th>ID Wastepal</th>
                        <th>ID Sampah</th>
                        <th>Jumlah Kilo</th>
                        <th>Status Setor</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($eventWastepalsSampah as $eventSampah)
                        <tr>
                            <td>{{ $eventSampah->idEvent }}</td>
                            <td>{{ $eventSampah->idWPal }}</td>
                            <td>{{ $eventSampah->idSampah }}</td>
                            <td>{{ $eventSampah->jumlahKilo }}</td>
                            <td>{{ $eventSampah->statusSetor }}</td>
                            <td>
                                <a href="{{ route('setorsampah.edit', $eventSampah->idEvent) }}" class="btn btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('setorsampah.delete', $eventSampah->idEvent) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
