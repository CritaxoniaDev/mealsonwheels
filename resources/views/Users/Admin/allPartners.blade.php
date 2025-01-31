@extends('layouts.app')
@section('title', 'Partner - Admin')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/header.css') }}">
@endpush
@section('content')
<section class="bg-gradient-to-r from-blue-50 to-indigo-100 py-16" id="header2">
	<div class="container mx-auto px-4">
		<div class="text-center mb-16">
			<h2 class="text-4xl font-extrabold text-indigo-700 mb-4">Our Partners</h2>
			<p class="text-xl text-gray-600">Esteemed organizations collaborating with MerryMeals charity</p>
		</div>

		@if (Session::has('partnerDeleted'))
		<div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-8" role="alert">
			<p class="font-bold">{{ Session::get('partnerDeleted') }}</p>
		</div>
		@endif

		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
			@foreach ($partnerData as $partner)
			<div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-500 hover:scale-105">
				<div class="p-8">
					<div class="text-center mb-6">
						<span class="inline-block p-3 rounded-full bg-purple-100 text-purple-500">
							<img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode($partner->partnership_restaurant) }}&color=7F9CF5&background=EBF4FF" alt="Partner Avatar">
						</span>
					</div>
					<h3 class="text-2xl font-semibold text-gray-800 text-center mb-4">{{ $partner->partnership_restaurant }}</h3>
					<div class="space-y-2 text-gray-600">
						<p><span class="font-semibold">Address:</span> {{ DB::table('users')->where('id',$partner->user_id)->value('address') }}</p>
						<p><span class="font-semibold">Phone:</span> {{ DB::table('users')->where('id',$partner->user_id)->value('phone') }}</p>
						<p><span class="font-semibold">Email:</span> {{ DB::table('users')->where('id',$partner->user_id)->value('email') }}</p>
						<p><span class="font-semibold">Partnership Duration:</span> {{ $partner->partnership_duration }}</p>
					</div>
					<div class="mt-6 flex justify-center space-x-4">
						<a href="{{ route('admin#updatePartner', $partner->user_id) }}" class="text-blue-500 hover:text-blue-700">
							<svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
							</svg>
						</a>
						<a href="{{ route('admin#deletePartner', $partner->user_id) }}" class="text-red-500 hover:text-red-700">
							<svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
							</svg>
						</a>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
@endsection