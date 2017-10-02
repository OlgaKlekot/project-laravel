<div class="sidebar">
        <ul>
            @foreach ($categories as $category)
                @if(\Request::route()->getName() == 'user_cabinet')
                    <a href="{{ route('user_cabinet') }}?category={{$category['category']}}">
                        <li class="button" id="categoryBtn">
                            {{$category['category']}}
                        </li>
                    </a>
                 @elseif (route('main_page'))
                    <a href="{{ route('main_page') }}?category={{$category['category']}}">
                         <li class="button" id="categoryBtn">
                             {{$category['category']}}
                         </li>
                    </a>
                @endif
            @endforeach
        </ul>
</div>