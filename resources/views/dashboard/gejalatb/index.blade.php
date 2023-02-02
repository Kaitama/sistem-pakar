<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Data Gejala') }}
		</h2>
	</x-slot>
	
	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="flex items-center justify-between mx-4 mb-6">
				<div></div>
				
				<x-button-link href="{{ route('gejala.tb.create') }}">Tambah Gejala</x-button-link>
			</div>
			
			{{-- daftar penyakit --}}
			<x-table class="mt-6">
				<x-slot name="th">
					<x-th>No</x-th>
					<x-th>Kode Gejala</x-th>
					<x-th>Nama Gejala</x-th>
					<x-th>Bobot</x-th>
					<x-th></x-th>
				</x-slot>
				@forelse ($gejalatbs as $k => $gejala)
				<tr class="bg-white border-b">
					<x-td>{{ $k + 1 }}</x-td>
					<x-td>{{ $gejala->kode }}</x-td>
					<x-td>{{ $gejala->gejala }}</x-td>
					<x-td>{{ number_format($gejala->bobot, 3) }}</x-td>
					<x-td>
						<x-button-link href="{{ route('gejala.tb.edit', $gejala->id) }}">Ubah</x-button-link>
						<x-button-link class="bg-red-600 text-white" href="{{ route('gejala.tb.delete', $gejala->id) }}">Hapus</x-button-link>
					</x-td>
				</tr>
				@empty
				<tr class="bg-white border-b">
					<x-td colspan="6">Data gejala masih kosong.</x-td>
				</tr>
				@endforelse
				
			</x-table>
			
		</div>
	</div>
</x-app-layout>