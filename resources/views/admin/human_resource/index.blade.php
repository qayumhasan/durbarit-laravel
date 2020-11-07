@extends('admin.master')
@section('contents')
<style>
    .switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
}

.switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
}

.slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
}

input:checked+.slider {
    background: #26ABE2;
}

input:focus+.slider {
    box-shadow: #26ABE2;
}

input:checked+.slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
    border-radius: 34px;
}

.slider.round:before {
    border-radius: 50%;
}
</style>
<section class="page_content">
    <!-- panel -->
    <div class="panel mb-0">
        <div class="panel_header">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel_title">
                        <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Human Resource</span>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="panel_title">
                        <a href="{{route('admin.staff.create')}}" class="btn btn-success"><i class="fas fa-plus"></i></span>
                            <span>Add Staff</span></a>
                    </div>
                </div>
            </div>

        </div>

        <div class="panel_body">
            <div class="table-responsive">
                <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
                
                        <thead>
                            <tr>
                                <th>Staff No.</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Department</th>
                                <th>Description</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                                                        <tr id="1">
                                <td>infix001 </td>
                                <td>System&nbsp;Administrator</td>
                                <td>Super Admin</td>
                                <td>cvvcv</td>
                                <td>Accounts Manager</td>
                                <td>+880123456790</td>
                                <td>support@spondonit.com</td>

                                <td>
                                            <label class="switch">
                                              <input type="checkbox" class="switch-input" >
                                              <span class="slider round"></span>
                                            </label>
                                        </td>

                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                            Select                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                                                                        <a class="dropdown-item" href="https://business.infixdev.com/view-staff/1">View</a>
                                             
                                                                                        <a class="dropdown-item" href="https://business.infixdev.com/edit-staff/1">Edit</a>
                                             
                                             
                                        </div>
                                    </div>
                                </td>
                            </tr>
                             
                                                    </tbody>
                    
                </table>
            </div>
        </div>
        </form>
    </div>
</section>

@endsection('contents')