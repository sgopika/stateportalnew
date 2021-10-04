@foreach($article as $articles)
{!! substr($articles->title, 0, 100) !!} <span class="text-white bg-magenta fg-lighTaupe eng_xxxs"> Readmore....</span>
@endforeach