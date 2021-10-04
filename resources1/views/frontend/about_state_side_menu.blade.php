<ul class="custom">

	@if($subsubmenuscnt==0)
    @foreach($relsubmenus as $relsubmenusres)
    @if($relsubmenusres->menulinktypes_id==4)

    <li>
        <a href="{{ route('subdetail', [Crypt::encrypt($relsubmenusres->id), Crypt::encrypt($relsubmenusres->menu)] ) }}">
           <i class="lni lni-checkmark-circle"></i>  {{ $relsubmenusres->relmenutitle }}
        </a>
    </li>
    @endif
    @endforeach
    @else

    @foreach($relsubmenus as $relsubmenusres)
    @if($relsubmenusres['menulinktypes_id']==4)


    <li>
        <a href="{{ route('subsubdetail', [Crypt::encrypt($relsubmenusres['id']), Crypt::encrypt($relsubmenusres['menu'])] ) }}">

            <i class="lni lni-checkmark-circle"></i>  {{ $relsubmenusres['relmenutitle'] }}
        </a>
    </li>
    @endif

    @endforeach
    @endif
</ul>