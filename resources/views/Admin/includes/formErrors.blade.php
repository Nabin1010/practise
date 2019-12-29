@if (!$errors->isEmpty())
<div>
    <div>
        <strong>Oops!!!! something went wrong</strong>
    </div>
    @foreach ($errors->all() as $errors )
    <div class="alert alert-danger" role="alert">
        {{$errors}}
    </div>
        
    @endforeach
</div>
    
@endif