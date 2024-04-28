@if (\Session::get('success'))
<div class="message__main message__main--success">{{ \Session::get('success') }}</div>    
@endif

@if (\Session::get('error'))
<div class="message__main message__main--error">{{ \Session::get('error') }}</div>    
@endif

<div class="message__main message__main--success oh">
    Đặt hàng thành công    
</div>    