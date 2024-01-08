<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Car</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
     <div class="col-12">
        {{-- Splitting url so that locale can be set to url and    after redirection stays on the same page --}}
        @php
          $url = url()->full();
          $pos = strpos($url, app()->getLocale());
        @endphp
        <a href="{{ substr_replace($url,"en",$pos,2) }}" class="btn btn-info"> English</a>
        <a href="{{ substr_replace($url,"ar",$pos,2) }}" class="btn btn-primary"> Arabic</a>
        </div>
    <h2>{{ __('messages.addCar')}}</h2>
    <form action="{{route('storeCar')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">{{ __('messages.Title')}}</label>
            <input type="text" class="form-control" id="title" placeholder="{{ __('messages.enter1')}}" name="carTitle" value="{{ old('carTitle') }}">
            @error('carTitle')
            <div class="alert alert-warning">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="price">{{ __('messages.Price')}}</label>
            <input type="number" class="form-control" id="price" placeholder="{{ __('messages.enter2')}}" name="price" value="{{ old('price') }}">
        </div>
        <div class="form-group">
            <label for="description">{{ __('messages.descriptions')}}</label>
            <textarea class="form-control" rows="5" id="description" name="description">{{ old('description') }}</textarea>
            @error('description')
                {{ $message }}
            @enderror
        </div>
        <div class="form-group">
            <label for="image">{{ __('messages.image')}}</label>
            <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
          
        </div>
        <div class="checkbox">
            <label><input type="checkbox" name="published">{{ __('messages.published')}}</label>
        </div>
        <button type="submit" class="btn btn-default">{{ __('messages.add')}}</button>
    </form>
</div>

</body>
</html>
