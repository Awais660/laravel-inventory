
@foreach ($comments as $key => $comment)
<div style="padding-left: 70px;" class="comment-list mb-2">
    <div class="comments">
        <figure class="img-thumbnail">
            <img src="{{ url('assets/images/blog/author.jpg') }}" alt="author" width="80"
                height="80">
        </figure>

        <div class="comment-block">
            <div class="comment-header">
                <div class="comment-arrow"></div>

                

                <span class="comment-by">
                    <strong>{{ $comment->user->name}}</strong> – {{ $comment->created_at}}
                </span>
            </div>

            <div class="comment-content">
                <p>{{ $comment->comment}}</p>
                @php
                                            $email=session()->get("useremail");
                                        @endphp
                                        @if ($feedback->user->email==$email)
                <div class="float-sm-right">
                    <button class="btn btn-danger btn-sm delete del" data-type="comment" data-del="{{$comment->id}}" id="delete" onclick="deleteFeedback({{ $feedback->id }})">Delete</button>
                </div>
                @endif
            </div>
            
        </div>
    </div>

</div>
</div>
@endforeach
<!-- End .add-product-review -->