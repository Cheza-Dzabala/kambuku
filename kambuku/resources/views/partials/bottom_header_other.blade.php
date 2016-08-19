<div class="header-bottom"><!--header-bottom-->
    <div class="container">

        <nav class="navbar navbar-default search" role="navigation">


            <div class="navbar-collapse collapse search_navbox" id="navbar-collapsible">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <form class="navbar-form" action="{{ url('search') }}" method="post">
                    {!! csrf_field() !!}
                    <div class="form-group" style="display:inline;">
                        <div class="input-group searchinput col-md-12">
                            <input type="text" class="form-control" name="search_term" placeholder="I'm Searching For.....">
                        </div>
                    </div>


                    <div class="navbar-form navbar-left btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <span id="selected_category">All Categories</span> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" style="height: 400px; overflow-y: scroll">
                            <li><a onclick="SwictherCategory('All Categories');">All Categories</a></li>
                            @foreach($categories as $category)
                                <li><a onclick="SwictherCategory('{{ $category->name }}', '{{ $category->id }}');">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                        <input type="hidden" name="search_category" value="" id="search_category"/>
                    </div>

                    <div class="navbar-form navbar-left btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <span id="selected_city">Everywhere</span> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" style="height: 400px; overflow-y: scroll">
                            <li onclick="SwitcherCity('Everywhere')"><a>Everywhere</a></li>
                            @foreach($cities as $city)
                                <li><a onclick="SwitcherCity('{{ $city->name }}', '{{ $city->id }}')">{{ $city->name }}</a></li>
                            @endforeach
                        </ul>
                        <input type="hidden" name="search_city" value="" id="search_city"/>
                    </div>


                    <div class="navbar-form navbar-left btn-group">
                        <button type="submit" class="btn btn-default">
                            Search
                        </button>
                    </div>

                </form>
            </div>
        </nav>
    </div>
</div>
<script>

    function SwictherCategory(CategoryName, CategoryId)
    {
        document.getElementById('selected_category').innerHTML = CategoryName;
        document.getElementById('search_category').value = CategoryId;
    }

    function SwitcherCity(CityName, CityId)
    {
        document.getElementById('selected_city').innerHTML = CityName;
        document.getElementById('search_city').value = CityId;
    }

</script>
</div><!--/header-bottom-->