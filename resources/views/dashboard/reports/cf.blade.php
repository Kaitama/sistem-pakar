<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Laporan Konsultasi') }}
		</h2>
	</x-slot>
	
	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

				{{-- daftar penyakit --}}
				<x-table class="table-auto">
					<x-slot name="th">
						<x-th>No</x-th>
						<x-th>Tanggal</x-th>
						<x-th>Pasien</x-th>
						@forelse ($penyakits as $pen)
							<x-th>{{ $pen->penyakit }}</x-th>
						@empty
							<x-th></x-th>
						@endforelse
					</x-slot>
					@forelse ($reports as $k => $report)
					<tr class="bg-white border-b">
						<x-td>{{ $k + 1 }}</x-td>
						<x-td>{{ $report->created_at->isoFormat('LL') }}</x-td>
						<x-td>
							<div class="font-semibold font-medium text-indigo-700">{{ $report->name }}</div>
							<div class="text-sm">{{ $report->phone }} | {{ $report->email }}</div>
						</x-td>

					@foreach ($report->penyakits->sortBy('kode') as $p)
					<x-td class="">
						@if($p->pivot->percentage > 0)
						{{ number_format($p->pivot->percentage * 100, 2, ',', '.') }} %
						@else
						-
						@endif
					</x-td>
					@endforeach
						
					</tr>
					@empty

					@endforelse
				</x-table>

		</div>
	</div>
</x-app-layout>