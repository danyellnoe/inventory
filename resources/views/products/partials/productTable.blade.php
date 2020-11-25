<table id="inventoryTable" class="table table-striped table-bordered my-3" style="width:100%">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Category</th>
        <th>Descriptions</th>
        <th>Price</th>
        <th>Layaway</th>
        <th>Comments</th>
        <th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td class="align-middle">{{ $product->id }}</td>
            <td class="align-middle"><strong>{{ $product->name }}</strong></td>
            <td class="align-middle">{{ $product->category->name }}</td>
            <td class="text-left">
                <strong>Short:</strong> {{ $product->short_description }}
                <hr class="" />
                <strong>Long:</strong> {{ $product->description }}
            </td>
            <td class="align-middle">{!! $product->formatted_price !!}</td>
            <td class="align-middle">{!! $product->on_layaway === 1 ? '<span style="color: red;">Yes</span>' : 'No' !!}</td>
            <td class="align-middle" data-sort="{{ $product->comments_count }}">
                @if($product->comments_count > 0)
                    @include('products.partials.viewCommentsModal', ['comments' => $product->comments])
                    <button class="viewCommentsButton btn btn-sm btn-primary" data-toggle="modal" data-target="#viewCommentsModal_{{ $product->id }}">
                        {{ $product->comments_count }}
                    </button>
                @endif
            </td>
            <td class="align-middle">
                <button class="addCommentButton btn btn-sm btn-primary" data-toggle="modal" data-target="#addCommentModal" data-id="{{ $product->id }}">
                    <span class="plus"></span>
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
