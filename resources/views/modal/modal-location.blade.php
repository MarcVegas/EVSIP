<div class="ui gmaps modal">
    <i class="close icon"></i>
    <div class="content">
        <input type="hidden" id="lat">
        <input type="hidden" id="lng">
        <input type="hidden" id="location">
        <input type="hidden" id="place_id">
        <div class="ui large icon input" id="iconinput">
            <input type="text" name="pac-input" id="pac-input" placeholder="Find your location" autocomplete>
            <i class="search icon"></i>
        </div>
        <div class="" id="map"></div>
        {{-- <h2>We are located at...</h2> 
            <div class="ui stackable grid">
            <div class="row">
                <div class="six wide column">
                    <div class="ui raised segment">
                        <h5>Search your location</h5>
                        <div class="ui fluid input">
                            <input type="text" name="pac-input" id="pac-input" placeholder="Find your location" autocomplete>
                        </div>
                    </div>
                    <h4 id="address">No address set</h4>
                </div>
                <div class="ten wide column">
                    <div id="map"></div>
                </div>
            </div>
        </div> --}}
    </div>
</div>