
@extends('front.master')

@section('title', 'Home Page - warta suara')

@section('content')



<body class="font-[Poppins] pb-[72px]">
	<x-navbar />
	<nav id="Category" class="max-w-[1130px] mx-auto flex flex-wrap justify-center items-center gap-4 mt-[30px] px-4  overflow-x-auto">
		@foreach ($categories as $category)
		<a href="{{route('front.category', $category->slug)}}" class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#143D60] whitespace-nowrap">
			<div class="w-6 h-6 flex shrink-0">
				<img src="{{Storage::url($category->icon)}}" alt="icon" />
			</div>
			<span>{{$category->name}}</span>
		</a>
		@endforeach
	</nav>
	

	


		<section id="Featured" class="mt-[30px]">
			<div class="main-carousel w-full">
				@forelse ($featured_articles as $articles)
				
				<div class="featured-news-card relative w-full h-[550px] flex shrink-0 overflow-hidden">
					<img src="{{Storage::url($articles->thumbnail)}}" class="thumbnail absolute w-full h-full object-cover" alt="icon" />
					{{-- <div class="w-full h-full bg-gradient-to-b from-[rgba(0,0,0,0)] to-[rgba(0,0,0,0.9)] absolute z-10"></div> --}}
					<div class="w-full h-full bg-gradient-to-b from-[rgba(43,111,169,0)] to-[rgba(20,61,96,0.9)] absolute z-10"></div>

					<div class="card-detail max-w-[1130px] w-full mx-auto flex items-end justify-between pb-10 relative z-20">
						<div class="flex flex-col gap-[10px]">
							<p class="text-white">Featured</p>
							<a href="{{route('front.details', $articles->slug)}}" class="font-bold text-4xl leading-[45px] text-white two-lines hover:underline transition-all duration-300">{{$articles->name}}</a>
							<p class="text-white"{{$articles->created_at->format('d M, Y')}} • {{$articles->category->name}}</p>
						</div>
						<div class="prevNextButtons flex items-center gap-4 mb-[20px] sm:mb-[60px]">
							<button class="button--previous appearance-none w-[38px] h-[38px] flex items-center justify-center rounded-full shrink-0 ring-1 ring-white hover:ring-2 hover:ring-[#143D60] transition-all duration-300">
								<img src="assets/images/icons/arrow.svg" alt="arrow" />
							</button>
							<button class="button--next appearance-none w-[38px] h-[38px] flex items-center justify-center rounded-full shrink-0 ring-1 ring-white hover:ring-2 hover:ring-[#143D60] transition-all duration-300 rotate-180">
								<img src="assets/images/icons/arrow.svg" alt="arrow" />
							</button>
						</div>
					</div>
				</div>
				@empty
				<p>No recent data yet</p>
					
				@endforelse
				
			</div>
		</section>
		<section id="Up-to-date" class="max-w-[1130px] mx-auto px-4 md:px-6 lg:px-0 flex flex-col gap-[30px] mt-[70px]">
			<div class="flex justify-between items-center">
				<h2 class="font-bold text-[26px] leading-[39px]">
					Latest Hot News <br />
					Good for Curiousity
				</h2>
				<p class="badge-orange rounded-full p-[8px_18px] bg-[#143D60] font-bold text-sm leading-[21px] text-[#FFFFFF] w-fit">UP TO DATE</p>
			</div>
			<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-[30px]">
				@forelse ($notfeatured_articles as $article)
				
				<a href="{{route('front.details', $article->slug)}}" class="card-news">
					<div class="rounded-[20px] ring-1 ring-[#EEF0F7] p-[26px_20px] flex flex-col gap-4 hover:ring-2 hover:ring-[#143D60] transition-all duration-300 bg-white">
						<div class="thumbnail-container w-full h-[200px] rounded-[20px] flex shrink-0 overflow-hidden relative">
							<p class="badge-white absolute top-5 left-5 rounded-full p-[8px_18px] bg-[#143D60] font-bold text-[#FFFFFF] text-xs leading-[18px] uppercase">{{$article->category->name}}</p>
							<img src="{{Storage::url($article->thumbnail)}}" class="object-cover w-full h-full" alt="thumbnail" />
						</div>
						<div class="card-info flex flex-col gap-[6px]">
							<h3 class="font-bold text-lg leading-[27px]">{{$article->name}}</h3>
							<p class="text-sm leading-[21px] text-[#A3A6AE]">{{$article->created_at->format('d M, Y')}}</p>
						</div>
					</div>
				</a>
			@empty
				<p>No recent data yet</p>
			@endforelse
				
			</div>
		</section>
		<section id="Best-authors" class="max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-[70px]">
			<div class="flex flex-col text-center gap-[14px] items-center">
				<p class="badge-orange rounded-full p-[8px_18px] bg-[#143D60] font-bold text-sm leading-[21px] text-[#FFFFFF] w-fit">BEST AUTHORS</p>
				<h2 class="font-bold text-[26px] leading-[39px]">
					Explore All Masterpieces <br />
					Written by People
				</h2>
			</div>
			<div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-[30px]">
				@forelse($authors as $author)
				<a href="{{route('front.author', $author->slug)}}" class="card-authors">
					<div class="rounded-[20px] border border-[#EEF0F7] p-[26px_20px] flex flex-col items-center gap-4 hover:ring-2 hover:ring-[#143D60] transition-all duration-300">
						<div class="w-[70px] h-[70px] flex shrink-0 rounded-full overflow-hidden">
							{{-- {{ dd(Storage::url($author->avatar)) }} --}}
							<img src="{{Storage::url($author->avatar)}}" class="object-cover w-full h-full" alt="avatar" />
						</div>
						<div class="flex flex-col gap-1 text-center">
							<p class="font-semibold">{{$author->name}}</p>
							<p class="text-sm leading-[21px] text-[#A3A6AE]">{{$author->news->count()}}</p>
						</div>
					</div>
				</a>
				@empty
				<p>No recent data yet</p>
				@endforelse
				
			</div>
		</section>
		<section id="Advertisement" class="max-w-[1130px] mx-auto flex justify-center mt-[70px]">
			<div class="flex flex-col gap-3 shrink-0 w-fit">
				<a href="#">
					<div class="w-full max-w-[900px] h-[120px] border border-[#EEF0F7] rounded-2xl overflow-hidden">
						<img src="{{Storage::url($bannerads->thumbnail)}}" class="object-cover w-full h-full" alt="ads" />
					</div>
				</a>
				<p class="font-medium text-sm leading-[21px] text-[#A3A6AE] flex gap-1">
					Our Advertisement <a href="#" class="w-[18px] h-[18px]"><img src="assets/images/icons/message-question.svg" alt="icon" /></a>
				</p>
			</div>
		</section>


		<section id="Latest-automotive" class="max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-[70px]">
			<div class="flex justify-between items-center">
				<h2 class="font-bold text-[26px] leading-[39px]">
					Latest For You <br />
					in Entertainment
				</h2>
				<a href="{{ route('front.category', 'Entertaiment') }}" class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#143D60]">Explore All</a>
			</div>
			<div class="flex flex-col lg:flex-row gap-6 h-fit">
				<div class="featured-news-card relative w-full h-[424px] flex flex-1 rounded-[20px] overflow-hidden">
					<img src="{{Storage::url($entertaiment_featured_articles->thumbnail)}}" class="thumbnail absolute w-full h-full object-cover" alt="icon" />
					<div class="w-full h-full bg-gradient-to-b from-[rgba(43,111,169,0)] to-[rgba(20,61,96,0.9)] absolute z-10"></div>
					<div class="card-detail w-full flex items-end p-[30px] relative z-20">
						<div class="flex flex-col gap-[10px]">
							<p class="text-white">Featured</p>
							<a href="{{route('front.details', $entertaiment_featured_articles->slug)}}" class="font-bold text-[30px] leading-[36px] text-white hover:underline transition-all duration-300">{{$entertaiment_featured_articles->name}}</a>
							<p class="text-white">{{$entertaiment_featured_articles->created_at->format('d M,Y')}}</p>
						</div>
					</div>
				</div>
				<div class="h-[424px] w-fit px-5 overflow-y-scroll overflow-x-hidden relative custom-scrollbar">
					<div class="w-[455px] flex flex-col gap-5 shrink-0">
						@forelse ($entertaiment_articles as $entertaiment)
						<a href="{{route('front.details', $entertaiment->slug)}}" class="card py-[2px]">
							<div class="rounded-[20px] border border-[#EEF0F7] p-[14px] flex items-center gap-4 hover:ring-2 hover:ring-[#143D60] transition-all duration-300">
								<div class="w-[130px] h-[100px] flex shrink-0 rounded-[20px] overflow-hidden">
									<img src="{{Storage::url($entertaiment->thumbnail)}}" class="object-cover w-full h-full" alt="thumbnail" />
								</div>
								<div class="flex flex-col justify-center-center gap-[6px]">
									<h3 class="font-bold text-lg leading-[27px]">{{ substr($entertaiment->name, 0, 50)}}{{ strlen($entertaiment->name)> 50 ? '...':''}}</h3>
									<p class="text-sm leading-[21px] text-[#A3A6AE]">{{$entertaiment->created_at->format('d M, Y')}}</p>
								</div>
							</div>
						</a>
						@empty
							<p>No recent data yet</p>
						@endforelse
						
					</div>
					<div class="sticky z-10 bottom-0 w-full h-[100px] bg-gradient-to-b from-[rgba(255,255,255,0.19)] to-[rgba(255,255,255,1)]"></div>
					
				</div>
			</div>
		</section>

		<section id="Latest-automotive" class="max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-[70px]">
			<div class="flex justify-between items-center">
				<h2 class="font-bold text-[26px] leading-[39px]">
					Latest For You <br />
					in Business
				</h2>
				<a href="{{ route('front.category', 'Business') }}" class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#143D60]">Explore All</a>
			</div>
			<div class="flex flex-col lg:flex-row gap-6 h-fit">
				<div class="featured-news-card relative w-full h-[424px] flex flex-1 rounded-[20px] overflow-hidden">
					<img src="{{Storage::url($business_featured_articles->thumbnail)}}" class="thumbnail absolute w-full h-full object-cover" alt="icon" />
					<div class="w-full h-full bg-gradient-to-b from-[rgba(43,111,169,0)] to-[rgba(20,61,96,0.9)] absolute z-10"></div>
					<div class="card-detail w-full flex items-end p-[30px] relative z-20">
						<div class="flex flex-col gap-[10px]">
							<p class="text-white">Featured</p>
							<a href="{{route('front.details', $business_featured_articles->slug)}}" class="font-bold text-[30px] leading-[36px] text-white hover:underline transition-all duration-300">{{$business_featured_articles->name}}</a>
							<p class="text-white">{{$business_featured_articles->created_at->format('d M,Y')}}</p>
						</div>
					</div>
				</div>
				<div class="h-[424px] w-fit px-5 overflow-y-scroll overflow-x-hidden relative custom-scrollbar">
					<div class="w-[455px] flex flex-col gap-5 shrink-0">
						@forelse ($business_articles as $business)
						<a href="{{route('front.details', $business->slug)}}" class="card py-[2px]">
							<div class="rounded-[20px] border border-[#EEF0F7] p-[14px] flex items-center gap-4 hover:ring-2 hover:ring-[#143D60] transition-all duration-300">
								<div class="w-[130px] h-[100px] flex shrink-0 rounded-[20px] overflow-hidden">
									<img src="{{Storage::url($business->thumbnail)}}" class="object-cover w-full h-full" alt="thumbnail" />
								</div>
								<div class="flex flex-col justify-center-center gap-[6px]">
									<h3 class="font-bold text-lg leading-[27px]">{{ substr($business->name, 0, 50)}}{{ strlen($business->name)> 50 ? '...':''}}</h3>
									<p class="text-sm leading-[21px] text-[#A3A6AE]">{{$business->created_at->format('d M, Y')}}</p>
								</div>
							</div>
						</a>
						@empty
							<p>No recent data yet</p>
						@endforelse
						
					</div>
					<div class="sticky z-10 bottom-0 w-full h-[100px] bg-gradient-to-b from-[rgba(255,255,255,0.19)] to-[rgba(255,255,255,1)]"></div>
					
				</div>
			</div>
		</section>

		<section id="Latest-automotive" class="max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-[70px]">
			<div class="flex justify-between items-center">
				<h2 class="font-bold text-[26px] leading-[39px]">
					Latest For You <br />
					in Politics
				</h2>
				<a href="{{ route('front.category', 'Politics') }}" class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#143D60]">Explore All</a>
			</div>
			<div class="flex flex-col lg:flex-row gap-6 h-fit">
				<div class="featured-news-card relative w-full h-[424px] flex flex-1 rounded-[20px] overflow-hidden">
					<img src="{{Storage::url($politics_featured_articles->thumbnail)}}" class="thumbnail absolute w-full h-full object-cover" alt="icon" />
					<div class="w-full h-full bg-gradient-to-b from-[rgba(43,111,169,0)] to-[rgba(20,61,96,0.9)] absolute z-10"></div>
					<div class="card-detail w-full flex items-end p-[30px] relative z-20">
						<div class="flex flex-col gap-[10px]">
							<p class="text-white">Featured</p>
							<a href="{{route('front.details', $politics_featured_articles->slug)}}" class="font-bold text-[30px] leading-[36px] text-white hover:underline transition-all duration-300">{{$politics_featured_articles->name}}</a>
							<p class="text-white">{{$politics_featured_articles->created_at->format('d M,Y')}}</p>
						</div>
					</div>
				</div>
				<div class="h-[424px] w-fit px-5 overflow-y-scroll overflow-x-hidden relative custom-scrollbar">
					<div class="w-[455px] flex flex-col gap-5 shrink-0">
						@forelse ($politics_articles as $politics)
						<a href="{{route('front.details', $politics->slug)}}" class="card py-[2px]">
							<div class="rounded-[20px] border border-[#EEF0F7] p-[14px] flex items-center gap-4 hover:ring-2 hover:ring-[#143D60] transition-all duration-300">
								<div class="w-[130px] h-[100px] flex shrink-0 rounded-[20px] overflow-hidden">
									<img src="{{Storage::url($politics->thumbnail)}}" class="object-cover w-full h-full" alt="thumbnail" />
								</div>
								<div class="flex flex-col justify-center-center gap-[6px]">
									<h3 class="font-bold text-lg leading-[27px]">{{ substr($politics->name, 0, 50)}}{{ strlen($politics->name)> 50 ? '...':''}}</h3>
									<p class="text-sm leading-[21px] text-[#A3A6AE]">{{$politics->created_at->format('d M, Y')}}</p>
								</div>
							</div>
						</a>
						@empty
							<p>No recent data yet</p>
						@endforelse
						
					</div>
					<div class="sticky z-10 bottom-0 w-full h-[100px] bg-gradient-to-b from-[rgba(255,255,255,0.19)] to-[rgba(255,255,255,1)]"></div>
					
				</div>
			</div>
		</section>
</body>
@endsection
@push('after-styles')
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css" />

@endpush

@push('after-scripts')
<script src="{{asset('customjs/two-lines-text.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- JavaScript -->
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script src="{{asset('customjs/carousel.js')}}"></script>
<script src="https://cdn.tailwindcss.com"></script>

	
@endpush