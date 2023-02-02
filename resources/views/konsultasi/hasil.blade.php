<x-front-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Hasil Diagnosa') }}
		</h2>
	</x-slot>
	
	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
				<div class="p-6 bg-gray-900 border-b border-gray-200">
					<h4 class="text-xl font-semibold text-gray-50">Data Diri</h4>
				</div>

				<div class="p-6 bg-white border-b border-gray-200">

					<dl>
						<div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
							<dt class="text-sm font-medium text-gray-500">Nama Lengkap</dt>
							<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $pasien->name ?? '' }}</dd>
						</div>
						<div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
							<dt class="text-sm font-medium text-gray-500">Email</dt>
							<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $pasien->email ?? '' }}</dd>
						</div>
						<div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
							<dt class="text-sm font-medium text-gray-500">Telepon</dt>
							<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $pasien->phone ?? '' }}</dd>
						</div>
						<div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
							<dt class="text-sm font-medium text-gray-500">Alamat</dt>
							<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $pasien->address ?? '' }}</dd>
						</div>

					</dl>

				</div>
			</div>
		</div>
	</div>

	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
				<div class="p-6 bg-gray-900 border-b border-gray-200">
					<h4 class="text-xl font-semibold text-gray-50">Hasil Diagnosa</h4>
				</div>

				<div class="p-6 bg-white border-b border-gray-200">

					
					@forelse ($hasil as $h)
					<div class="mt-6 pb-4 px-4 {{ $loop->last ? '' : 'border-b border-gray-200' }}">
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