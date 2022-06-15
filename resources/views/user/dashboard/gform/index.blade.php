@extends('user.layouts.dashboard')

@section('title', 'Tabel Jawaban')

@section('style')
@endsection

@section('content')

<form>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Apakah kamu manusia</label>
        <button type="submit" class="btn btn-primary">YA</button>
        <button type="submit" class="btn btn-primary">TIDAK</button>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Jarang</label>
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Jarang</label>
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Jarang</label>
        </div>
    </div>
</form>

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