<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Ubah Penyakit') }}
		</h2>
	</x-slot>
	
	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
				<div class="p-6 bg-white border-b border-gray-200">
					<form action="{{ route('penyakit.update', $penyakit->id) }}" method="post">
						@csrf
						
						<div class="mt-2">
							<x-label for="kode" :value="__('Kode Penyakit')" />
							
							<x-input id="kode" class="block mt-1 w-full" type="text" name="kode" :value="old('kode')" value="{{ $penyakit->kode }}" readonly />
						</div>
						
						<div class="mt-2">
							<x-label for="penyakit" :value="__('Nama Penyakit')" />
							
							<x-input id="penyakit" class="block mt-1 w-full" type="text" name="penyakit" :value="old('penyakit')" value="{{ $penyakit->penyakit }}" required />
						</div>
						
						<!-- Email Address -->
						<div class="mt-2">
							<x-label for="solusi" :value="__('Solusi')" />
							
							<x-textarea id="solusi" class="block mt-1 w-full" name="solusi" :value="old('solusi')">{{ $penyakit->solusi }}</x-textarea>
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