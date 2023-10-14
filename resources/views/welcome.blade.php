<x-app-layout>
    @slot('breadcrumbs')
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Library</li>
            </ol>
        </nav>
    @endslot
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('home') }}" class="btn btn-warning btn-sm mb-3">Refresh</a>
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">Data Produk</h6>
                </div>
                <div class="card-body">
                    {{-- <x-alert /> --}}

                    <form>
                        <div class="row mb-3">
                            <div class="col-sm-auto">
                                <x-filter.row />
                            </div>
                            <div class="col-sm-4">
                                <select name="category_id" class="form-control" onchange="this.form.submit()">
                                    <option value="">-Semua Kategori-</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == @$_GET['category_id'] ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4 ms-auto">
                                <x-filter.search />
                            </div>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Qty</th>
                                    <th>Kategori</th>
                                    <th>Publishment</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->qty }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>
                                            {{ $product->publishmentDescription }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <x-pagination :data="$products" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
