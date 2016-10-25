<!--
/**
 * Created by PhpStorm.
 * User: cheza
 * Date: 2/10/16
 * Time: 9:45 PM
 */ -->

<div class="recent_searches"><!--Recent_Searches-->
    <h2>Most Searched</h2>
    <div class="recent-name">
        <ul class="nav nav-pills nav-stacked">
            @foreach($most_searched as $searchTerm)
             <li><a href="{{ url('search?search_term='.$searchTerm->term) }}"> <span class="pull-right">({{ $searchTerm->count }})</span>{{ $searchTerm->term }}</a></li>
            @endforeach
        </ul>
    </div>
</div><!--/recent_searches-->