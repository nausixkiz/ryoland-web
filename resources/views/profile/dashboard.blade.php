<div class="tab-pane fade active show" id="ltn_tab_1_1">
    <div class="ltn__myaccount-tab-content-inner">
        <p>Hello <strong>{{ \Illuminate\Support\Facades\Auth::user()->name }}</strong> (not
            <strong>{{ \Illuminate\Support\Facades\Auth::user()->name }}</strong>?
            <small>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">Log out</a>
            </small> )
        </p>
        <form method="POST" id="logout-form" action="{{ route('logout') }}">
            @csrf
        </form>
        <p>From your account dashboard you can view your <span>recent orders</span>, manage your <span>shipping and billing addresses</span>,
            and <span>edit your password and account details</span>.</p>
    </div>
</div>
