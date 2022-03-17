<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Rule Base') }}
		</h2>
	</x-slot>
	
	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
				<div class="p-6 bg-white border-b border-gray-200">
					
					{{-- content --}}
					<form action="{{ route('rule.cf.sync') }}" method="post">
						@csrf
						
						<div class="mt-2">
							<x-label for="penyakit" :value="__('Pilih Penyakit')" />
							<x-select id="penyakit" class="mt-1" name="penyakit" :value="old('penyakit')">
								@foreach ($penyakits as $penyakit)
								<option value="{{ $penyakit->id }}">{{ $penyakit->kode }} - {{ $penyakit->penyakit }}</option>
								@endforeach
							</x-select>
						</div>
						<div class="mt-4">
							<x-label for="gejala" :value="__('Pilih Gejala')" />
							
							<fieldset>
								@foreach ($gejalacf as $k=>$gejala)
								
								<div class="flex items-center mt-1">
									<input name="gejala[]" value="{{ $gejala->id }}" id="checkbox-{{ $k }}" aria-describedby="checkbox-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 focus:ring-2">
									<label for="checkbox-{{ $k }}" class="ml-3 text-sm font-medium text-gray-900">
										{{ $gejala->kode }} - {{ $gejala->gejala }}
									</label>
								</div>
								@endforeach
							</fieldset>
						</div>
						
						<div class="mt-4">
							<x-button type="submit">Simpan</x-button>
						</div>
					</form>
					
					
					
				</div>
				
				<div class="mt-5">
					<x-table>
						<x-slot name="th">
							<x-th>No.</x-th>
							<x-th>Nama Penyakit</x-th>
							<x-th>Rule</x-th>
						</x-slot>
						@foreach ($penyakits as $k => $pen)
						<tr class="bg-white border-b">
							<x-td>{{ $k + 1 }}</x-td>
							<x-td>{{ $pen->penyakit }}</x-td>
							<x-td>
								
								@foreach ($pen->gejalacfs as $gej)
								@if(!$loop->last)
								<span class="font-bold">{{ $gej->kode }}</span> AND
								@else
								<span class="font-bold">{{ $gej->kode }}</span>
								@endif
								@endforeach
							</x-td>
						</tr>
						@endforeach
					</x-table>
				</div>
				
			</div>
		</div>
	</div>
</x-app-layout>