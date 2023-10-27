@if(session('success'))
    <div class="mx-auto w-1/2">
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-200" role="alert">
            <span class="font-medium flex justify-center">{{ session('success') }}</span>
        </div>
    </div>
@endif
