<div class="ui longer course modal">
    <i class="close icon"></i>
    <div class="header centered">Course Details</div>
    <div class="scrolling content">
        <input type="hidden" id="usrid">
        <div class="ui horizontal divider">
            <h2 id="cname"></h2>
        </div>
        <h4 style="text-align: center;" id="sname"></h4>
        <div class="ui three column stackable grid">
            <div class="column">
                <div class="ui raised segment ">
                    <div class="content">
                        <img class="left floated mini ui circular image" src="/storage/interface/clock.jpg">
                        <div class="header">
                            <h3>Duration</h3>
                        </div>
                        <div class="ui large blue horizontal label" id="duration"></div>
                        <div class="description">
                            <br>Standard length of time to finish the course
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="ui raised segment ">
                    <div class="content">
                        <img class="left floated mini ui circular image" src="/storage/interface/coins.jpg">
                        <div class="header">
                            <h3>Tuition Fee</h3>
                        </div>
                        <div class="ui large orange horizontal label" id="tuition"></div>
                        <div class="description">
                            <br>Amount might change as year progresses
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="ui raised segment ">
                    <div class="content">
                        <img class="left floated mini ui circular image" src="/storage/interface/school.jpg">
                        <div class="header">
                            <h3>Enrollment Status</h3>
                        </div>
                        <div class="ui medium green horizontal label" style="text-transform: uppercase;" id="enrolment">
                            Ongoing</div>
                        <div class="description">
                            <br>Status of enrolment in selected school or course
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ui raised segment">
            <div class="content">
                <img class="left floated mini ui circular image" src="images/defaultstud.jpg">
                <div class="header">
                    <h3>Brief Description</h3>
                </div>
                <div class="description" id="body">
                    <br>
                </div>
            </div>
        </div>
        <div class="ui horizontal divider">
            <h4>Location</h4>
        </div>
        <div id="map"></div><br>
        <input type="hidden" class="lat">
        <input type="hidden" class="lng">
        <div class="ui horizontal divider">
            <h4>Requirements</h4>
        </div>
        <div class="ui segment">
            <div class="ui two column very relaxed grid">
                <div class="column">
                    <h3>Freshmen</h3>
                    <div class="ui list">
                        <div class="item">
                            <div class="header">Enrollment Form</div>
                            Filled out
                        </div>
                        <div class="item">
                            <div class="header">Form 137 and 138</div>
                            Original and Photocopy
                        </div>
                        <div class="item">
                            <div class="header">Certificate of Good Moral</div>
                            Original and Photocopy
                        </div>
                        <div class="item">
                            <div class="header">NSO or Birth Certificate</div>
                            Original and Photocopy
                        </div>
                    </div>
                </div>
                <div class="column">
                    <h3>Transferee</h3>
                    <div class="ui list">
                        <div class="item">
                            <div class="header">Enrollment Form</div>
                            Filled out
                        </div>
                        <div class="item">
                            <div class="header">Transcript of Records (TOR)</div>
                            Original and Photocopy
                        </div>
                        <div class="item">
                            <div class="header">Certificate of Good Moral</div>
                            Original and Photocopy
                        </div>
                        <div class="item">
                            <div class="header">NSO or Birth Certificate</div>
                            Original and Photocopy
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui vertical divider">
                or
            </div>
        </div>
        <div class="ui horizontal divider">
            <h4>Offered By</h4>
        </div>
        <div class="ui segment center aligned">
            <div class="ui two column very relaxed grid">
                <div class="column">
                    <img class="ui circular centered image" src="images/logo5.png" alt="logo" width="60%" id="slogo">
                </div>
                <div class="middle aligned column">
                    <h1 id="sname">Western Leyte College</h1>
                    <a class="ui large inverted violet visit button">Visit Page</a>
                </div>
            </div>
            <div class="ui vertical divider">
                LEARN MORE
            </div>
        </div>
        <!-- end of scroll content -->
    </div>
    <div class="actions">
        <div class="ui red icon fav button"><i class="heart icon"></i></div>
        <a class="ui icon labeled brown button" >Prospectus <i
                class="cloud download icon"></i></a>
        <a class="ui apply labeled icon blue button">
            Register
            <i class="checkmark icon"></i>
        </a>
    </div>
</div>