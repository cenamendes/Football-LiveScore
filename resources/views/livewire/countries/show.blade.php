<div>

    
    <div class="container">
        <h4 style="color:#fb503b;font-weight:500;padding-left:1px;">LEAGUES</h4>
        <div class="row">
            @foreach($leaguesOfThisCountry as $league)
                <div class="col-lg-4 mt-2" style="width: fit-content;padding-right: 0.5rem!important;">
                    <a href="league/{{$league["league"]["id"]}}">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                          <div class="flip-card-front">
                           
                                <img src="{{$league["league"]["logo"]}}" style="height: 10rem;transform: scale(.9);">
                           
                          </div>
                          <div class="flip-card-back">
                            <div class="row">
                                <div class="col-lg-12">
                                    <img src="{{$league["country"]["flag"]}}" style="height: 8rem;transform: scale(.9);">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <p style="font-size:14px;color:white;">{{$league["league"]["name"]}}</p>
                                    <p style="font-size:14px;color:white;">{{$league["league"]["type"]}}</p>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>




</div>
