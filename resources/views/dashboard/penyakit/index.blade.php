<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Data Penyakit') }}
		</h2>
	</x-slot>
	
	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
				<div class="p-6 bg-white border-b border-gray-200">
					<div class="flex items-center justify-between">
						<div></div>
						<x-button-link href="{{ route('penyakit.create') }}">Tambah Penyakit</x-button-link>
					</div>
					
					
					
				</div>

				{{-- daftar penyakit --}}
				<x-table>
					<x-slot name="th">
						<x-th>No</x-th>
						<x-th>Kode Penyakit</x-th>
						<x-th>Nama Penyakit</x-th>
						<x-th>Solusi</x-th>
						<x-th></x-th>
					</x-slot>
					@forelse ($penyakits as $k => $penyakit)
					<tr class="bg-white border-b">
						<x-td>{{ $k + 1 }}</x-td>
						<x-td>{{ $penyakit->kode }}</x-td>
						<x-td>{{ $penyakit->penyakit }}</x-td>
						<x-td>{{ $penyakit->solusi }}</x-td>
						<x-td>
							<x-button-link href="{{ route('penyakit.edit', $penyakit->id) }}">Ubah</x-button-link>
							<x-button-link class="bg-rose-600 text-white" href="{{ route('penyakit.delete', $penyakit->id) }}">Hapus</x-button-link>
						</x-td>
					</tr>
					@empty
					<tr class="bg-white border-b">
						<x-td colspan="5">Data penyakit masih kosong.</x-td>
					</tr>
					@endforelse
					
				</x-table>
			</div>
		</div>
	</div>
</x-app-layout>