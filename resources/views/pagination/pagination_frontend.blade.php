@if ($paginator->lastPage() > 1)
<ul class="pagination">
    <li style="padding-right: 7px" class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
        <a href="{{ $paginator->url(1) }}">Trang Trước</a>
    </li>
    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        <li style="padding-right: 7px; padding-left: 7px" class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
            <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
        </li>
    @endfor
    <li style="padding-right: 7px; padding-left: 7px" class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
        <a href="{{ $paginator->url($paginator->currentPage()+1) }}" >Trang Sau</a>
    </li>
</ul>
@endif
