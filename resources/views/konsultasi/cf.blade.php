
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
					<form action="{{ route('konsultasi.cf.proses') }}" method="post" id="form-konsultasi">
						@csrf
						
						@forelse ($gejala as $k => $gej)
						{{ $k + 1 }}. {{ str_replace('.', '?', $gej->gejala) }}
						<div class="mt-5">
							<fieldset>
								@foreach ($cfusers as $cf)
								<div class="flex items-center mb-4">
									<input id="country-option-{{ $k }}" type="radio" name="options-{{ $k }}" value="{{ $gej->id . '-' . $cf->id }}" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300" aria-labelledby="country-option-{{ $k }}" aria-describedby="country-option-{{ $k }}" checked>
									<label for="country-option-{{ $k }}" class="block ml-2 text-sm font-medium text-gray-900">
										{{ $cf->opsi }}
									</label>
								</div>
								@endforeach				
							</fieldset>
						</div>
						@empty
						{{ __('Konsultasi belum tersedia.') }}
						@endforelse

						<div class="mt-6">
							<x-button type="submit">{{ __('Proses') }}</x-button>
						</div>
						
					</form>
					
				</div>
			</div>
		</div>
	</div>
</x-front-layout>