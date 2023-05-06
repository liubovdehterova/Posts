@section('paginator')

    @if($pages->currentPage() !== 1)
        <span style="margin-right: 15px;">
            <a href="{{ $pages->previousPageUrl() }}"
               class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
               style="font-size: 16px; font-weight: bold;"
            >
                Prev
            </a>
        </span>
    @endif
    @if($pages->currentPage() === $pages->lastPage() && $pages->onFirstPage())
        <span style="margin-right: 15px;">
            <a href="{{ $pages->url(1) }}"
               class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
               style="font-size: 16px; font-weight: bold;"
            >
                1
            </a>
        </span>
    @else
        @if($pages->lastPage()-1 == 1)
            @foreach($pages->getUrlRange(1, 2) as $num=>$link)
                @if($num == $pages->currentPage())
                    <span style="margin-right: 15px;">
                        <a href="{{ $link }}"
                           class="link-danger link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                           style="font-size: 16px; font-weight: bold;"
                        >
                            {{ $num }}
                        </a>
                    </span>
                @else
                    <span style="margin-right: 15px;">
                        <a href="{{ $link }}"
                           class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                           style="font-size: 16px; font-weight: bold;"
                        >
                            {{ $num }}
                        </a>
                    </span>
                @endif
            @endforeach
        @else
            @if($pages->currentPage() > 3)
                <span style="margin-right: 15px;">
                    <a href="{{ $pages->url(1) }}"
                       class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                       style="font-size: 16px; font-weight: bold;"
                    >
                        1 . . .
                    </a>
                </span>
            @endif

            @if($pages->currentPage() != 1 && $pages->currentPage() !=  $pages->lastPage())
                @foreach($pages->getUrlRange($pages->currentPage()-1, $pages->currentPage()+1) as $num=>$link)
                    @if($num == $pages->currentPage())
                        <span style="margin-right: 15px;">
                        <a href="{{ $link }}"
                           class="link-danger link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                           style="font-size: 16px; font-weight: bold;"
                        >
                            {{ $num }}
                        </a>
                    </span>
                    @else
                        <span style="margin-right: 15px;">
                        <a href="{{ $link }}"
                           class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                           style="font-size: 16px; font-weight: bold;"
                        >
                            {{ $num }}
                        </a>
                    </span>
                    @endif
                @endforeach
            @else
                @if($pages->currentPage() == 1)
                    @foreach($pages->getUrlRange(1, $pages->currentPage() + 2) as $num => $link)
                        @if($num==$pages->currentPage())
                            <span style="margin-right: 15px;">
                                <a href="{{ $link }}"
                                   class="link-danger link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                                   style="font-size: 16px; font-weight: bold;"
                                >
                                    {{ $num }}
                                </a>
                            </span>
                        @else
                            <span style="margin-right: 15px;">
                            <a href="{{ $link }}"
                               class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                               style="font-size: 16px; font-weight: bold;"
                            >
                                {{ $num }}
                            </a>
                        </span>
                        @endif
                    @endforeach
                @else
                    @foreach($pages->getUrlRange($pages->lastPage() - 2, $pages->lastPage()) as $num=>$link)
                        @if($num==$pages->currentPage())
                            <span style="margin-right: 15px;">
                                <a href="{{ $link }}"
                                   class="link-danger link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                                   style="font-size: 16px; font-weight: bold;"
                                >
                                    {{ $num }}
                                </a>
                            </span>
                        @else
                            <span style="margin-right: 15px;">
                                <a href="{{ $link }}"
                                   class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                                   style="font-size: 16px; font-weight: bold;"
                                >
                                    {{ $num }}
                                </a>
                            </span>
                        @endif
                    @endforeach
                @endif
            @endif
        @endif
    @endif


    @if($pages->currentPage() !== $pages->lastPage())
        @if($pages->currentPage()!=$pages->lastPage()-1 && $pages->currentPage()!=1)
            <span style="margin-right: 15px;">
                <a href="{{ $link }}"
                   class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                   style="font-size: 16px; font-weight: bold;"
                >
                    . . . {{ $pages->lastPage() }}
                </a>
            </span>
        @endif
        <span>
            <a href="{{ $pages->nextPageUrl() }}"
               class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
               style="font-size: 16px; font-weight: bold;"
            >
                Next
            </a>
        </span>
    @endif

@endsection