<!-- resources/views/admin/editdatasetorevent.blade.php -->

@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Setor Sampah</h2>

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Success message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('setorsampah.update', $eventSampah->idEvent) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="idWPal">ID WPal:</label>
            <input type="text" class="form-control" id="idWPal" name="idWPal" value="{{ old('idWPal', $eventSampah->idWPal) }}" required>
        </div>

        <div class="form-group">
            <label for="idSampah">ID Sampah:</label>
            <input type="text" class="form-control" id="idSampah" name="idSampah" value="{{ old('idSampah', $eventSampah->idSampah) }}" required>
        </div>

        <div class="form-group">
            <label for="jumlahKilo">Jumlah Kilo:</label>
            <input type="number" class="form-control" id="jumlahKilo" name="jumlahKilo" value="{{ old('jumlahKilo', $eventSampah->jumlahKilo) }}" required>
        </div>

        <div class="form-group">
            <label for="statusSetor">Status Setor:</label>
            <input type="text" class="form-control" id="statusSetor" name="statusSetor" value="{{ old('statusSetor', $eventSampah->statusSetor) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
