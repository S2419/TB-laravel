<style>
.nav-link{
    padding: 100px;
}
    .sidebar{}
</style>
    <div class="sidebar" data-color="blue">

                <!-- sidebar menu start-->

        @if (Auth::guest())


            <div class="sidebar-wrapper" id="sidebar-wrapper">
                <ul class="nav">
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

                </ul>
            </div>
        @else


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
                        <a class="active" href="{{ route('chat') }}">
                            <i class="now-ui-icons ui-2_chat-round"></i>
                            <p>Chat</p>
                        </a>
                </li>

                @can('isSuperAdmin')
                    <li style="padding:30px;">
                        <a class="active" href="{{ route('Adminuser') }}">
                            <i class="now-ui-icons business_badge"></i>
                            <p>Admins</p>
                        </a>
                    </li>
                    @endcan



                </ul>


                <!-- sidebar menu end-->
            </div>
            @endif
    </div>

<!--sidebar end-->
