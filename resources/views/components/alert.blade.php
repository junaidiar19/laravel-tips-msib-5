{{-- @props(['type' => 'success', 'message' => 'Sukses menambahkan data']) --}}

@php
    $class = '';

    if ($type == 'error') {
        $class = 'alert-danger';
    } elseif ($type == 'success') {
        $class = 'alert-success';
    }
@endphp

<div class="alert {{ $class }}">
    {{ $message }}
</div>
