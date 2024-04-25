@extends('layout.detail')

@section('content')

<style>
    .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
    }

    .rate:not(:checked)>input {
        position: absolute;
        display: none;
    }

    .rate:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;
    }

    .rated:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;
    }

    .rate:not(:checked)>label:before {
        content: '★ ';
    }

    .rate>input:checked~label {
        color: #ffc700;
    }

    .rate:not(:checked)>label:hover,
    .rate:not(:checked)>label:hover~label {
        color: #deb217;
    }

    .rate>input:checked+label:hover,
    .rate>input:checked+label:hover~label,
    .rate>input:checked~label:hover,
    .rate>input:checked~label:hover~label,
    .rate>label:hover~input:checked~label {
        color: #c59b08;
    }

    .star-rating-complete {
        color: #c59b08;
    }

    .rating-container .form-control:hover,
    .rating-container .form-control:focus {
        background: #fff;
        border: 1px solid #ced4da;
    }

    .rating-container textarea:focus,
    .rating-container input:focus {
        color: #000;
    }

    .rated {
        float: left;
        height: 46px;
        padding: 0 10px;
    }

    .rated:not(:checked)>input {
        position: absolute;
        display: none;
    }

    .rated:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ffc700;
    }

    .rated:not(:checked)>label:before {
        content: '★ ';
    }

    .rated>input:checked~label {
        color: #ffc700;
    }

    .rated:not(:checked)>label:hover,
    .rated:not(:checked)>label:hover~label {
        color: #deb217;
    }

    .rated>input:checked+label:hover,
    .rated>input:checked+label:hover~label,
    .rated>input:checked~label:hover,
    .rated>input:checked~label:hover~label,
    .rated>label:hover~input:checked~label {
        color: #c59b08;
    }

    .product {
        transition: transform 0.3s ease-in-out;
    }

    .product:hover {
        transform: scale(1.05);
    }

    .column{
        display: flex;
        /* gap: 1px; */
        text-align: center;
        flex-wrap: wrap;
    }

</style>

{{-- <section class="py-2"> --}}

    {{-- <div class="container">
        <div class="pt-10 mx-5">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div> --}}

        <div class="movies_section layout_padding">
            <div class="container">
                <div class="movies_menu">
                    <ul>
                        <li class="active" style="font-size: 24px"><a href="#">Featured Books</a></li>
                    </ul>
                </div>
                <div class="movies_section_2 layout_padding">
                    <div class="featured__container container">
                        <div class="featured__swiper swiper">
                            <div class="column" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(330px, 1fr)); grid-gap: 20px;">
                                    @forelse ($favorites->sortByDesc('created_at') as $item)
                                            <article class="featured__card swiper-slide">
                                                <img src="{{ asset('storage/buku/' . $item->buku->sampul) }}" alt="" class="featured__img">
                                                <h2 class="featured__title">
                                                    {{ $item->buku->judul }}
                                                </h2>
                                                <h2 class="featured__title">
                                                    {{ $item->buku->penulis }}
                                                </h2>
                                                <div class="featured__prices">
                                                    <span class="featured__discount">
                                                        {{ $item->buku->penerbit }}
                                                    </span>
                                                    <span class="featured__discount">
                                                        {{ $item->buku->tahun_terbit }}
                                                    </span>
                                                </div>
                                                    <button class="button" data-bs-toggle="modal" data-bs-target="#ModalBuku_{{ $item->id }}" type="button">Detail</button>
                                                <div class="featured__actions">
                                                    @if ($favorites->contains('buku_id', $item->buku_id))
                                                        <button class="after-favorited" style="color:#df9911;"
                                                            onclick="toggleCancelFavorite(this)" data-id="{{ $item->buku_id }}">
                                                            <i class="ri-heart-fill"></i>
                                                        </button>
                                                    @else
                                                        <button class="before-favorited" style="color: #df9911;" onclick="toggleFavorite(this)"
                                                            data-id="{{ $item->id }}">
                                                            <i class="ri-heart-line"></i>
                                                        </button>
                                                    @endif
                                                </div>
                                            </article>
                                            @empty
                                            <div class="col mb-5 mt-5">
                                                <div class="alert alert-warning text-center" role="alert">
                                                    Buku tidak tersedia.
                                                </div>
                                            </div>
                            </div>
                            <div class="swiper-button-prev" style="color: #df9911">
                                <i class="ri-arrow-left-s-line"></i>
                            </div>
                            <div class="swiper-button-next" style="color: #df9911">
                                <i class="ri-arrow-right-s-line"></i>
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <section class="featured section" id="featured">
            <h2 class="section__title">
                Featured Books
            </h2>
            <div class="featured__container container">
                <div class="featured__swiper ">
                    <div class="column">
                        @forelse($favorites->sortByDesc('created_at') as $item)
                        <article class="featured__card swiper-slide">
                            <img src="{{ asset('storage/buku/' . $item->buku->sampul) }}" alt="" class="featured__img">
                            <h2 class="featured__title">
                                {{ $item->buku->judul }}
                            </h2>
                            <h2 class="featured__title">
                                {{ $item->buku->penulis }}
                            </h2>
                            <div class="featured__prices">
                                <span class="featured__discount">
                                    {{ $item->buku->penerbit }}
                                </span>
                                <span class="featured__discount">
                                    {{ $item->buku->tahun_terbit }}
                                </span>
                            </div>
                            <button class="button" data-bs-toggle="modal"
                            data-bs-target="#ModalBuku_{{ $item->id }}" type="button">
                            Detail
                        </button>
                        <div class="featured__actions">
                            @if ($favorites->contains('buku_id', $item->buku_id))
                                <button class="after-favorited" {{-- style="display: none;" --}}
                                    {{-- onclick="toggleCancelFavorite(this)" data-id="{{ $item->buku_id }}">
                                    <i class="ri-heart-fill"></i>
                                </button>
                            @else
                                <button class="before-favorited" onclick="toggleFavorite(this)"
                                    data-id="{{ $item->buku_id }}">
                                    <i class="ri-heart-line"></i>
                                </button>
                            @endif
                        </div>
                        </article>
                        @empty
                            <p>No featured books available</p>
                        @endforelse
                    </div>
                </div>
            </div> --}}
        {{-- </section> --}}

         <script>
            function toggleFavorite(button) {
                var bookId = button.getAttribute('data-id');

                // Mendapatkan token CSRF dari meta tag
                var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                // Kirim permintaan POST ke backend untuk menambahkan buku ke favorit
                fetch('/favorite/' + bookId, {
                        method: 'POST',
                        body: JSON.stringify({
                            book_id: bookId
                        }),
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken, // Menambahkan token CSRF ke header
                            // Anda mungkin perlu menambahkan header authorization jika diperlukan
                            // 'Authorization': 'Bearer ' + token,
                        }
                    })
                    .then(response => {
                        if (response.ok) {
                            // Perubahan UI saat buku ditambahkan ke favorit
                            button.innerHTML = '<i class="ri-heart-fill"></i>';
                            button.setAttribute('onclick', 'toggleCancelFavorite(this)');
                        } else {
                            // Handle kesalahan jika ada
                            console.error('Gagal menambahkan ke favorit');
                        }
                    })
                    .catch(error => console.error('Terjadi kesalahan:', error));
            }

            function toggleCancelFavorite(button) {
                var bookId = button.getAttribute('data-id');
                var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                fetch('/favorite/delete/' + bookId, {
                        method: 'DELETE',
                        body: JSON.stringify({
                            book_id: bookId
                        }),
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                        }
                    })
                    .then(response => {
                        if (response.ok) {
                            button.innerHTML = '<i class="ri-heart-line"></i>';
                            button.setAttribute('onclick', 'toggleFavorite(this)');
                        } else {
                            console.error('Gagal menghapus dari favorit');
                        }
                    })
                    .catch(error => console.error('Terjadi kesalahan:', error));
            }
        </script>

        @foreach($favorites->sortByDesc('created_at') as $item)
        <div class="modal fade" id="ModalBuku_{{ $item->id }}" tabindex="-1" aria-labelledby="ModalBukuLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="ModalBukuLabel">Favoritmu</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ asset('storage/buku/' . $item->buku->sampul) }}"
                                    class="img-thumbnail w-100 mb-3">
                                <span class="ms-auto text-warning fw-bold d-block text-center rate"><span
                                        class="text-dark">Rate:
                                    </span>★{{ number_format($item->buku->ulasan->avg('rating'), 1) }}/5</span>
                            </div>
                            <div class="col-md-8">
                                <h3 class="card-text" style="text-decoration: underline">{{ $item->buku->judul }}</h3>
                                <h5 class="card-text">Author: {{ $item->buku->penulis }}</h5>
                                <h5 class="card-text">Publisher: {{ $item->buku->penerbit }}</h5>
                                <h5 class="card-text">Publish Date: {{ $item->buku->tahun_terbit }}</h5>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
{{-- </section> --}}

@endsection
