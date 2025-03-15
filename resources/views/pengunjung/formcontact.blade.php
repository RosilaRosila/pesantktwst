@extends('layout-pengunjung.dashboard-ulasan')
@section('container')
<br>
<br>
<br>
<div class="card mt-5" style="width:85%; margin:0 auto">
    <div class="card-header">
        <p style="font-size: 20px; font-weight:bold">
            Hubungi Kami
        <p>
    </div>
    <div class="card-body" style="width: 60%; margin:0 auto">
        <br>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <form action="{{ route('contact_store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="txtname" class="form-label"><b>Nama <span style="color: red;">*</span></b></label>
                <input type="name" class="form-control form-control" id="txtname" name="name" value="{{ Auth::guard('pengunjung')->user()->name }}" readonly>
            </div>
            <div class="form-group mt-5">
                <label for="txtemail" class="form-label"><b>Email <span style="color: red;">*</span></b></label>
                <input type="email" class="form-control form-control" id="txtemail" name="email" value="{{ Auth::guard('pengunjung')->user()->email }}" readonly>
            </div>
            <div class="form-group mt-5">
                <label for="message"><b>Pesan <span style="color: red;">*</span></b></label>
                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
            </div>
            <br>
            <div class="d-grid gap-1 mt-4">
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
        </form>
        <br>
    </div>
    <br>
</div>
<br>
@endsection