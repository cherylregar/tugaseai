<!-- resources/views/hasilevent.blade.php -->

@extends('layouts.main')

@section('title', 'Hasil')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/daftarevent.css') }}">
@endsection

@section('content')
    <div class="conformevent">
        <div class="logodanajakan">
            <div class="logowmevent"><img src="{{ asset('images/WM LOGO WHITE.png') }}" alt="WM Logo"></div>
            <div class="tulisaneventajak">Hasil Event Anda untuk <span id="KonsumsiYangBertanggungJawab">Konsumsi Yang Bertanggung Jawab</span></div>
        </div>
        <div class="form-container">
            <div class="form-group">
                <div class="usernameevent">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" value="{{ $event->username }}" readonly>
                </div>
                <div class="idevent">
                    <label for="idEvent">ID Event:</label>
                    <input type="text" id="idEvent" name="idEvent" value="{{ $event->idEvent }}" readonly>
                </div>
            </div>
            <div class="form-group">
                <div class="namaevent">
                    <label for="nmEvent">Nama Event:</label>
                    <input type="text" id="nmEvent" name="nmEvent" value="{{ $event->nmEvent }}" readonly>
                </div>
            </div>
            <div class="form-group">
                <div class="tanggalevent">
                    <label for="tglEvent">Tanggal Event:</label>
                    <input type="date" id="tglEvent" name="tglEvent" value="{{ $event->tglEvent }}" readonly>
                </div>
                <div class="tempatevent">
                    <label for="TempatEvent">Tempat Event:</label>
                    <input type="text" id="TempatEvent" name="TempatEvent" value="{{ $event->TempatEvent }}" readonly>
                </div>
            </div>
            <div class="form-group">
                <div class="jumlah">
                    <label for="JumlahPeserta">Jumlah Peserta:</label>
                    <input type="number" id="JumlahPeserta" name="JumlahPeserta" value="{{ $event->JumlahPeserta }}" readonly>
                </div>
                <div class="jam">
                    <div class="jammulai">
                        <label for="JamMulai">Jam Mulai:</label>
                        <input type="time" id="JamMulai" name="JamMulai" value="{{ $event->JamMulai }}" readonly>
                    </div>
                    <div class="jamselesai">
                        <label for="JamBerakhir">Jam Berakhir:</label>
                        <input type="time" id="JamBerakhir" name="JamBerakhir" value="{{ $event->JamBerakhir }}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
