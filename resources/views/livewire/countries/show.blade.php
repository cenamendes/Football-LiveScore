<div>

    
    <div class="container">
        <h4 style="color:orangered;font-weight:500;padding-left:1px;">LIGAS</h4>
        <div class="row">
            @foreach($leaguesOfThisCountry as $league)
                <div class="col-lg-3 mt-2">
                    <div class="products-container">
                        <div class="product" data-name="p-1">
                            <a href="league/{{$league["league"]["id"]}}">
                            <img src="{{$league["league"]["logo"]}}" alt="">
                           </a>
                            {{-- <h5>{{$league["league"]["name"]}}</h5> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>




</div>
