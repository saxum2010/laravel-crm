<div class="mailbox-controls">

    <!-- Check all button -->
    @if(Request::segment(3) != 'Trash')
        <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
        </button>
    @endif
    <div class="btn-group">

        @if(Request::segment(3)==''||Request::segment(3)=='Inbox')
            <button type="button" class="btn btn-default btn-sm mailbox-star-all" title="toggle important state" style="display: {{user_can("toggle_important_email")?'inline':'none'}}"><i class="fa fa-star"></i></button>
            <button type="button" class="btn btn-default btn-sm mailbox-trash-all" title="add to trash" style="display: {{user_can("trash_email")?'inline':'none'}}"><i class="fa fa-trash-o"></i></button>
            <button type="button" class="btn btn-default btn-sm mailbox-reply" title="reply" style="display: {{user_can("reply_email")?'inline':'none'}}"><i class="fa fa-reply"></i></button>
            <button type="button" class="btn btn-default btn-sm mailbox-forward" title="forward" style="display: {{user_can("forward_email")?'inline':'none'}}"><i class="fa fa-mail-forward"></i></button>
        @elseif(Request::segment(3) == 'Sent')
            <button type="button" class="btn btn-default btn-sm mailbox-star-all" title="toggle important state" style="display: {{user_can("toggle_important_email")?'inline':'none'}}"><i class="fa fa-star"></i></button>
            <button type="button" class="btn btn-default btn-sm mailbox-trash-all" title="add to trash" style="display: {{user_can("trash_email")?'inline':'none'}}"><i class="fa fa-trash-o"></i></button>
            <button type="button" class="btn btn-default btn-sm mailbox-forward" title="forward" style="display: {{user_can("forward_email")?'inline':'none'}}"><i class="fa fa-mail-forward"></i></button>
        @elseif(Request::segment(3) == 'Drafts')
            <button type="button" class="btn btn-default btn-sm mailbox-star-all" title="toggle important state" style="display: {{user_can("toggle_important_email")?'inline':'none'}}"><i class="fa fa-star"></i></button>
            <button type="button" class="btn btn-default btn-sm mailbox-trash-all" title="add to trash" style="display: {{user_can("trash_email")?'inline':'none'}}"><i class="fa fa-trash-o"></i></button>
            <button type="button" class="btn btn-default btn-sm mailbox-send" title="send" style="display: {{user_can("send_email")?'inline':'none'}}"><i class="fa fa-mail-forward"></i></button>
        @endif
    </div>
    <div class="pull-right">

        {{$messages->currentPage()}}-{{$messages->perPage()}}/{{$messages->total()}}

        <div class="btn-group">
            {!! $messages->appends(['search' => Request::get('search')])->render('vendor.pagination.mailbox') !!}
        </div>

        <!-- /.btn-group -->
    </div>
    <!-- /.pull-right -->
</div>