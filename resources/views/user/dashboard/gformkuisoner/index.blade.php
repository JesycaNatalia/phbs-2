@extends('user.layouts.udashboard')

@section('title', 'Isi Kuisoner')

@section('style')
<link rel="stylesheet" type="text/css" href="/app-assets/cssku/style.css">
@endsection

@section('content')

<div class="form">
    <center>
        <h3>
            <strong> FORM KUISONER <br> HIDUP BERSIH KELUARGA </strong>
        </h3>
    </center>
</div>
<hr>
<br>
<div class="container">
    <div class="col">
        <div class="row">
            <form action="route('user.dashboard.kirim-form')" method="POST">
            @php $index=0 @endphp
            @foreach($kuisoners as $kuisoner)
                @php $index++ @endphp
                <table>
                    <tr>
                        <td>{{ $index }}. {{ $kuisoner->pertanyaan }}</td>
                    </tr>
                    <tr>
                        <td>
                            @foreach($kuisoner->jawaban as $jawaban)
                            <p><input type='radio' name='kuisoner{{$index}}' value='{{$jawaban->skor}}' required/> {{$jawaban->jawaban}}</p>
                            @endforeach
                        </td>
                    </tr>
                </table>
                @if($kuisoner->penjelasan != null)
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Detail
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Keterangan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            {{$kuisoner->penjelasan}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                @endif
            </div>
            @endforeach
            <input type="text" name="total_skor" id="total_skor" value="0">
            <button class="btn btn-block btn-info">Kirim</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>

    let total_skor = 0
    @php $index=0 @endphp
    @foreach($kuisoners as $kuisoner)
        @php $index++ @endphp
        $('input[type=radio][name=kuisoner{{$index}}]').change(function() {
            total_skor = total_skor + parseFloat($('input[type=radio][name=kuisoner{{$index}}]').val());
            $("#total_skor").val(total_skor);
        });
    @endforeach

    $(document).on("click", ".deleteButton", function() {
        let id = $(this).val();

        $("#deleteForm").attr("action", "{{ route('admin.dashboard.jawaban.index') }}/" + id)
        $("#deleteModal").modal();
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
@endsection