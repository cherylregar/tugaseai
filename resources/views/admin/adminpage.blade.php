@extends('admin.admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
    <div class="container">
        
        <div class="bjcon1">
            <div class="jenisdijual">
                <!-- Section for Kertas -->
                @isset($sampahKertas)
                    <div class="concontainer">
                        <div class="rectangle1">
                            @if ($sampahKertas && file_exists(public_path('storage/fotos/' . $sampahKertas->foto)))
                                <img src="{{ asset('storage/fotos/' . $sampahKertas->foto) }}" alt="{{ $sampahKertas->nmSampah }}" class="foto-sampah">
                            @else
                                <p>Foto tidak tersedia</p>
                            @endif
                        </div>
                        <div class="rectanglea">
                            <span class="tulisanjenis">{{ $sampahKertas->nmSampah }} | {{ $sampahKertas->idSampah }}</span>
                            <div class="btn-circle">
                                <a href="{{ route('editsampahjual', $sampahKertas->idSampah) }}" class="btn btn-primary">
                                    <i class="fas fa-pencil-alt" style="color:white;"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endisset

                <!-- Section for Kardus -->
                @isset($sampahKardus)
                    <div class="concontainer">
                        <div class="rectangle1">
                            @if ($sampahKardus && file_exists(public_path('storage/fotos/' . $sampahKardus->foto)))
                                <img src="{{ asset('storage/fotos/' . $sampahKardus->foto) }}" alt="{{ $sampahKardus->nmSampah }}" class="foto-sampah">
                            @else
                                <p>Foto tidak tersedia</p>
                            @endif
                        </div>
                        <div class="rectanglea">
                            <span class="tulisanjenis">{{ $sampahKardus->nmSampah }} | {{ $sampahKardus->idSampah }}</span>
                            <div class="btn-circle">
                                <a href="{{ route('editsampahjual', $sampahKardus->idSampah) }}" class="btn btn-primary">
                                    <i class="fas fa-pencil-alt" style="color:white;"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endisset

                <!-- Section for Plastik -->
                @isset($sampahPlastik)
                    <div class="concontainer">
                        <div class="rectangle1">
                            @if ($sampahPlastik && file_exists(public_path('storage/fotos/' . $sampahPlastik->foto)))
                                <img src="{{ asset('storage/fotos/' . $sampahPlastik->foto) }}" alt="{{ $sampahPlastik->nmSampah }}" class="foto-sampah">
                            @else
                                <p>Foto tidak tersedia</p>
                            @endif
                        </div>
                        <div class="rectanglea">
                            <span class="tulisanjenis">{{ $sampahPlastik->nmSampah }} | {{ $sampahPlastik->idSampah }}</span>
                            <div class="btn-circle">
                                <a href="{{ route('editsampahjual', $sampahPlastik->idSampah) }}" class="btn btn-primary">
                                    <i class="fas fa-pencil-alt" style="color:white;"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endisset
            </div>
            <div class="keterangan">*Sampah yang sedang ditampilkan di Landing Page</div>
        </div>

        <!-- Table Display -->
        <div class="bjcon2">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID Sampah</th>
                            <th>Nama Sampah</th>
                            <th>Poin Jual</th>
                            <th>Foto</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sampahItems as $sampah)
                        <tr>
                            <td>{{ $sampah->idSampah }}</td>
                            <td>{{ $sampah->nmSampah }}</td>
                            <td>{{ $sampah->poinjual }}</td>
                            <td>
                                @if ($sampah->foto)
                                    <img src="{{ asset('storage/fotos/' . $sampah->foto) }}" alt="{{ $sampah->nmSampah }}" width="50">
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>{{ $sampah->created_at }}</td>
                            <td>{{ $sampah->updated_at }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Actions">
                                    <a href="{{ route('editsampahjual', $sampah->idSampah) }}" class="btn btn-primary">
                                        <i class="fas fa-pencil-alt" style="color:white;"></i>
                                    </a>
                                    <form action="{{ route('sampahjual.destroy', $sampah->idSampah) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash-alt" style="color:white;"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
