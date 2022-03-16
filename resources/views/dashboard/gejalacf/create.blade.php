<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Tambah Gejala') }}
		</h2>
	</x-slot>
	
	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
				<div class="p-6 bg-white border-b border-gray-200">
					<form action="{{ route('gejala.cf.store') }}" method="post">
						@csrf
						
						<div class="mt-2">
							<x-label for="kode" :value="__('Kode Gejala')" />
							
							<x-input id="kode" class="block mt-1 w-full" type="text" name="kode" :value="old('kode')" value="{{ $kode }}" readonly />
						</div>
						
						<div class="mt-2">
							<x-label for="gejala" :value="__('Nama Gejala')" />
							
							<x-input id="gejala" class="block mt-1 w-full" type="text" name="gejala" :value="old('gejala')" required />
						</div>
						
						<div class="mt-2">
							<x-label for="penyakit" :value="__('Penyakit')" />

							<x-select id="penyakit" name="penyakit" :value="old('penyakit')">
								@foreach ($penyakits as $p)
										<option value="{{ $p->id }}">{{ $p->kode }} - {{ $p->penyakit }}</option>
								@endforeach
							</x-select>
						</div>

						<div class="mt-4">
							<x-button type="submit">Simpan</x-button>
						</div>
						
					</form>
				</div>
			</div>
		</div>
	</div>
</x-app-layout>