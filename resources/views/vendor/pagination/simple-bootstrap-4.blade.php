@if ($paginator->hasPages())
<div class="btn-group mx-auto btn-group-justified" role="group" aria-label="Basic example">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
<button href="" type="button" disabled class="btn btn-light"><i class="fa fa-arrow-left"></i> Terbaru</button>
 @else
 <a href="{{ $paginator->previousPageUrl() }}" type="button" class="btn btn-light"><i class="fa fa-arrow-left"></i> Terbaru</a>
 @endif
{{-- Next Page Link --}}
@if ($paginator->hasMorePages())
<a href="{{ $paginator->nextPageUrl() }}" type="button" class="btn btn-light">Terdahulu <i class="fa fa-arrow-right"></i></a>
 @else
 <button href=""  type="button" class="btn btn-light" disabled >Terdahulu <i class="fa fa-arrow-right"></i></button>
 @endif
</div>
@endif
