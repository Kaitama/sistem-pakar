<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Data Gejala') }}
		</h2>
	</x-slot>
	
	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
				<div class="p-6 bg-white border-b border-gray-200">
					<div class="flex items-center justify-between">
						<div></div>
						<x-button-link href="{{ route('gejala.cf.create') }}">Tambah Gejala</x-button-link>
					</div>
					
					
					
				</div>

				{{-- daftar penyakit --}}
				<x-table>
					<x-slot name="th">
						<x-th>No</x-th>
						<x-th>Kode Gejala</x-th>
						<x-th>Nama Gejala</x-th>
						{{-- <x-th>Penyakit</x-th> --}}
						<x-th></x-th>
					</x-slot>
					@forelse ($gejalacfs as $k => $gejala)
					<tr class="bg-white border-b">
						<x-td>{{ $k + 1 }}</x-td>
						<x-td>{{ $gejala->kode }}</x-td>
						<x-td>{{ $gejala->gejala }}</x-td>
						{{-- <x-td>{{ dd($gejala->penyakits['kode']) }}</x-td> --}}
						<x-td>
							<x-button-link href="{{ route('gejala.cf.edit', $gejala->id) }}">Ubah</x-button-link>
							<x-button-link class="bg-rose-600 text-white" href="{{ route('gejala.cf.delete', $gejala->id) }}">Hapus</x-button-link>
						</x-td>
					</tr>
					@empty
					<tr class="bg-white border-b">
						<x-td colspan="5">Data gejala masih kosong.</x-td>
					</tr>
					@endforelse
					
				</x-table>
			</div>
		</div>
	</div>
</x-app-layout>