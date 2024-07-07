@extends('admin.admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/editartikel.css') }}">
@endsection

@section('content')
    <div class="ctrlarticlecon">
        <div class="judulforarticle">
            Kelola Artikel di Landing Page
        </div>

        <div class="ctrlmainarticle">
            <div class="maintitleart">
                <span>Main Article</span>
            </div>
            <div class="tulisanartmain">
                PILIH ID ARTIKEL UNTUK DITAMPILKAN:
            </div>
            <div class="dropdownmainart">
                <select>
                    <option>Pilih ID Artikel</option>
                </select>
            </div>
        </div>

        <div class="ctrltigaart">
            <div class="tigatitleart">
                <span>Three Article</span>
            </div>

            <div class="tulisantigaart">
                PILIH ID ARTIKEL UNTUK ARTIKEL #1
            </div>
            <div class="dropdowntigaart">
                <select>
                    <option>Pilih ID Artikel #1</option>
                </select>
            </div>

            <div class="tulisantigaart">
                PILIH ID ARTIKEL UNTUK ARTIKEL #2
            </div>
            <div class="dropdowntigaart">
                <select>
                    <option>Pilih ID Artikel #2</option>
                </select>
            </div>

            <div class="tulisantigaart">
                PILIH ID ARTIKEL UNTUK ARTIKEL #3
            </div>
            <div class="dropdowntigaart">
                <select>
                    <option>Pilih ID Artikel #3</option>
                </select>
            </div>
        </div>

        <button class="simpanubahartikel">
            Simpan Perubahan
        </button>
    </div>
@endsection
