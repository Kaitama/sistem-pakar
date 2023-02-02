<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
	<!-- Primary Navigation Menu -->
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
		<div class="flex justify-between h-16">
			<div class="flex">
				<!-- Logo -->
				<div class="shrink-0 flex items-center">
					<a href="{{ route('dashboard') }}">
						<x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
					</a>
				</div>
				
				<!-- Navigation Links -->
				<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
					<x-nav-link :href="route('homepage')" :active="request()->routeIs('homepage')">
						{{ __('Home') }}
					</x-nav-link>
				</div>
				<!-- Navigation Links -->
				<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
					@switch(config('app.metode'))
							@case(1)
							<x-nav-link :href="route('konsultasi.cf')" :active="request()->routeIs('konsultasi.*')">
								{{ __('Konsultasi') }}
							</x-nav-link>
									@break
							@case(2)
							<x-nav-link :href="route('konsultasi.tb')" :active="request()->routeIs('konsultasi.*')">
								{{ __('Konsultasi') }}
							</x-nav-link>
									@break
							@default
									
					@endswitch
					
				</div>
				
				
				
			</div>
			
			<!-- Settings Dropdown -->
			<div class="hidden sm:flex sm:items-center sm:ml-6">
				
				@auth
					<x-nav-link :href="route('dashboard')">Dashboard</x-nav-link>
				@else
				<x-nav-link :href="route('login')">Log in</x-nav-link>
				
				@if (Route::has('register'))
				@if(!\App\Models\User::exists())
				<x-nav-link :href="route('register')">Register</x-nav-link>
				@endif
				@endif
				@endauth
				
				
			</div>
		</div>
		
	</div>
</nav>
