<link rel="stylesheet" href="{{ asset('css/notifications.css') }}">
<link rel="stylesheet" href="{{ asset('css/buttons.css') }}">
<script src="{{ asset('js/notifications.js') }}" defer></script>

<div class="btn btn-secondary float-right" title="Notifications" onclick="toggleNotificationPopup()" id="notification_icon">
    <i class="fas fa-bell"></i>
    <div class="notification_notice">
        <p>Unread notifications</p>
    </div>
</div>

<div class="notification_popup-header">
    <h3 class="float-left">Notifications</h3>
    <div class="btn btn-secondary float-right" onclick="toggleNotificationPopup()"><i class="fas fa-times"></i></div>
</div>
<div class="notification_popup">
    @if(isset($globalNotifications))
        @foreach($globalNotifications as $notification)
            <div class="notification_div" data-id="{{ $notification->id }}">
                <div class="notifica_heading{{ $notification->read == 0 ? ' new' : '' }}">
                    {{ $notification->date }}
                </div>
                <div class="notifica_content">
                    {!! $notification->content !!}
                </div>
            </div>
        @endforeach
    @endif
</div>

