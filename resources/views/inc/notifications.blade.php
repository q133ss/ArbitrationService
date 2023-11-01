<ul class="notification-dropdown onhover-show-div">
    <li><i data-feather="bell"></i>
        <h6 class="f-18 mb-0">Уведомления</h6>
    </li>
    @if(Auth()->User()->notifications()->get()->isEmpty())
        <li>
            У вас нет новых уведомлений
        </li>
    @endif
    @foreach(Auth()->User()->notifications()->orderBy('created_at', "DESC")->get() as $notification)
        @if(Auth()->user()->role->tech_name == 'admin')
            <li class="notification-message" @if($notification->offer_id !== null) onclick="location.href='{{route('admin.offers.edit', $notification->offer_id)}}'" @endif>
        @elseif(Auth()->user()->role->tech_name == 'webmaster')
            <li class="notification-message" @if($notification->offer_id !== null) onclick="location.href='{{route('master.offers.show', $notification->offer_id)}}'" @endif>
        @else
            <li class="notification-message">
        @endif
        <p><i class="fa fa-circle-o me-3 font-primary"> </i>{{$notification->title}}<span class="pull-right">{{$notification->created_at->diffForHumans()}}</span></p>
    </li>
    @endforeach
    @if(!Auth()->User()->notifications()->get()->isEmpty())
    <li><button type="button" id="clearNotificationsBtn" class="btn btn-primary">Очистить</button></li>
    @endif
</ul>
