<!-- resources/views/daftarevent.blade.php -->

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
        <div class="logowmevent"><img src="{{ asset('images/WM LOGO WHITE.png') }}" alt="WM Logo"></div>
        <div class="tulisaneventajak">Daftarkan Event Anda untuk <span id="KonsumsiYangBertanggungJawab">Konsumsi Yang Bertanggung Jawab</span></div>
    </div>
    <div class="conformevent">
        <form action="{{ url('/daftarevent') }}" method="POST">
            @csrf <!-- CSRF Token -->
            <div class="form-container">
                <div class="form-group">
                    <div class="usernameevent">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" value="{{ old('username') }}" required>
                    </div>
                    <div class="idevent">
                        <label for="idEvent">ID Event:</label>
                        <input type="text" id="idEvent" name="idEvent" value="{{ old('idEvent') }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="namaevent">
                        <label for="nmEvent">Nama Event:</label>
                        <input type="text" id="nmEvent" name="nmEvent" value="{{ old('nmEvent') }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="tanggalevent">
                        <label for="tglEvent">Tanggal Event:</label>
                        <input type="date" id="tglEvent" name="tglEvent" value="{{ old('tglEvent') }}" required>
                    </div>
                    <div class="tempatevent">
                        <label for="TempatEvent">Tempat Event:</label>
                        <input type="text" id="TempatEvent" name="TempatEvent" value="{{ old('TempatEvent') }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="jumlah">
                        <label for="JumlahPeserta">Jumlah Peserta:</label>
                        <input type="number" id="JumlahPeserta" name="JumlahPeserta" value="{{ old('JumlahPeserta') }}" required>
                    </div>
                    <div class="jam">
                        <div class="jammulai">
                            <label for="JamMulai">Jam Mulai:</label>
                            <input type="time" id="JamMulai" name="JamMulai" value="{{ old('JamMulai') }}" required>
                        </div>
                        <div class="jamselesai">
                            <label for="JamBerakhir">Jam Berakhir:</label>
                            <input type="time" id="JamBerakhir" name="JamBerakhir" value="{{ old('JamBerakhir') }}" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
