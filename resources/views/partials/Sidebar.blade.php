<style>
.nav-link{
    padding: 100px;
}

</style>
    <div class="sidebar" data-color="orange">

                <!-- sidebar menu start-->

        <div class="sidebar-wrapper" id="sidebar-wrapper">
            <ul class="nav">
                     <li>
                        <a class="user-image">
                            <img class="mx-auto d-block" src="/uploads/profilepics/{{ Auth::user()->profilepic }}"  style= "width:150px; height:150px; vertical-align:middle; border-radius:50%; margin-right:auto; margin-left:auto;">
                        </a>
                    </li>

                    <li style="padding: 30px;">
                            <a class="active" href="{{ route('Account', Auth::user()->id) }}">
                                <i class="now-ui-icons users_circle-08"></i>
                                <p>Profile</p>
                            </a>
                    </li>

                    <li style="padding:30px;">
                            <a class="active" href="{{ route('Story') }}">
                                <i class="now-ui-icons business_bulb-63"></i>
                                <p>Purpose of this + Rules?</p>
                            </a>
                    </li>


                <li style="padding:30px;">
                        <a class="active" href="{{ route('Weeklyupdates') }}">
                            <i class="now-ui-icons travel_info"></i>
                            <p>What's new?</p>
                        </a>
                </li>

                <li style="padding:30px;">
                        <a class="active" href="{{ route('home') }}">
                            <i class="now-ui-icons location_world"></i>
                            <p>Home</p>
                        </a>
                </li>


                </ul>


                <!-- sidebar menu end-->
            </div>
    </div>

<!--sidebar end-->
