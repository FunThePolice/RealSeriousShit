<tr>
    @if(isset($depth))
        @for($depth; $depth > 0; $depth--)
            <td bgcolor="{{ sprintf('#%06X', mt_rand(0, 0xFFFFFF)) }}"></td bgcolor="{{ sprintf('#%06X', mt_rand(0, 0xFFFFFF)) }}">
        @endfor
    @endif
    <td>{{ucwords($comment->title)}}</td>
    <td>{{ucwords($comment->body)}}</td>
    <td>
        <form id="add-reply-form" method="POST"
              action="{{route('reply.create', ['comment' => $comment->id])}}">
            @method('GET')
            @csrf
            <button class="btn btn-primary">Reply</button>
        </form>
    </td>
</tr>
