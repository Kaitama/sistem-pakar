<x-front-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Hasil Diagnosa') }}
		</h2>
	</x-slot>
	
	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
				<div class="p-6 bg-white border-b border-gray-200">

					
					@forelse ($hasil as $h)
					<div class="mt-6 pb-4 {{ $loop->last ? '' : 'border-b border-gray-200' }}">
						<h2 class="font-semibold {{ $loop->first ? 'text-2xl text-indigo-700' : 'text-gray-600' }}">
							{{ $h['penyakit'] }} - {{ $h['nilai'] }}%
						</h2>
						<div class="mt-4 {{ $loop->first ? 'text-lg text-indigo-700' : 'text-gray-600' }}">
							<h4 class="font-semibold">Solusi:</h4>
							<p>{{ $h['solusi'] }}</p>
						</div>
					</div>
					@empty
					<div class="mt-6 pb-4">
						<h2 class="font-semibold text-gray-600">
							Tidak ada solusi yang dapat ditampilkan.
						</h2>
					</div>
					@endforelse


				</div>
				<div class="p-6 flex">
					<div class="ml-auto">
						<x-button-link href="/">Selesai</x-button-link>
					</div>
				</div>
			</div>
		</div>
	</div>
</x-front-layout>