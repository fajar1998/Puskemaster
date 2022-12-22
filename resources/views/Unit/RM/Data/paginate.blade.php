@if ($rekdata->hasPages())
    <ul class="pagination" role="navigation">
        {{-- Previous Page Link --}}
        @if ($rekdata->onFirstPage())
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="page-link" aria-hidden="true">&lsaquo;</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $rekdata->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            </li>
        @endif
 
        <?php
            $start = $rekdata->currentPage() - 1; // show 3 pagination links before current
            $end = $rekdata->currentPage() + 1; // show 3 pagination links after current
            if($start < 1) {
                $start = 1; // reset start to 1
                $end += 1;
            } 
            if($end >= $rekdata->lastPage() ) $end = $rekdata->lastPage(); // reset end to last page
        ?>
 
        @if($start > 1)
            <li class="page-item">
                <a class="page-link" href="{{ $rekdata->url(1) }}">{{1}}</a>
            </li>
            @if($rekdata->currentPage() != 4)
                {{-- "Three Dots" Separator --}}
                <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
            @endif
        @endif
            @for ($i = $start; $i <= $end; $i++)
                <li class="page-item {{ ($rekdata->currentPage() == $i) ? ' active' : '' }}">
                    <a class="page-link" href="{{ $rekdata->url($i) }}">{{$i}}</a>
                </li>
            @endfor
        @if($end < $rekdata->lastPage())
            @if($rekdata->currentPage() + 3 != $rekdata->lastPage())
                {{-- "Three Dots" Separator --}}
                <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
            @endif
            <li class="page-item">
                <a class="page-link" href="{{ $rekdata->url($rekdata->lastPage()) }}">{{$rekdata->lastPage()}}</a>
            </li>
        @endif
 
        {{-- Next Page Link --}}
        @if ($rekdata->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $rekdata->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="page-link" aria-hidden="true">&rsaquo;</span>
            </li>
        @endif
    </ul>
@endif