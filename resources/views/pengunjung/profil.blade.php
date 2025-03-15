@extends('layout-pengunjung.dashboard-ulasan')
@section('container')
<br>
<br>
<br>
<div class="card mt-5" style="width:85%; margin:0 auto">
    <div class="card-header">
        <p style="font-size: 20px; font-weight:bold">
            Profil Pengunjung
        <p>
    </div>
    <div class="card-body">
        <br>
        <div class="card">
            <div class="col-sm text-center">
                <img src="{{ asset('/') }}images/profile-picture.png" height="90" alt="" style="margin-bottom: 20px; margin-top: 20px">
            </div>
            <div class="col-sm">
                <div class="card-body ">
                    <div class="card">
                        <!-- <div class="card-header">
                            <h5 class="card-title">{{ Auth::guard('pengunjung')->user()->name }}</h5>
                        </div> -->
                        <div class="col">
                            <div class="mb-2 text-sm mt-3">
                                <label class="form-label" style="font-weight: bold;">Nama : </label>
                                <input class="form-control" value="{{ Auth::guard('pengunjung')->user()->name }}" readonly>
                            </div>
                        </div>
                        <br>
                        <div class="col">
                            <div class="mb-4 text-sm">
                                <label class="form-label" style="font-weight: bold;">Email</label>
                                <input class="form-control" value="{{ Auth::guard('pengunjung')->user()->email }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>
<br>
@endsection