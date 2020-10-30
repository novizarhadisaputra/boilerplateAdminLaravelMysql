<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    Pusher.logToConsole = true;
    var pusher = new Pusher('771fe5c2a9fa7acceab9', {
        cluster: 'ap1'
    });
    var channel = pusher.subscribe('my-channel');
    channel.bind('notifications', function (data) {
        var x = document.getElementById("myAudio");
        x.play();
        $.get(`{{route('notifications.index')}}`, {}, function (data) {
            let itemHtml = `
            <a href="${data.url}" class="dropdown-item dropdown-item-unread">
                <div class="dropdown-item-icon bg-primary text-white">
                    <i class="fas fa-code"></i>
                </div>
                <div class="dropdown-item-desc">
                    ${data.action}
                    <div class="time text-primary">${data.updated_at ? data.updated_at : data.created_at}</div>
                </div>
            </a>`
            $('.dropdown-list-content').html(itemHtml)
        })

    });

</script>
