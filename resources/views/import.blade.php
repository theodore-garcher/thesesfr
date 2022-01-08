@extends('master')

@section('titre', 'Import')


@section('content')

    <h1>Import</h1>

    <form class="" action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mt-30" style="max-width: 500px; margin: 0 auto;">
            <div class="">
                <input type="file" name="file" class="custom-file-input" id="customFile">
                <label class="" for="customFile">Choose file</label>
            </div>
        </div>
        <button class="">Import data</button>
    </form>

@endsection
