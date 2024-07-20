<!DOCTYPE html>
<html>
<head>
    <title>Edit Event</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Event</h2>
    <form action="{{ route('event.update', $event->idEvent) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="idPelanggan">ID Pelanggan</label>
            <input type="text" class="form-control" id="idPelanggan" name="idPelanggan" value="{{ $event->idPelanggan }}" required>
        </div>
        <div class="form-group">
            <label for="nmEvent">Nama Event</label>
            <input type="text" class="form-control" id="nmEvent" name="nmEvent" value="{{ $event->nmEvent }}" required>
        </div>
        <div class="form-group">
            <label for="tglEvent">Tanggal Event</label>
            <input type="date" class="form-control" id="tglEvent" name="tglEvent" value="{{ $event->tglEvent }}" required>
        </div>
        <div class="form-group">
            <label for="TempatEvent">Tempat Event</label>
            <input type="text" class="form-control" id="TempatEvent" name="TempatEvent" value="{{ $event->TempatEvent }}" required>
        </div>
        <div class="form-group">
            <label for="JumlahPeserta">Jumlah Peserta</label>
            <input type="number" class="form-control" id="JumlahPeserta" name="JumlahPeserta" value="{{ $event->JumlahPeserta }}" required>
        </div>
        <div class="form-group">
            <label for="JamMulai">Jam Mulai</label>
            <input type="time" class="form-control" id="JamMulai" name="JamMulai" value="{{ $event->JamMulai }}" required>
        </div>
        <div class="form-group">
            <label for="JamBerakhir">Jam Berakhir</label>
            <input type="time" class="form-control" id="JamBerakhir" name="JamBerakhir" value="{{ $event->JamBerakhir }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Event</button>
    </form>
</div>
</body>
</html>
