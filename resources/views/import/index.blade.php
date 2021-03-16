@extends('layout')
@section('content')
<div class="alerts">
    @if($errors->any())
        <div class="alert alert-danger mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<form method="post" enctype="multipart/form-data" action="{{ route('import.store') }}">
        @csrf
    <div class="col">
        <div class="row mt-5">
            <label for="first_file" class="h5 font-weight-bold text-uppercase">Import pliku 1</label>
            <input type="file" name="first_file" class="form-control-file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
            <label for="first_number" class="col-sm col-form-label">Wybierz kolumne <b>Źródłowy</b> pierwszego pliku</label>
            <input type="text" id="first_number" class="form-control" name="first_number" placeholder="np. B" maxlength="1">
            <label for="first_brutto" class="col-sm col-form-label">Wybierz kolumne <b>Brutto</b> pierwszego pliku</label>
            <input type="text" id="first_brutto" class="form-control" name="first_brutto" placeholder="np. C" maxlength="1">
        </div>
        <div class="row mt-5">
            <label for="second_file" class="h5 font-weight-bold text-uppercase">Import pliku 2</label>
            <input type="file" name="second_file" class="form-control-file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
            <label for="second_number" class="col-sm col-form-label">Wybierz kolumne <b>Źródłowy</b> drugiego pliku</label>
            <input type="text" id="second_number" class="form-control" name="second_number" placeholder="np. F" maxlength="1">
            <label for="second_brutto" class="col-sm col-form-label">Wybierz kolumne <b>Brutto</b> drugiego pliku</label>
            <input type="text" id="second_brutto" class="form-control" name="second_brutto" placeholder="np. A" maxlength="1">
        </div>
        <div class="row float-right">
            <button type="submit" class="btn btn-primary mt-3">Import plików</button>
        </div>
    </div>
</form>
@endsection
