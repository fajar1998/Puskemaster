@if ($ap->hasPages())
    <ul class="pagination" role="navigation">
        {{-- Previous Page Link --}}
        @if ($ap->onFirstPage())
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="page-link" aria-hidden="true">&lsaquo;</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $ap->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            </li>
        @endif
 
        <?php
            $start = $ap->currentPage() - 1; // show 3 pagination links before current
            $end = $ap->currentPage() + 1; // show 3 pagination links after current
            if($start < 1) {
                $start = 1; // reset start to 1
                $end += 1;
            } 
            if($end >= $ap->lastPage() ) $end = $ap->lastPage(); // reset end to last page
        ?>
 
        @if($start > 1)
            <li class="page-item">
                <a class="page-link" href="{{ $ap->url(1) }}">{{1}}</a>
            </li>
            @if($ap->currentPage() != 4)
                {{-- "Three Dots" Separator --}}
                <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
            @endif
        @endif
            @for ($i = $start; $i <= $end; $i++)
                <li class="page-item {{ ($ap->currentPage() == $i) ? ' active' : '' }}">
                    <a class="page-link" href="{{ $ap->url($i) }}">{{$i}}</a>
                </li>
            @endfor
        @if($end < $ap->lastPage())
            @if($ap->currentPage() + 3 != $ap->lastPage())
                {{-- "Three Dots" Separator --}}
                <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
            @endif
            <li class="page-item">
                <a class="page-link" href="{{ $ap->url($ap->lastPage()) }}">{{$ap->lastPage()}}</a>
            </li>
        @endif
 
        {{-- Next Page Link --}}
        @if ($ap->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $ap->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="page-link" aria-hidden="true">&rsaquo;</span>
            </li>
        @endif
    </ul>
@endif