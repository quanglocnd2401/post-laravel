{{-- option categories --}}
@props(['level'])

<option value="{{ $category->id }}">{{str_repeat('-',$level)}} {{ $category->name }} </option>


