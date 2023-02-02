
<x-front-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Halaman Konsultasi') }}
		</h2>
	</x-slot>
	
	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
				
				<form action="{{ route('konsultasi.tb.proses') }}" method="post" id="form-konsultasi">
					@csrf
					
					<div class="p-6 bg-white border-b border-gray-200">
						<h3 class="text-lg">Isi Data Diri</h3>
						<!-- Nama Lengkap -->
						<div class="mt-4">
							<x-label for="name" :value="__('Nama Lengkap')" />
							
							<x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
						</div>
						
						<div class="mt-4">
							<x-label for="email" :value="__('Email')" />
							
							<x-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" />
						</div>
						<div class="mt-4">
							<x-label for="phone" :value="__('Telepon')" />
							
							<x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" />
						</div>
						<div class="mt-4">
							<x-label for="address" :value="__('Alamat')" />
							
							<x-textarea class="block mt-1 w-full" name="address" :value="old('address')"></x-textarea>
						</div>
						
					</div>
					
					<div class="p-6 bg-white border-b border-gray-200">
						<h3 class="text-lg">Pilih Gejala yang Dialami</h3>
						<div class="mt-4">
							@forelse ($gejala as $k => $gej)
							{{ $k + 1 }}. {{ $gej->gejala }}
							<div class="mt-5">
								<fieldset>
									<div class="flex items-center mb-4">
										<input id="option-{{ $k. 'y' }}" type="radio" name="options-{{ $k }}" value="{{ $gej->id }}" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300" aria-labelledby="option-{{ $k. 'y' }}" aria-describedby="option-{{ $k. 'y' }}">
										<label for="option-{{ $k. 'y' }}" class="block ml-2 text-gray-900">
											Ya
										</label>
										<input id="option-{{ $k. 't' }}" type="radio" name="options-{{ $k }}" value="0" class="ml-6 w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300" aria-labelledby="option-{{ $k. 't' }}" aria-describedby="option-{{ $k. 't' }}" checked>
										<label for="option-{{ $k. 't' }}" class="block ml-2 text-gray-900">
											Tidak
										</label>
									</div>
								</fieldset>
							</div>
							@empty
							{{ __('Konsultasi belum tersedia.') }}
							@endforelse
						</div>
						
						<div class="mt-6">
							<x-button type="submit">{{ __('Proses') }}</x-button>
						</div>
						
						
						
					</div>
					
					
				</form>
			</div>
		</div>
	</div>
</x-front-layout>