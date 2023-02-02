
<x-front-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Halaman Konsultasi') }}
		</h2>
	</x-slot>
	
	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
				
				
				<div class="p-6 bg-white border-b border-gray-200">
					<h4 class="text-xl font-semibold text-gray-700">Isi Data Diri</h4>
				</div>
				
				<form action="{{ route('konsultasi.cf.proses') }}" method="post" id="form-konsultasi">
					@csrf
					
					<div class="p-6 bg-white border-b border-gray-200">
						<div class="px-4">
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
						
					</div>
					
					
					<div class="p-6 bg-white border-b border-gray-200">
						<h4 class="text-xl font-semibold text-gray-700">Pilih Gejala yang Dialami</h4>
					</div>
					<div class="p-6 bg-white border-b border-gray-200">
						<div class="mt-4">
							<dl>
								@forelse ($gejala as $k => $gej)
								
								<div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
									<dt class="font-medium text-gray-500">{{ $k + 1 }}. {{ $gej->gejala }}</dt>
									<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
										<x-select name="options-{{ $k }}" class="mb-4 w-32">
											@foreach ($cfusers as $c => $cf)
											<option value="{{ $gej->id . '-' . $cf->id }}">{{ $cf->opsi }}</option>
											@endforeach
										</x-select>
									</dd>
								</div>
								
								
								
								
								
								
								@empty
								{{ __('Konsultasi belum tersedia.') }}
								@endforelse
							</dl>
						</div>
						
						<div class="mt-6 px-4">
							<x-button type="submit">{{ __('Proses') }}</x-button>
						</div>
						
						
						
					</div>
					
					
				</form>
			</div>
		</div>
	</div>
</x-front-layout>