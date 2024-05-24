<div class="container" style="margin-top: 90px">
    @if(session('success'))
        <div class="alert alert-warning" role="alert">
            {{ $message }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-warning" role="alert">
            {{ $message }}
        </div>
    @endif

    @error('email')
        <div class="alert alert-warning" role="alert">
            {{ $message }}
        </div>
    @enderror

    @error('password')
        <div class="alert alert-warning" role="alert">
            {{ $message }}
        </div>
    @enderror
</div>
