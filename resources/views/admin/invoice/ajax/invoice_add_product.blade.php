@if($products->count() >0)
@php
    $id = rand(111,999);
@endphp
<tr class="product_row">
    <td>
        <select class="form-control" name="product[]" onchange="getProductPrice(this,{{$id}})" id="exampleFormControlSelect1">
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
        <input type="number" name="quantity[]" onkeyup="quentitycount({{$id}})"  class="form-control" id="quantity{{$id}}" placeholder="Quantity">
    </td>

    <td>
        <input type="number" name="price[]" class="form-control" id="price{{$id}}" placeholder="Price" value="">
    </td>

    <td>
        <input type="number" name="totalprice[]" class="form-control" id="totalprice{{$id}}" placeholder="Total Price">
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


    function quentitycount(id){
        var price = document.getElementById('price'+id);
        var totalPrice = document.getElementById('totalprice'+id);
        var qty = document.getElementById('quantity'+id);
        var total =qty.value * price.value;
        totalPrice.value = total;
        
    }

    function getProductPrice(el,elid){
        
        var id = el.value;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'GET',
            url: "{{ url('/admin/invoice/product/value') }}/"+id,
             dataType:"json",
            success: function(data) {
                var price = document.getElementById('price'+elid);
                price.value = data;
            }
        });
    }
</script>