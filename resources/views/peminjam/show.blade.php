@extends('layout.detail')

@section('content')

<style>
    :root {
        --color-bg: #f2f2f2;
        --color-white: #fff;
        --color-grey: #ededed;
        --color-grey-light: #d1d1d1;
        --color-text: #212223;
        --color-text-light: #7b7b7c;
        --color-primary: rgb(36 96 252 / 100%);
        --color-primary-dark: rgb(21 69 193 / 100%);
        --color-primary-o-10: rgb(36 96 252 / 10%);

        --card-shadow: 0 16px 16px rgb(0 0 0 / 8%), 0 8px 24px rgb(0 0 0 / 12%);
        --card-avatar-size: 48px;
        --card-border-radius: .5rem;

        --emoji-button-shadow: 0px 0px 4px rgb(0 0 0 / 25%);

        --comment-avatar-size: 32px;

        --icon-vertical-dots: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCI+PHBhdGggZD0iTTEyLDE2QTIsMiAwIDAsMSAxNCwxOEEyLDIgMCAwLDEgMTIsMjBBMiwyIDAgMCwxIDEwLDE4QTIsMiAwIDAsMSAxMiwxNk0xMiwxMEEyLDIgMCAwLDEgMTQsMTJBMiwyIDAgMCwxIDEyLDE0QTIsMiAwIDAsMSAxMCwxMkEyLDIgMCAwLDEgMTIsMTBNMTIsNEEyLDIgMCAwLDEgMTQsNkEyLDIgMCAwLDEgMTIsOEEyLDIgMCAwLDEgMTAsNkEyLDIgMCAwLDEgMTIsNFoiIC8+PC9zdmc+");
        --icon-smiley: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCI+PHBhdGggZD0iTTIwLDEyQTgsOCAwIDAsMCAxMiw0QTgsOCAwIDAsMCA0LDEyQTgsOCAwIDAsMCAxMiwyMEE4LDggMCAwLDAgMjAsMTJNMjIsMTJBMTAsMTAgMCAwLDEgMTIsMjJBMTAsMTAgMCAwLDEgMiwxMkExMCwxMCAwIDAsMSAxMiwyQTEwLDEwIDAgMCwxIDIyLDEyTTEwLDkuNUMxMCwxMC4zIDkuMywxMSA4LjUsMTFDNy43LDExIDcsMTAuMyA3LDkuNUM3LDguNyA3LjcsOCA4LjUsOEM5LjMsOCAxMCw4LjcgMTAsOS41TTE3LDkuNUMxNywxMC4zIDE2LjMsMTEgMTUuNSwxMUMxNC43LDExIDE0LDEwLjMgMTQsOS41QzE0LDguNyAxNC43LDggMTUuNSw4QzE2LjMsOCAxNyw4LjcgMTcsOS41TTEyLDE3LjIzQzEwLjI1LDE3LjIzIDguNzEsMTYuNSA3LjgxLDE1LjQyTDkuMjMsMTRDOS42OCwxNC43MiAxMC43NSwxNS4yMyAxMiwxNS4yM0MxMy4yNSwxNS4yMyAxNC4zMiwxNC43MiAxNC43NywxNEwxNi4xOSwxNS40MkMxNS4yOSwxNi41IDEzLjc1LDE3LjIzIDEyLDE3LjIzWiIgLz48L3N2Zz4=");
        --icon-send: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCI+PHBhdGggZD0iTTIsMjFMMjMsMTJMMiwzVjEwTDE3LDEyTDIsMTRWMjFaIiAvPjwvc3ZnPg==");
        }

        .card__options::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        height: 100%;
        width: 100%;
        mask-position: center;
        -webkit-mask-position: center;
        mask-size: contain;
        -webkit-mask-size: contain;
        mask-repeat: no-repeat;
        -webkit-mask-repeat: no-repeat;
        mask-image: var(--icon-vertical-dots);
        -webkit-mask-image: var(--icon-vertical-dots);
        background-color: var(--color-text-light);
        }

        .card__options:is(:hover, :focus-visible)::after {
        background-color: var(--color-primary);
        }

        .card__actions-emojis::after {
        content: '';
        display: block;
        height: 1.25rem;
        width: 1.25rem;
        mask-position: center;
        -webkit-mask-position: center;
        mask-size: contain;
        -webkit-mask-size: contain;
        mask-repeat: no-repeat;
        -webkit-mask-repeat: no-repeat;
        mask-image: var(--icon-smiley);
        -webkit-mask-image: var(--icon-smiley);
        background-color: var(--color-text-light);
        }

        .card__actions-emojis:is(:hover, :focus-visible)::after {
        background-color: var(--color-primary);
        }

        .comment__header::after {
        content: '';
        position: absolute;
        top: var(--comment-avatar-size);
        left: calc(var(--comment-avatar-size) / 2);
        transform: translateX(-50%);
        height: 4.75rem;
        width: 1px;
        background-color: var(--color-grey-light);
        }

        .comment__options::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        height: 100%;
        width: 100%;
        mask-position: center;
        -webkit-mask-position: center;
        mask-size: contain;
        -webkit-mask-size: contain;
        mask-repeat: no-repeat;
        -webkit-mask-repeat: no-repeat;
        mask-image: var(--icon-vertical-dots);
        -webkit-mask-image: var(--icon-vertical-dots);
        background-color: var(--color-text-light);
        }

        .comment__options:is(:hover, :focus-visible)::after {
        background-color: var(--color-primary);
        }

        .comment__actions-emojis::after {
        content: '';
        display: block;
        height: 1.25rem;
        width: 1.25rem;
        mask-position: center;
        -webkit-mask-position: center;
        mask-size: contain;
        -webkit-mask-size: contain;
        mask-repeat: no-repeat;
        -webkit-mask-repeat: no-repeat;
        mask-image: var(--icon-smiley);
        -webkit-mask-image: var(--icon-smiley);
        background-color: var(--color-text-light);
        }

        .comment__actions-emojis:is(:hover, :focus-visible)::after {
        background-color: var(--color-primary);
        }

        .form__button:is(:hover, :focus-visible) {
        background-color: var(--color-primary-dark);
        }

        .form__button::after {
        content: '';
        height: 55%;
        width: 55%;
        mask-position: center;
        -webkit-mask-position: center;
        mask-size: contain;
        -webkit-mask-size: contain;
        mask-repeat: no-repeat;
        -webkit-mask-repeat: no-repeat;
        mask-image: var(--icon-send);
        -webkit-mask-image: var(--icon-send);
        background-color: white;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        }
</style>

    <!-- banner section end -->
    <div class="banner_section layout_padding" style="background: linear-gradient(90deg, #3c0e0e 65%, rgba(60, 90, 90, 0) 65%), url(../images/banner-bg.png)">
            <div class="container px-3 px-lg-5 py-1">
                <div class="pt-2 mx-2">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
            </div>
        <div class="container" style="padding-bottom: 300px;">
           <div class="row">
               <div class="col-sm-4 col-lg-3">
                   <div class="image_1">
                       <img src="{{ asset('storage/buku/' . $buku->sampul) }}" alt="{{ $buku->judul }}">
                   </div>
                </div>
                <div class="col-md-6 col-lg-3">

                    <h4 class="lead fs-2 fw-bolder" style="color: white">Judul : {{ $buku->judul }}</h4>
                    <h1 class="lead fs-3" style="color: white">Kategori: {{ $buku->kategori->nama_kategori }}</h1>
                    <h1 class="lead fs-3" style="color: white">Tahun Terbit: {{ $buku->tahun_terbit }}</h1>
                    <h1 class="lead fs-3" style="color: white">Penulis: {{ $buku->penulis }}</h1>
                    <h1 class="lead fs-3" style="color: white">Penerbit: {{ $buku->penerbit }}</h1>
                    <h1 class="lead fs-3" style="color: white">Jumlah Stock: {{ $buku->stock }}</h1>
                    <div class="lead rate mt-2">
                        @php
                            $ratingValue = $buku->ulasan->avg('rating'); // Dapatkan nilai rating dari database
                            $fullStars = (int) $ratingValue;
                            $halfStar = $ratingValue - $fullStars >= 0.5;
                            $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                        @endphp

                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $fullStars)
                                ⭐️ <!-- Bintang penuh -->
                            @elseif ($i == $fullStars + 1 && $halfStar)
                                🌟 <!-- Bintang setengah -->
                            @else
                                ☆ <!-- Bintang kosong -->
                            @endif
                        @endfor
                    </div>

                    @auth
                        @php
                            $role = auth()->user()->role;
                        @endphp

                        @if ($role == 'peminjam')
                            @if (isset($status) && $status->status_tunggu === 'tunggu' && $status->status_peminjaman === null)
                                <form action="{{ route('peminjam.buku', ['id' => $buku->id]) }}" method="POST" class="d-flex">
                                    @csrf
                                    <button disabled style="width: 170px; float: left;" type="submit">
                                        <i class="bi bi-book-half" style="width: 100%;
                                        float: left;
                                        font-size: 18px;
                                        color: #ffffff;
                                        background-color: #df9911;
                                        text-align: center;
                                        padding: 7px 0px;">menunggu approval</i>

                                    </button>
                                </form>
                            @elseif (isset($status) && $status->status_tunggu === 'idle' && $status->status_peminjaman === 'Dipinjam')
                                <form action="{{ route('peminjam.buku', ['id' => $buku->id]) }}" method="POST" class="d-flex">
                                    @csrf
                                    <button disabled style="width: 170px; float: left;" type="submit">
                                        <i class="bi bi-book-half" style="width: 100%;
                                        float: left;
                                        font-size: 18px;
                                        color: #ffffff;
                                        background-color: #df9911;
                                        text-align: center;
                                        padding: 7px 0px;">peminjaman telah di approve</i>

                                    </button>
                                </form>
                                {{-- <form action="{{ route('ajukan.pengembalian.buku', ['id' => $status->id]) }}" method="POST"
                                    class="d-flex mx-4">
                                    @csrf
                                    <button class="btn btn-primary flex-shrink-0 btn-lg mt-3" type="submit">
                                        <i class="bi bi-book-half"></i>
                                        Ajukan Pengembalian
                                    </button>
                                </form> --}}
                            @elseif(isset($status) && $status->status_tunggu === 'pengembalian')
                                <form action="{{ route('peminjam.buku', ['id' => $status->id]) }}" method="POST" class="d-flex">
                                    @csrf
                                    <button disabled class="" style="width: 170px; float: left;" type="submit">
                                        <i class="bi bi-book-half" style="width: 100%;
                                        float: left;
                                        font-size: 18px;
                                        color: #ffffff;
                                        background-color: #df9911;
                                        text-align: center;
                                        padding: 7px 0px;">menunggu approval pengembalian</i>

                                    </button>
                                </form>
                            @else
                                <form action="{{ route('peminjam.buku', ['id' => $buku->id]) }}" method="POST" class="d-flex">
                                    @csrf
                                    <button class="" style="width: 170px; float: left;" type="submit">
                                        <i class="bi bi-book-half" style="width: 100%;
                                        float: left;
                                        font-size: 18px;
                                        color: #ffffff;
                                        background-color: #df9911;
                                        text-align: center;
                                        padding: 7px 0px;">Pinjam</i>

                                    </button>
                                </form>
                            @endif
                        @elseif($role == 'admin' || $role == 'petugas')
                            <form action="{{ route('peminjam.buku', ['id' => $buku->id]) }}" method="POST" class="d-flex">
                                @csrf
                                <button class="" style="width: 170px; float: left;" type="button" disabled>
                                    <i class="bi bi-book-half" style="width: 100%;
                                    float: left;
                                    font-size: 18px;
                                    color: #ffffff;
                                    background-color: #df9911;
                                    text-align: center;
                                    padding: 7px 0px;
                                    border-radius: 40px;"></i>
                                    Pinjam
                                </button>
                            </form>
                        @endif

                    @endauth
                </div>
                <div class="col-sm-8 col-lg-6">
                   <div class="container" style="display: flex; justify-content: center; width: 100%;
                    margin-bottom: 70px;">
                       <card-with-comments class="card-with-comments" style="background-color: var(--color-grey); border-radius: var(--card-border-radius); width: calc(100% - 4rem); width: 420px; max-height: 450px; box-shadow: var(--card-shadow); overflow: hidden; overflow-y: auto; position: relative;" role="article">

                        <div class="comments">
                           @foreach ($ulasan->sortByDesc('created_at') as $ulasanBuku)
                           <div class="comment" style="padding: 1.25rem 1.25rem .75rem;">
                             <div class="comment__header" style="display: flex; align-items: center; justify-content: flex-start; gap: 1rem; position: relative;">
                               <img src="{{ $ulasanBuku->user->profile_photo ? asset('storage/' . $ulasanBuku->user->profile_photo) : asset('DetailPeminjaman/assets/default.png') }}" alt="Comment writter image" class="comment__avatar" style="display: block; height: var(--comment-avatar-size); width: var(--comment-avatar-size); border-radius: 50%; object-fit: cover;">
                               <p class="comment__user-name" style="margin: 0; font-size: .875rem;">{{ $ulasanBuku->user->name_lengkap }}</p>
                               <p class="comment__time" style="margin: 0 0 0 -.5rem; color: var(--color-text-light); font-size: .875rem;">{{ $ulasanBuku->created_at->diffForHumans() }}</p>
                             </div>
                             <p class="comment__text" style="margin: .25rem 0 1rem 3rem; font-weight: 300; font-size: .875rem; color: var(--color-text); opacity: .75;">{{ $ulasanBuku->ulasan }}</p>
                                <p class="text-justify comment-text mb-0">
                                    @php
                                        $fullStars = (int) $ulasanBuku->rating;
                                        $halfStar = $ulasanBuku->rating - $fullStars >= 0.5;
                                        $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                                    @endphp
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $fullStars)
                                                ⭐️ <!-- Bintang penuh -->
                                            @elseif ($i == $fullStars + 1 && $halfStar)
                                                🌟 <!-- Bintang setengah -->
                                            @else
                                                ☆ <!-- Bintang kosong -->
                                        @endif
                                    @endfor
                                </p>
                                <div class="mt-2">
                                    @if (Auth::check() && Auth::id() == $ulasanBuku->user_id)
                                        <!-- Tombol edit -->
                                        <button type="button" class="btn btn-sm btn-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $ulasanBuku->id }}">Edit</button>
                                        <!-- Tombol hapus -->
                                        <form
                                            action="{{ route('comment.delete', ['id' => $ulasanBuku->id]) }}"
                                            method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    @endif
                                </div>
                           </div>
                           @endforeach

                            </div>

                            {{-- <form action="#" method="POST">
                            @csrf
                            <div class="form" style="background-color: var(--color-grey-light); padding: 1.25rem; display: flex; align-item: center; position: absolute; bottom: 0; width: 100%;">
                                <img src="https://i.pravatar.cc/64?img=60" alt="Your avatar" class="form__avatar" style="height: var(--comment-avatar-size); width: var(--comment-avatar-size); border-radius: 50%; margin-right: .5rem;">
                                <input type="text" name="description" id="description" class="form__input" style="border: none; padding: 0 .5rem; flex: 1; border-top-left-radius: .25rem; border-bottom-left-radius: .25rem; outline: none;" placeholder="Enter reply">
                                <button type="submit" class="form__button" style="height: var(--comment-avatar-size); width: var(--comment-avatar-size); border-top-right-radius: .25rem; border-bottom-right-radius: .25rem; background-color: var(--color-primary); border: none; position: relative; cursor: pointer;"></button>
                            </div>
                            </form> --}}
                    </card-with-comments>
                </div>
           </div>
        </div>
     </div>
     <!-- banner section end -->



    <section class="py-5 mt-10 pt-10">
        <div class="container px-4 px-lg-5 my-5">
            {{-- <div class="pt-2 mx-5">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            </div> --}}
            <div class="row gx-4 gx-lg-5 align-items-center">
                {{-- <div class="col-md-4 text-center">
                    <img class="card-img-top mb-5 mb-md-0" src="{{ asset('storage/buku/' . $buku->sampul) }}"
                        alt="{{ $buku->judul }}"
                        style="max-width: 100%; height: auto; max-height: 500px; max-width: 400px;" />
                </div> --}}
                {{-- <div class="col-md-6"> --}}
                    {{-- <h4 class="lead fs-2 fw-bolder">Judul : {{ $buku->judul }}</h4>
                    <h1 class="lead fs-3">Kategori: {{ $buku->kategori->nama_kategori }}</h1>
                    <h1 class="lead fs-3">Tahun Terbit: {{ $buku->tahun_terbit }}</h1>
                    <h1 class="lead fs-3">Penulis: {{ $buku->penulis }}</h1>
                    <h1 class="lead fs-3">Penerbit: {{ $buku->penerbit }}</h1>
                    <h1 class="lead fs-3">Jumlah Stock: {{ $buku->stock }}</h1> --}}
                    {{-- <div class="lead rate mt-2">
                        @php
                            $ratingValue = $buku->ulasan->avg('rating'); // Dapatkan nilai rating dari database
                            $fullStars = (int) $ratingValue;
                            $halfStar = $ratingValue - $fullStars >= 0.5;
                            $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                        @endphp

                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $fullStars)
                                ⭐️ <!-- Bintang penuh -->
                            @elseif ($i == $fullStars + 1 && $halfStar)
                                🌟 <!-- Bintang setengah -->
                            @else
                                ☆ <!-- Bintang kosong -->
                            @endif
                        @endfor
                    </div> --}}
                    {{-- @auth
                        @php
                            $role = auth()->user()->role;
                        @endphp

                        @if ($role == 'peminjam')
                            @if (isset($status) && $status->status_tunggu === 'tunggu' && $status->status_peminjaman === null)
                                <form action="{{ route('peminjam.buku', ['id' => $buku->id]) }}" method="POST" class="d-flex">
                                    @csrf
                                    <button disabled class="btn btn-outline-dark flex-shrink-0 btn-lg mt-3" type="submit">
                                        <i class="bi bi-book-half"></i>
                                        menunggu approval
                                    </button>
                                </form>
                            @elseif (isset($status) && $status->status_tunggu === 'idle' && $status->status_peminjaman === 'Dipinjam')
                                <form action="{{ route('peminjam.buku', ['id' => $buku->id]) }}" method="POST" class="d-flex">
                                    @csrf
                                    <button disabled class="btn btn-outline-dark flex-shrink-0 btn-lg mt-3" type="submit">
                                        <i class="bi bi-book-half"></i>
                                        peminjaman telah di approve
                                    </button>
                                </form> --}}
                                {{-- <form action="{{ route('ajukan.pengembalian.buku', ['id' => $status->id]) }}" method="POST"
                                    class="d-flex mx-4">
                                    @csrf
                                    <button class="btn btn-primary flex-shrink-0 btn-lg mt-3" type="submit">
                                        <i class="bi bi-book-half"></i>
                                        Ajukan Pengembalian
                                    </button>
                                </form> --}}
                            {{-- @elseif(isset($status) && $status->status_tunggu === 'pengembalian')
                                <form action="{{ route('peminjam.buku', ['id' => $status->id]) }}" method="POST" class="d-flex">
                                    @csrf
                                    <button disabled class="btn btn-outline-dark flex-shrink-0 btn-lg mt-3" type="submit">
                                        <i class="bi bi-book-half"></i>
                                        menunggu approval pengembalian
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('peminjam.buku', ['id' => $buku->id]) }}" method="POST" class="d-flex">
                                    @csrf
                                    <button class="btn btn-outline-dark flex-shrink-0 btn-lg mt-3" type="submit">
                                        <i class="bi bi-book-half"></i>
                                        Pinjam
                                    </button>
                                </form>
                            @endif
                        @elseif($role == 'admin' || $role == 'petugas')
                            <form action="{{ route('peminjam.buku', ['id' => $buku->id]) }}" method="POST" class="d-flex">
                                @csrf
                                <button class="btn btn-outline-dark flex-shrink-0 btn-lg mt-3" type="button" disabled>
                                    <i class="bi bi-book-half"></i>
                                    Pinjam
                                </button>
                            </form>
                        @endif

                    @endauth --}}
                {{-- </div> --}}
                <div class="container m-5 ">
                    <!-- Daftar komentar yang sudah ada -->
                    <!-- Daftar komentar yang sudah ada -->
                    {{-- <div class="row height d-flex justify-content-center align-items-center"> --}}
                        {{-- <div class="card shadow col-md-12"> --}}
                            <!-- Menambahkan class col-md-8 untuk mengatur lebar kolom komentar -->
                            {{-- <div class="p-3">
                                <h6>Komentar</h6>
                            </div> --}}

                            @foreach ($ulasan->sortByDesc('created_at') as $ulasanBuku)
                                {{-- <div class="mt-2 row"> --}}
                                    {{-- <div class="col-12"> --}}
                                        {{-- <div class="d-flex flex-row p-3"> --}}
                                            {{-- <img src="{{ $ulasanBuku->user->profile_photo ? asset('storage/' . $ulasanBuku->user->profile_photo) : asset('DetailPeminjaman/assets/default.png') }}"
                                                width="40" height="40" class="rounded-circle m-2"> --}}
                                            {{-- <div class="w-100"> --}}
                                                {{-- <div class="d-flex justify-content-between align-items-center">
                                                    {{ $ulasanBuku->user->name_lengkap }}<small>{{ $ulasanBuku->created_at->diffForHumans() }}</small>
                                                </div> --}}
                                                {{-- <p class="text-justify comment-text mb-0">{{ $ulasanBuku->ulasan }}</p> --}}
                                                {{-- <p class="text-justify comment-text mb-0"> @php
                                                    $fullStars = (int) $ulasanBuku->rating;
                                                    $halfStar = $ulasanBuku->rating - $fullStars >= 0.5;
                                                    $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                                                @endphp

                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= $fullStars)
                                                            ⭐️ <!-- Bintang penuh -->
                                                        @elseif ($i == $fullStars + 1 && $halfStar)
                                                            🌟 <!-- Bintang setengah -->
                                                        @else
                                                            ☆ <!-- Bintang kosong -->
                                                        @endif
                                                    @endfor
                                                </p> --}}
                                                {{-- <div class="mt-2">
                                                    @if (Auth::check() && Auth::id() == $ulasanBuku->user_id)
                                                        <!-- Tombol edit -->
                                                        <button type="button" class="btn btn-sm btn-primary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#editModal{{ $ulasanBuku->id }}">Edit</button>
                                                        <!-- Tombol hapus -->
                                                        <form
                                                            action="{{ route('comment.delete', ['id' => $ulasanBuku->id]) }}"
                                                            method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-sm btn-danger">Hapus</button>
                                                        </form>
                                                    @endif
                                                </div> --}}
                                            {{-- </div> --}}
                                        {{-- </div> --}}
                                    {{-- </div> --}}
                                {{-- </div> --}}

                                <!-- Modal Edit -->
                                <div class="modal fade" id="editModal{{ $ulasanBuku->id }}" tabindex="-1"
                                    aria-labelledby="editModalLabel{{ $ulasanBuku->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel{{ $ulasanBuku->id }}">Edit
                                                    Komentar</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('comment.update', ['id' => $ulasanBuku->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">

                                                    <div class="form-group">
                                                        <label for="edit-comment{{ $ulasanBuku->id }}"
                                                            class="form-label">Komentar</label>
                                                        <textarea class="form-control" id="edit-comment{{ $ulasanBuku->id }}" name="comment" rows="3">{{ $ulasanBuku->ulasan }}</textarea>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Simpan
                                                        Perubahan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
