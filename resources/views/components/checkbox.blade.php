@props(['name'])

<div class="flex items-center">
	<input name="{{ $name }}" id="checkbox-1" aria-describedby="checkbox-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2">
	<label for="checkbox-1" class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">
		{{ $slot }}
	</label>
</div>