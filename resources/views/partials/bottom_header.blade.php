<div class="header-bottom"><!--header-bottom-->
    <div class="container">

        <nav class="navbar navbar-default search" role="navigation">


            <div class="navbar-header" id="navbar-collapsible">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search_buttons">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>



                <form class="navbar-form" action="{{ url('search') }}" method="get">
                    {!! csrf_field() !!}


                    <div class="collapse navbar-collapse" id="search_buttons">



                        <div class="navbar-nav btn-group btnoveride ">

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

                        <div class="navbar-nav btn-group btnoveride">

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

                        <div class="form-group" style="display:inline;">
                            <div class="input-group searchinput">
                                <input type="text" class="form-control" name="search_term" placeholder="I'm Searching For....." value="<?php if (isset($search_term)){ echo $search_term; } ?>">
                             <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                            </span>
                            </div>
                        </div>

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