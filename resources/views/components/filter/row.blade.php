@php
    $rows = [10, 50, 100];
@endphp

<select name="row" class="form-control" onchange="this.form.submit()">
    @foreach ($rows as $item)
        <option value="{{ $item }}" {{ $item == @$_GET['row'] ? 'selected' : '' }}>{{ $item }}</option>
    @endforeach
</select>
