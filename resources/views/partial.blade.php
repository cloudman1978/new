<div style="height: 300px" class="tg-location-map tg-haslayout"></div>
<div class="tg-banner-content">
    <div class="tg-displaytable">
        <div class="tg-displaytablecell">

            <div class="container">

                <div class="col-md-12 col-sm-7 col-xs-9 tg-verticalmiddle">
                    <div class="row">
                        <form class="form-searchdoctors" method="post" name="form" action="/search">
                            {!! csrf_field() !!}
                            <fieldset>
                                <div class="tab-content tg-tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="nephrologist">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-12 col-xs-12 tg-verticalmiddle">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Address"
                                                           id="address" name="address">
                                                    <a style="float: right;    display: block;    font-size: 26px;    height: 27px;    right: 22px;    top: 12px;    position: absolute;}" href="javascript:void(0);" class="search__doc-where__geolc geolc icon-location"
                                                       data-toggle="popover" data-placement="bottom"
                                                       data-trigger="manual"><span style="font-size:12px; display: block; float: right">Autour<br>de moi</span></a>

                                                </div>


                                            </div>

                                            <div class="col-md-3 col-sm-12 col-xs-12 tg-verticalmiddle">
                                                <div class="form-group">

                                                    {!! csrf_field() !!}
                                                    <span class="select">
                                                                         <select  class="group" name="speciality" id="speciality">
                                                                             <option value="-1">Sélectionner une spécialité</option>
                                                                             @foreach($specialities as $specialite)

                                                                                 @if($specialite->id <> 1)
                                                                                     <option value="{{$specialite->id}}">{{$specialite->intituleProf}}</option>
                                                                                 @endif
                                                                             @endforeach
                                                                         </select>
                                                                    </span>

                                                </div>

                                                <input type="hidden" name="long" id="long">
                                                <input type="hidden" name="lat" id="lat">

                                            </div>
                                            <div class="col-md-3 col-sm-12 col-xs-12 tg-verticalmiddle">
                                                <div class="form-group">

                                                    <input type="text" class="form-control" placeholder="Nom du docteur"
                                                           name="name">
                                                </div>


                                            </div>
                                            <div class="col-md-2 col-sm-12 col-xs-12 tg-verticalmiddle">
                                                <div class="form-group">

                                                    <button  type="search" class="tg-btn icon-search" ><i class="fa fa-search" aria-hidden="true"></i>
                                                    </button>
                                                </div>


                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 col-sm-12 col-xs-12 tg-verticalmiddle">

                                            </div>
                                            <div class="col-md-10 col-sm-12 col-xs-12 tg-verticalmiddle">
                                                <h6 style="align-content: center; color:white; font-size: 16px; padding-top:15px">Trouvez un docteur et prendre un rendez-vous immédiatement.</h6>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                            </fieldset>
                        </form>
                    </div></div>
            </div>


        </div>
    </div>
</div>
<div class="show-search"><i class="fa fa-search"></i></div>
<script type="text/javascript">
    var x = document.getElementById("long");
    var y = document.getElementById("lat");
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }
    function showPosition(position) {
        y.value =  position.coords.latitude ;


        x.value =   position.coords.longitude;

        // document.write (x.value+ ', '+ y.value);
    }
</script>




