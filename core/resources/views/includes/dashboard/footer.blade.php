{{-- Dashboard Site footer --}}
<div class="container">
    @if (count($pages))
        <nav class="pull-left">
            <ul>
                @forelse($pages as $page)
                    @if($page->slug != '404' || $page->status != 0)
                        <li>
                            <a href="{{ route('viewPage', ['slug' => $page->slug]) }}">
                                {{ $page->name }}
                            </a>
                        </li>
                    @endif
                @empty
                @endforelse
            </ul>
        </nav>
    @endif
    <div class="copyright pull-right">
        © By {{config('app.name')}} {{ date('Y') }}
    </div>
</div>
{{-- !Dashboard Site footer --}}