@extends('layouts.app')

@section('title', ' Edit Profile')

@section('content')

    <main class="h-full overflow-y-auto">
        <div class="container mx-auto">
            <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                <div class="col-span-12">
                    <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                        Edit My Profile
                    </h2>
                    <!-- <p class="text-sm text-gray-400">
                        Enter your data Correctly & Properly
                    </p> -->
                </div>
            </div>
        </div>

        <section class="container px-6 mx-auto mt-5">
            <div class="grid gap-5 md:grid-cols-12">
                <main class="col-span-12 p-4 md:pt-0">
                    <div class="px-2 py-2 mt-2 bg-white rounded-xl">

                        <form action="{{ route('member.profile.update', [Auth::user()->id]) }}" method="POST" enctype="multipart/form-data">

                            @method('PUT')
                            @csrf

                            <div class="">
                                <div class="px-4 py-5 sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6">

                                            <div class="flex items-center mt-1">

                                                @if (@Auth::user()->detail_user()->first()->photo)
                                                    <img src="{{ url(Storage::url(@Auth::user()->detail_user()->first()->photo)) }}" alt="photo profile" class="w-16 h-16 rounded-full">
                                                @else
                                                    <span class="inline-block w-16 h-16 overflow-hidden bg-gray-100 rounded-full">
                                                        <svg class="w-full h-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                                        </svg>
                                                    </span>
                                                @endif

                                                <label for="choose" class="px-3 py-2 ml-5 text-sm font-medium leading-4 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Choose File</label>

                                                <input type="file" accept="image/*" id="choose" name="photo" hidden>

                                                <a href="{{ route('member.delete.photo.profile') }}" type="button" class="px-3 py-2 ml-5 text-sm font-medium leading-4 text-red-700 bg-transparent rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" onclick="return confirm('Anda Yakin Untuk Menghapus Foto?')">
                                                    Hapus
                                                </a>
                                            </div>

                                            @if ($errors->has('photo'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('photo') }}</p>
                                            @endif

                                        </div>

                                        <div class="md:col-span-6 lg:col-span-3">
                                            <label for="name" class="block mb-3 font-medium text-gray-700 text-md">Nama</label>

                                            <input placeholder="Nama" type="text" name="name" id="name" autocomplete="name" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ $user->name ?? '' }}" required>

                                            @if ($errors->has('name'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('name') }}</p>
                                            @endif
                                        </div>

                                        <div class="md:col-span-6 lg:col-span-3">
                                            <label for="role" class="block mb-3 font-medium text-gray-700 text-md">Keahlian</label>

                                            <input placeholder="Keahlian" type="text" name="role" id="role" autocomplete="role" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ $user->detail_user->role ?? '' }}" required>

                                            @if ($errors->has('role'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('role') }}</p>
                                            @endif
                                        </div>

                                        <div class="md:col-span-6 lg:col-span-3">
                                            <label for="email" class="block mb-3 font-medium text-gray-700 text-md">Email</label>

                                            <input placeholder="email" type="email" name="email" id="email" autocomplete="email" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ $user->email ?? '' }}" required>

                                            @if ($errors->has('email'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('email') }}</p>
                                            @endif
                                        </div>

                                        <div class="md:col-span-6 lg:col-span-3">
                                            <label for="contact_number" class="block mb-3 font-medium text-gray-700 text-md">Nomer HP</label>

                                            <input placeholder="Ketikan dan tuliskan nomer anda https://wa.me/1XXXXXXXXXX" type="number" name="contact_number" id="contact_number" autocomplete="contact_number" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ $user->detail_user->contact_number ?? '' }}" required>

                                            @if ($errors->has('contact_number'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('contact_number') }}</p>
                                            @endif
                                        </div>

                                        <div class="col-span-6">
                                            <label for="biography" class="block mb-3 font-medium text-gray-700 text-md">Biografi</label>

                                            <textarea placeholder="Tulis Biografi" type="text" name="biography" id="biography" autocomplete="biography" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" rows="4">{{ $user->detail_user->biography ?? '' }}</textarea>

                                            @if ($errors->has('biography'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('biography') }}</p>
                                            @endif
                                        </div>

                                        <div class="lg:col-span-3 md:col-span-6">
                                            <label  class="block mb-3 font-medium text-gray-700 text-md">Rekening</label>

                                            <input placeholder="Nomor Rekening" type="text" name="no_rekening"  class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ @$user->detail_user->no_rekening ?? '' }}">

                                            @if ($errors->has('rekening'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('rekening') }}</p>
                                            @endif
                                        </div>
                                        <div class="lg:col-span-3 md:col-span-6">
                                            <label  class="block mb-3 font-medium text-gray-700 text-md">Nama Pemilik</label>

                                            <input placeholder="Nomor Rekening" type="text" name="nama_pemilik_rek"  class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ $user->detail_user->nama_pemilik_rek ?? '' }}">

                                            @if ($errors->has('nama_pemilik_rek'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('nama_pemilik_rek') }}</p>
                                            @endif
                                        </div>
                                         <div class="lg:col-span-3 md:col-span-6">
                                            <label  class="block mb-3 font-medium text-gray-700 text-md">Bank</label>

                                            <select name="bank" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                                                @php
                                                @$p=array('BNI','Mandiri','BCA','BRI','CIMBNIAGA','BPD','Danamon');
                                                @endphp
                                                <option value="">-Pilih-</option>
                                                @foreach(@$p as $bnk)
                                                <option value="{{ $bnk }}" {{ $bnk==@$user->detail_user->bank?'selected="selected"':'' }} >{{$bnk}}</option>
                                                @endforeach
                                               
                                            </select>
                                            @if ($errors->has('bank'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('bank') }}</p>
                                            @endif
                                        </div>

                                        <div class="col-span-6">
                                            <label for="experience" class="block mb-3 font-medium text-gray-700 text-md">Penggalaman</label>

                                            @forelse ($experience_user as $key => $item)
                                                <input placeholder="Penggalaman" type="text" name="{{ 'experience['.$item->id.']' }}" id="{{ 'experience['.$item->id.']' }}" autocomplete="{{ 'experience['.$item->id.']' }}" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value={{ $item->experience }}>

                                                @if ($errors->has('experience['.$item->id.']'))
                                                    <p class="text-red-500 mb-3 text-sm">{{ $errors->first('experience') }}</p>
                                                @endif
                                            @empty
                                                <input placeholder="Pengalaman" type="text" name="experience[]" id="experience" autocomplete="experience" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">

                                                @if ($errors->has('experience'))
                                                    <p class="text-red-500 mb-3 text-sm">{{ $errors->first('experience') }}</p>
                                                @endif

                                                <input placeholder="LINK Github" type="text" name="experience[]" id="experience" autocomplete="experience" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">

                                                @if ($errors->has('experience'))
                                                    <p class="text-red-500 mb-3 text-sm">{{ $errors->first('experience') }}</p>
                                                @endif

                                                <input placeholder="Penggalaman" type="text" name="experience[]" id="experience" autocomplete="experience" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">

                                                @if ($errors->has('experience'))
                                                    <p class="text-red-500 mb-3 text-sm">{{ $errors->first('experience') }}</p>
                                                @endif
                                            @endforelse

                                        </div>
                                    </div>
                                </div>

                                <div class="px-4 py-3 text-right sm:px-6">
                                    <a href={{ route('member.dashboard.index') }} type="button" class="inline-flex justify-center px-4 py-2 mr-4 text-sm font-medium text-gray-700 bg-white border border-gray-600 rounded-lg shadow-sm hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300" onclick="return confirm('Kamu Yakin Ingin Membatalkan?, Any changes you make will not be saved.')">
                                        Batal
                                    </a>

                                    <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-lg shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" onclick="return confirm('Kamu Yakin Untuk Save Data ?')">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </main>
            </div>
        </section>
    </main>

@endsection
