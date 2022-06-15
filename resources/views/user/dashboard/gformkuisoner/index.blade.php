@extends('user.layouts.udashboard')

@section('title', 'Tabel Jawaban')

@section('style')
<link href="{{ asset('/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endsection

@section('content')

<center>
    <h3>FORM KUISONER HIDUP BERSIH</h3>
</center>
<br>
<div class="container">
    <div class="col">
        <div class="row">

            <form action="">
                <table>
                    <tr>
                        <td>1. apakah apakah?</td>
                    </tr>
                    <tr>
                        <td>
                            <p><input type='radio' name='jenis_kelamin' value='pria' /> Rutin</p>
                            <p><input type='radio' name='jenis_kelamin' value='perempuan' /> Jarang</p>
                            <p><input type='radio' name='jenis_kelamin' value='perempuan' /> Tidak</p>
                        </td>
                    </tr>

                    <tr>
                        <td>1. apakah apakah?</td>
                    </tr>
                    <tr>
                        <td>
                            <p><input type='radio' name='jenis_kelamin' value='pria' /> Rutin</p>
                            <p><input type='radio' name='jenis_kelamin' value='perempuan' /> Jarang</p>
                            <p><input type='radio' name='jenis_kelamin' value='perempuan' /> Tidak</p>
                        </td>
                    </tr>
                    <tr>
                        <td>1. apakah apakah?</td>
                    </tr>
                    <tr>
                        <td>
                            <p><input type='radio' name='jenis_kelamin' value='pria' /> Rutin</p>
                            <p><input type='radio' name='jenis_kelamin' value='perempuan' /> Jarang</p>
                            <p><input type='radio' name='jenis_kelamin' value='perempuan' /> Tidak</p>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).on("click", ".deleteButton", function() {
        let id = $(this).val();

        $("#deleteForm").attr("action", "{{ route('admin.dashboard.jawaban.index') }}/" + id)
        $("#deleteModal").modal();
    });
</script>
@endsection