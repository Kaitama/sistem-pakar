<div class="flex flex-col mx-4">
	<div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
		<div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
			<div class="overflow-hidden shadow-md sm:rounded-lg">
				
				<table class="min-w-full">
					<thead class="bg-gray-50">
						<tr>
							{{ $th }}
						</tr>
					</thead>
					<tbody>
						{{ $slot }}
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>