@if ($errors->any())
<div class="">
    <ul class="absolute w-auto">
        @foreach ($errors->all() as $error)
            <li class="bg-red-600 pl-3 pr-10 py-3 text-white w-full my-1" style="max-width: 100%;"><i class="fas fa-times absolute right-0 mr-3 cursor-pointer mt-1" onclick="this.parentElement.style.display='none';"></i>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(session()->has('message'))
<div class="">
    <ul class="absolute w-auto">
        <li class="bg-green-600 pl-3 pr-10 py-3 text-white w-full my-1" style="max-width: 100%;"><i class="fas fa-times absolute right-0 mr-3 cursor-pointer mt-1" onclick="this.parentElement.style.display='none';"></i>{{ session()->get('message') }}</li>
    </ul>
</div>
@endif
