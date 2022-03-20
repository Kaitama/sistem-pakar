<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Rule Base') }}
		</h2>
	</x-slot>
	
	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
				{{-- content --}}
				<h4 class="font-semibold p-6 bg-gray-50 border-b border-gray-200">
					Relasi Penyakit dan Gejala
				</h4>
				<div class="p-6 bg-white border-b border-gray-200">
					
					<div class="grid grid-cols-3 gap-4">
						{{-- left col --}}
						<div>
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
						
						{{-- right col --}}
						<div class="col-span-2">
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
			<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-5">
				<h4 class="font-semibold p-6 bg-gray-50 border-b border-gray-200">
					Nilai CF User
				</h4>
				<div class="p-6 bg-white border-b border-gray-200">
					<div class="grid grid-cols-3 gap-4">
						{{-- left content --}}
						<div>
							<form action="{{ route('cfuser.store') }}" method="post">
								@csrf
								<div class="mt-2">
									<x-label for="opsi" :value="__('Pilihan Jawaban')" />
									<x-input type="text" name="opsi" id="opsi" class="block mt-1 w-full" :value="old('opsi')" />
								</div>
								<div class="mt-4">
									<x-label for="nilai" :value="__('Nilai CF')" />
									<x-input type="text" name="nilai" id="nilai" class="block mt-1 w-full" :value="old('nilai')" />
									<span class="mt-1 text-xs text-gray-500">Gunakan titik untuk nilai pecahan. (Contoh: 2.35)</span>
								</div>

								<div class="mt-4">
									<x-button type="submit">Simpan</x-button>
								</div>
							</form>
							
						</div>
						
						{{-- right content --}}
						<div class="col-span-2">
							<x-table>
								<x-slot name="th">
									<x-th>No.</x-th>
									<x-th>Pilihan Jawaban</x-th>
									<x-th>Nilai CF</x-th>
									<x-th></x-th>
								</x-slot>
								@forelse ($cfusers as $k => $cfu)
								<tr class="bg-white border-b">
									<x-td>{{ $k + 1 }}</x-td>
									<x-td>{{ $cfu->opsi }}</x-td>
									<x-td>{{ number_format($cfu->nilai, 2, ',', '.') }}</x-td>
									<x-td>
										<x-button-link class="bg-red-600 text-white" href="{{ route('cfuser.delete', $cfu->id) }}">Hapus</x-button-link>
									</x-td>
								</tr>
								@empty
								<tr class="bg-white border-b">
									<x-td colspan="4">Data masih kosong.</x-td>
								</tr>
								@endforelse
							</x-table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</x-app-layout>