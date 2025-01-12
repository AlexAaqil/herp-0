@props(['header_title', 'total_count', 'route'])

<div class="header">
    <p>
        {{ $header_title }} 
        @if(isset($total_count))
            <span>({{ $total_count }})</span>
        @endif
    </p>
    <input type="text" name="search" id="myInput" onkeyup="searchFunction()" placeholder="Search">
    @if(isset($route))
        <div class="header_btn">
            <a href="{{ $route }}">New</a>
        </div>
    @endif
</div>