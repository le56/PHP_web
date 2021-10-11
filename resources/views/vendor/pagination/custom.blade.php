
@if ($paginator->hasPages())
    <div class="nk-gap-3"></div>
            <div class="nk-pagination nk-pagination-center">
                <a href="{{ $paginator->previousPageUrl() }}" class="nk-pagination-prev">
                    <span class="ion-ios-arrow-back"></span>
                </a>
                <nav>
        
                    @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                    
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a href="#" class="nk-pagination-current">{{ $page }}</a>
                        @else
                           
                            <a href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

                </nav>
                <a href="{{ $paginator->nextPageUrl() }}" class="nk-pagination-next">
                    <span class="ion-ios-arrow-forward"></span>
                </a>
        </div>
@endif 



      