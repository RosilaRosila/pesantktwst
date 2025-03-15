@extends('layout-pengunjung.dashboard-ulasan')
@section('container')
<br>
<br>
<br>


<br>
<div class="card mt-5" style="width:50%; margin:0 auto; font-size:12px">

    @if ($message = Session::get('success'))
    <div class="mt-4 mb-4">
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    </div>
    @endif

    <div class="card-header">
        <a class="navbar-brand" href="{{ route('pesanan_selesai') }}/" style="font-size: 3vh; ">
            <i class="fas fa-arrow-circle-left"></i>
        </a>
        <span class="hdr">Beri Penilaian dan Review</span>
    </div>
    <div class="card-body">
        <br>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('review.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="txtname" class="form-label"><b>Nama Tempat Wisata<span style="color: red;">*</span></b></label>
                        <input type="text" class="form-control" value="{{ $wisata9->title }}" readonly style="font-size: 12px;">
                        <!-- Hidden input to store the datawisataid in the form -->
                        <input type="hidden" name="datawisataid" value="{{ $wisata9->id }}">
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="txtname" class="form-label"><b>Nama <span style="color: red;">*</span></b></label>
                                <input type="name" class="form-control form-control" id="txtname" name="name" value="{{ Auth::guard('pengunjung')->user()->name }}" readonly style="font-size: 10px;">
                            </div>
                            <div class="form-group">
                                <label for="txtemail" class="form-label"><b>Email <span style="color: red;">*</span></b></label>
                                <input type="email" class="form-control form-control" id="txtemail" name="email" value="{{ Auth::guard('pengunjung')->user()->email }}" readonly style="font-size: 10px;">
                            </div>
                            <div class="form-group mt-4">
                                <label for="rating"><b>Rating <span style="color: red;">*</span> : &nbsp </b></label>
                                <div class="star-rating" id="rating" style="font-size: 12px;">
                                    <i class="fas fa-star" data-value="1"></i>
                                    <i class="fas fa-star" data-value="2"></i>
                                    <i class="fas fa-star" data-value="3"></i>
                                    <i class="fas fa-star" data-value="4"></i>
                                    <i class="fas fa-star" data-value="5"></i>
                                </div>
                                <input type="hidden" name="rating" id="rating-value" required>
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="txtreview" class="form-label"><b>Masukan Ulasan Anda <span style="color: red;">*</span></b></label>
                                <textarea type="text" class="form-control form-control" id="txtreview" placeholder="Masukan Ulasan Anda" name="review" style="height: 150px; font-size: 10px;"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="d-grid gap-1 mt-4">
                            <button type="submit" class="btn btn-primary">Kirim Review</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>
</div>
<br>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Saat bintang diklik
        $('.star-rating .fa-star').on('click', function() {
            var rating = $(this).data('value');
            $('#rating-value').val(rating);

            // Reset tampilan bintang
            $('.fa-star').removeClass('checked');

            // Tambahkan class 'checked' pada bintang yang dipilih
            $(this).addClass('checked');
            $(this).prevAll().addClass('checked');
        });
    });
</script>
@endsection