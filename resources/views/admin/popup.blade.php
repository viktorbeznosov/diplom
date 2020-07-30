<!-- Всплывающее окно, подтверждение удаления категории -->
<div @if(isset($id))id="{{ $id }}" @endif class="parent_popup_click">
    <div class="popup_click">
        <h2> {{$header}} </h2>
        <h3>{{$message}}</h3>
        <form action="" method="post">
            {{ csrf_field() }}
            <input type="submit" class="popup_delete_button" value="удалить">
        </form>

        <a href="javascript:void(0)" class="popup_cancel" style="color:#008000;"> отмена </a>
        <a class="popup_close" title="Закрыть">
            <i class="fa fa-times" aria-hidden="true"></i>
        </a>
    </div>
</div>

<script>
    $( document ).ready(function() {
        $('.popup_cancel, .popup_close').on('click', function () {
            $(this).closest('.parent_popup_click').fadeOut(200);
        });
    });
</script>
