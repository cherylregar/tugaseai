<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Event</title>
    <link rel="stylesheet" href="{{ asset('css/daftarevent.css') }}">
</head>
<body>
    <div class="logodanajakan">
        <div class="logowmevent"><img src="{{ asset('images/WM LOGO WHITE.png') }}" alt="Logo"></div>
        <div class="tulisaneventajak">Ayo Daftarkan Event Kamu di Waste Management Event</div>
    </div>
    <div class="conformevent">
        <div class="pastikan">Pastikan data yang Anda masukkan <span>benar</span> dan <span>valid</span></div>
        <div class="form-container">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <form action="{{ route('events.store') }}" method="POST" onsubmit="return validatePelanggan()">
                @csrf
                <div class="form-group">
                    <div class="idpelanggan">
                        <label for="idPelanggan">ID Pelanggan</label>
                        <input type="text" name="idPelanggan" id="idPelanggan" placeholder="Masukkan ID Pelanggan" required>
                    </div>
                    <div class="idevent">
                        <label for="idEvent">ID Event</label>
                        <input type="text" name="idEvent" value="{{ $newEventId }}" required readonly>
                    </div>
                </div>
                <div class="form-group">
                    <div class="namaevent">
                        <label for="nmEvent">Nama Event</label>
                        <input type="text" name="nmEvent" placeholder="Masukkan Nama Event" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="tanggalevent">
                        <label for="tglEvent">Tanggal Event</label>
                        <input type="date" name="tglEvent" placeholder="Pilih Tanggal Event" required
                               min="{{ date('Y-m-d') }}">
                    </div>
                    <div class="tempatevent">
                        <label for="TempatEvent">Tempat Event</label>
                        <input type="text" name="TempatEvent" placeholder="Masukkan Tempat Event" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="jumlah">
                        <label for="JumlahPeserta">Jumlah Peserta</label>
                        <input type="number" name="JumlahPeserta" placeholder="Masukkan Jumlah Peserta" required>
                    </div>
                    <div class="jam">
                        <div class="jammulai">
                            <label for="JamMulai">Jam Mulai</label>
                            <input type="time" name="JamMulai" required>
                        </div>
                        <div class="jamselesai">
                            <label for="JamBerakhir">Jam Berakhir</label>
                            <input type="time" name="JamBerakhir" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="daftarkan-event">Daftarkan Event</button>
            </form>
        </div>
    </div>

    <script>
        function validatePelanggan() {
            var idPelanggan = document.getElementById('idPelanggan').value;
            
            // Lakukan validasi atau periksa apakah idPelanggan ada di database Pelanggan
            // Di sini bisa menggunakan AJAX untuk melakukan pengecekan asinkron
            
            // Contoh sederhana dengan kondisi statis, bisa disesuaikan dengan implementasi sesungguhnya
            if (idPelanggan !== 'pelanggan_001') { // Ganti dengan kondisi yang sesuai dengan implementasi Anda
                alert('ID Pelanggan tidak ditemukan.');
                return false; // Batalkan submit form
            }
            return true; // Lanjutkan submit form
        }
    </script>
</body>
</html>
