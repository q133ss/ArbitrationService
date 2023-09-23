<ul class="notification-dropdown onhover-show-div">
    <li><i data-feather="bell"></i>
        <h6 class="f-18 mb-0">Уведомления</h6>
    </li>
    @if(Auth()->User()->notifications()->get()->isEmpty())
        <li>
            У вас нет новых уведомлений
        </li>
    @endif
    @foreach(Auth()->User()->notifications()->get() as $notification)
    <li class="notification-message">
        <p><i class="fa fa-circle-o me-3 font-primary"> </i>{{$notification->title}}<span class="pull-right">10 min.</span></p>
    </li>
    @endforeach
    @if(!Auth()->User()->notifications()->get()->isEmpty())
    <li><button type="button" id="clearNotificationsBtn" class="btn btn-primary">Очистить</button></li>
    @endif
</ul>
