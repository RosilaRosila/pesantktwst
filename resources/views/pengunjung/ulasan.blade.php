@extends('layout-pengunjung.dashboard-ulasan')
@section('container')
<br>
<br>
<br>
<div class="card mt-5" style="width:85%; margin:0 auto">
    <div class="card-header">
        <p class="jdl-ulasan" style="font-size: 20px; font-weight:bold">
            Rating Dan Ulasan
        <p>
    </div>
    <div class="card-body">
        <p><b>Rating Ulasan :</b>
        <div class="star-rating">
            @if ($averageRating)
            @for ($i = 0; $i < floor($averageRating); $i++) <span class="fa fa-star checked"></span>
                @endfor
                @for ($i = floor($averageRating); $i < 5; $i++) <span class="fa fa-star"></span>
                    @endfor
                    ({{ number_format($averageRating, 1) }})
                    @else
                    <span style="color: red;">Rating Belum Tersedia</span>
                    @endif
        </div>
        </p>
        <div class="card mt-5">
            @foreach ($review as $review)
            @if($review->status == 1)
            <table style="border-bottom: 1px solid silver;">
                <tr style="height: 30px;">
                    <th rowspan="3" style="width: 60px; vertical-align: middle; text-align:center">
                        <i class="fas fa-user-circle" style="font-size: 35px; margin:0 auto"></i>
                    </th>
                    <th colspan="2">{{ $review->name }}</th>
                    <!-- <th>Men</th> -->
                </tr>
                <tr>
                    <!-- <td></td> -->
                    <td colspan="2">
                        @for ($i = 0; $i < $review->rating; $i++)
                            <span class="fa fa-star checked" style="font-size: 10px;"></span>
                            @endfor
                            @for ($i = $review->rating; $i < 5; $i++) <span class="fa fa-star" style="font-size: 10px;"></span>
                                @endfor
                    </td>
                </tr>
                <tr style="height: 40px;">
                    <!-- <td></td> -->
                    <td colspan="2" style="font-size: 12px;">{{ $review->review }}</td>
                </tr>
            </table>
            @endif
            @endforeach
        </div>
        <br>
    </div>
    <br>
</div>
<br>
@endsection