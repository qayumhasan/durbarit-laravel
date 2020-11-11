@if($products->count() >0)

<tr class="product_row">
    <td>
        <select class="form-control" name="product[]" id="exampleFormControlSelect1">
        <option selected disabled>Choose A Product...</option>
            @foreach($products as $row)
                
                <option value="{{$row->id}}">{{$row->product_name}}</option>
            @endforeach
        </select>
    </td>

    <td>
        <input type="text" name="note[]" class="form-control" id="exampleFormControlInput1" placeholder="Note">
    </td>

    <td>
        <input type="number" name="quantity[]" class="form-control" id="quantity" placeholder="Quantity">
    </td>

    <td>
        <input type="number" name="price[]" class="form-control" id="exampleFormControlInput1" placeholder="Price">
    </td>

    <td>
        <input type="number" name="totalprice[]" class="form-control" id="totalprice0" placeholder="Total Price">
    </td>
    <td class="ic">
    <button type="submit" onclick="delete_row(this)" class="material-icons"> Delete
    </button>
    </td>


</tr>


@else
No data
@endif
<script>
     function delete_row(row) {
        
        $(row).closest('.product_row').remove();
    }

    function countTotal(){
        
    }
</script>