<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.js"></script>

<script>
    $(document).ready( function () {
        $('#inventoryTable').DataTable({
            "columnDefs": [
                { "orderable": false, "targets": [3,7] },
                { "type": "num-fmt", "target": 4 }
            ]
        });
    } );

    // handle viewing comments modal
    $(document).on("click", ".viewCommentsButton", function () {
        let productId = $(this).data('id');
        $("#viewCommentsForm input#product_id").val( productId );
    });

    // handle adding comment modal
    $(document).on("click", ".addCommentButton", function () {
        let productId = $(this).data('id');
        $("#addCommentForm input#product_id").val( productId );
    });
</script>
