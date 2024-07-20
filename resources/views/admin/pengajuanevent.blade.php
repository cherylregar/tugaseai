@extends('admin.admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/kelolaevent.css') }}">
@endsection

@section('content')
    <div class="container">
    <div class="tabelevent">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID Event</th>
                <th>Nama Event</th>
                <th>Tanggal Event</th>
                <th>Tempat Event</th>
                <th>Jumlah Peserta</th>
                <th>Jam Mulai</th>
                <th>Jam Berakhir</th>
                <th>ID Pelanggan</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Hapus</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{ $event->idEvent }}</td>
                    <td>{{ $event->nmEvent }}</td>
                    <td>{{ $event->tglEvent }}</td>
                    <td>{{ $event->TempatEvent }}</td>
                    <td>{{ $event->JumlahPeserta }}</td>
                    <td>{{ $event->JamMulai }}</td>
                    <td>{{ $event->JamBerakhir }}</td>
                    <td>{{ $event->idPelanggan }}</td>
                    <td>{{ $event->status }}</td>
                    <td>
                        <a href="{{ route('event.edit', $event->idEvent) }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('event.delete', $event->idEvent) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
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
