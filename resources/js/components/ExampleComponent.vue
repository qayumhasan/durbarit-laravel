<template>
    <div class="container">
       <tr>
    <td>
        <select class="form-control" id="exampleFormControlSelect1">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select>
    </td>

    <td>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Note">
    </td>

    <td>
        <input type="number" onkeyup="countTotal(this,0)" class="form-control" id="exampleFormControlInput1" placeholder="Quantity">
    </td>

    <td>
        <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Price">
    </td>

    <td>
        <input type="number" class="form-control" id="totalprice0" placeholder="Total Price">
    </td>


</tr>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
