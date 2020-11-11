<div>
@extends('admin.master')
@section('contents')
<section class="page_content">
    <!-- panel -->
    <div class="panel mb-0">
        <div class="row">
            <div class="col-sm-12">
                <div class="head_edit">
                    <h3>Create Invoice</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Deshboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Create Invoice
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        

        <div class="row">
            <div class="col-sm-12">
                <div class="cr_invoice">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputState">State</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputState">State</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputState">State</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputState">State</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputState">State</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>
                            
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Invoice Date</label>
                                    <input type="date"  class="form-control" placeholder="Text" />
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="date" class="form-control" placeholder="Text" />
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="text" class="form-control" placeholder="Text" />
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputState">State</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputState">State</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>
                            
                
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="text" class="form-control" placeholder="Text" />
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="number" class="form-control" placeholder="Text" />
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" />
                                    <label class="form-check-label" for="inlineCheckbox1">check</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" />
                                    <label class="form-check-label" for="inlineCheckbox2">check</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="ad_p text-right">
                    <button onclick="add_more_customer_choice_option()" type="submit" class="ap_bt">
                        Add Product
                    </button>
                </div>



                <div class="ad_p_tab mt-3">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Product Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Total</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="add_product">
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
                                     <input type="text" class="form-control"  id="exampleFormControlInput1" placeholder="Note">
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
                            


                        </tbody>
                    </table>
                </div>

 




                <div id="customer_choice_options"></div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-12">
                <div class="invo_tab">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Officia perferendis perspiciatis animi dicta sequi
                            blanditiis sint, cumque neque. Rem, pariatur!
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                            Facere ipsa possimus incidunt doloremque beatae quo quae
                            molestiae consequatur id necessitatibus.
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Quisquam at quod autem iure alias fugit quos repellat beatae
                            vero pariatur.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .cr_invoice {
                background-color: #ececec;
                padding: 20px;
                margin-bottom: 20px;
                border: 1px solid #e0e0e0;
            }

            .form-check.form-check-inline {
                position: relative;
                top: 38px;
            }

            .ad_p_tab.mt-3 {
                background-color: #fff;
            }

            .ad_p.text-right button {
                background-color: #26abe2;
                color: #fff;
                border-style: none;
                padding: 5px 25px;
                font-weight: 600;
                border-radius: 25px;
            }

            .invo_tab {
                /* border: 1px solid #ababab; */
                background-color: #fff;
            }

            .tab-pane {
                padding: 20px;
            }

            .nav-link {
                display: block;
                padding: 0.5rem 1rem;
                color: #26abe2;
                font-weight: 600;
            }

            td.ic span.material-icons {
                background-color: #26abe2 !important;
                color: #fff !important;
            }
        </style>

    </div>
</section>

               
<script>
    var i = 0;
    function add_more_customer_choice_option() {
        var photo_div = '<tr class="product_row">';
        photo_div += '<td>';
        photo_div += '<select class="form-control" id="exampleFormControlSelect1">';
        photo_div += '</select>';
        photo_div += '</td>';
        photo_div += '<td>';
        photo_div += '<input type="text"  class="form-control" name="details['+i+']" id="note" placeholder="Note">';
        photo_div += '</td>';
        
        photo_div += '<td>';
        photo_div += '<input type="text" class="form-control" onkeyup="countTotal(this,i)" name="quantity['+i+']" id="quantity" placeholder="Quantity">';
        photo_div += '</td>';
        
        photo_div += '<td>';
        photo_div += '<input type="text" class="form-control" name="price['+i+']" id="price" placeholder="Price">';
        photo_div += '</td>';
        
        photo_div += '<td>';
        photo_div += '<input type="text" class="form-control" name="totalprice['+i+']" id="total_price" value="" placeholder="Total Price">';
        photo_div += '</td>';

        photo_div += '<td class="ic">';
        photo_div += '<button type="submit" onclick="delete_row(this)" class="material-icons"> Delete';
        photo_div += '</button>';
        
        photo_div += '</td>';
        photo_div += '</tr>';

        
        $('#add_product').append(photo_div);
        i++;
    }


    function delete_row(row) {
        $(row).closest('.product_row').remove();
    }
</script>


@endsection
</div>
