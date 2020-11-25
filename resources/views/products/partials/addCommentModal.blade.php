<!-- Comment Modal -->
<div class="modal fade" id="addCommentModal" tabindex="-1" role="dialog" aria-labelledby="addCommentModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCommentModalTitle">Add a Comment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addCommentForm" action="{{ route('storeComment') }}" method="POST">
                    @csrf
                    <input type="hidden" id="product_id" name="product_id" value="" />
                    <label for="body" style="display: none;">Comment</label>
                    <textarea style="width: 80%;" cols="3" id="body" name="body" placeholder="Enter your comment here!"></textarea>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="$('#addCommentForm').submit();">Save</button>
            </div>
        </div>
    </div>
</div>
