<link rel="stylesheet" href="{{ asset('frontend/css/plugins/bootstrap.css') }}" />
<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}" />

@if ($paginator->hasPages())
<div class="ec-pro-pagination">
                           
    <span>Showing {{$paginator->currentPage()}} of {{ceil($paginator->total() / $paginator->perPage())}} pages </span>
    <ul class="ec-pro-pagination-inner">
        {{-- @if ($paginator->onFirstPage())
        <li class="page-item disabled">
            <a class="page-link" href="#" 
               tabindex="-1">Previous</a>
        </li>
        @else
        <li class="page-item"><a class="page-link" 
            href="{{ $paginator->previousPageUrl() }}">
                  Previous</a>
          </li>
        @endif --}}
  
        @foreach ($elements as $element)
        @if (is_string($element))
        <li class="page-item disabled">{{ $element }}</li>
        @endif
  
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="page-item active">
            <a class="page-link">{{ $page }}</a>
        </li>
        @else
        <li class="page-item">
            <a class="page-link" 
               href="{{ $url }}">{{ $page }}</a>
        </li>
        @endif
        @endforeach
        @endif
        @endforeach
  
        @if ($paginator->hasMorePages())
        <li class="page-item">
            <a class="next" 
               href="{{ $paginator->nextPageUrl() }}" 
               rel="next">Next <i class="ecicon eci-angle-right"></i></a>
        </li>
        @else
        <li class="page-item disabled">
            <a class="next" href="#">Next <i class="ecicon eci-angle-right"></i></a>
        </li>
        {{-- <li class="page-item disabled">
            <a class="page-link" href="#">Next</a>
        </li> --}}
        @endif
    </ul>
</div>

@endif