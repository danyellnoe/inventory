<!-- Comment Modal -->
<div class="modal fade" id="viewCommentsModal_{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="viewCommentsModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewCommentsModalLongTitle">
                    RE: {{ $product->name }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach($comments as $comment)
                    <blockquote class="blockquote">
                        <p class="mb-0">{{ $comment->body }}</p>
                        <footer class="blockquote-footer" style="font-size: small;">
                            Added <cite title="Date Added">{{ $comment->created_at }}</cite>
                        </footer>
                    </blockquote>
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
