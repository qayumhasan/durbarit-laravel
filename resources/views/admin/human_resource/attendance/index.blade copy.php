@extends('admin.master')
@section('contents')

<style>
    .common-radio:empty~label {
    position: relative;
    float: left;
    line-height: 16px;
    text-indent: 28px;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 500;
    text-transform: capitalize;
}
.common-radio:empty {
    opacity: 0;
    visibility: hidden;
    position: relative;
    max-height: 0;
    display: block;
    margin-top: -10px;
}
</style>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
                        <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="main-title">
                        <h3 class="mb-30">Select Criteria</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                                            <div class="white-box">
                        <form method="POST" action="https://business.infixdev.com/staff-attendance-search" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data" id="search_studentA"><input name="_token" type="hidden" value="JAJLLyOBya1Bp8mmjAE2YRDKilg8BJKaFErI38Ys">
                            <div class="row">
                                <input type="hidden" name="url" id="url" value="https://business.infixdev.com">
                                <div class="col-lg-6 mt-30-md">
                                    <select class="niceSelect w-100 bb form-control" id="select_class" name="role">
                                        <option data-display="Select Role *" value="">Select Role *</option>
                                                                                <option value="3" >Staff</option>
                                                                                <option value="4" >ahtesham</option>
                                                                                <option value="5" >Accountant</option>
                                                                                <option value="6" >sales</option>
                                                                            </select>
                                                                     </div>
                                <div class="col-lg-6 mt-30-md">
                                    <div class="row no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="input-effect">
                                                <input class="primary-input date form-control read-only-input" id="startDate" type="text"
                                                    name="attendance_date" autocomplete="off" value="11/08/2020">
                                                <label for="startDate">Attendance date*</label>
                                                <span class="focus-border"></span>
                                                
                                                                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button class="" type="button">
                                                <i class="ti-calendar" id="start-date-icon"></i>
                                            </button>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-lg-12 mt-20 text-right">
                                    <button type="submit" class="primary-btn small fix-gr-bg">
                                        <span class="ti-search pr-2"></span>
                                        Search                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            

<form method="POST" action="https://business.infixdev.com/staff-attendance" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data"><input name="_token" type="hidden" value="JAJLLyOBya1Bp8mmjAE2YRDKilg8BJKaFErI38Ys">

            <div class="row mt-40">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-30">Staff Attendance</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 no-gutters">
                                                    </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6  col-md-6 no-gutters text-md-left mark-holiday">
                            <button type="button" class="primary-btn fix-gr-bg mb-20">
                            <input type="checkbox" id="mark_holiday" class="common-checkbox form-control" name="mark_holiday" value="1" >
                            <label for="mark_holiday">Mark Holiday</label>
                        </button>
                        </div>
                                                 <div class="col-lg-6 col-md-6 text-md-right">
                            <button type="submit" class="primary-btn fix-gr-bg mb-20" onclick="javascript: form.action='https://business.infixdev.com/staff-attendance-store'">
                            <span class="ti-save pr"></span>
                                Save Attendance                            </button>
                        </div>
                        
                    </div>

                   

                    <input type="hidden" name="date" value="11/08/2020">

                        
                    <!-- </div> -->
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="table_id_table" class="display school-table" cellspacing="0" width="100%">
                                <thead>
                                                                        <tr>
                                        <th width="15%">Staff No.</th>
                                        <th width="15%">Staff Name</th>
                                        <th width="12%">Role</th>
                                        <th width="35%">Attendance</th>
                                        <th width="20%">Note</th>
                                    </tr>
                                </thead>

                                <tbody>
                                                                                                            <tr>
                                        <td>2<input type="hidden" name="id[]" value="3"></td>
                                        <td>Juan Torres</td>
                                        <td>Staff</td>
                                        <td>
                                            <div class="d-flex radio-btn-flex">
                                                <div class="mr-20">
                                                    <input type="radio" name="attendance[3]" id="attendanceP3" value="P" class="common-radio attendanceP" checked>
                                                    <label for="attendanceP3">Present</label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" name="attendance[3]" id="attendanceL3" value="L" class="common-radio">
                                                    <label for="attendanceL3">Late</label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" name="attendance[3]" id="attendanceA3" value="A" class="common-radio">
                                                    <label for="attendanceA3">Absent</label>
                                                </div>
                                                <div>
                                                    <input type="radio" name="attendance[3]" id="attendanceH3" value="F" class="common-radio">
                                                    <label for="attendanceH3">Half Day</label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-effect">
                                                <textarea class="primary-input form-control" cols="0" rows="2" name="note[3]" id=""></textarea>
                                                <label>Add Note Here</label>
                                                <span class="focus-border textarea"></span>
                                                <span class="invalid-feedback">
                                                    <strong>Error</strong>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                                                        <tr>
                                        <td>3<input type="hidden" name="id[]" value="8"></td>
                                        <td>Arslan Muhammad</td>
                                        <td>Staff</td>
                                        <td>
                                            <div class="d-flex radio-btn-flex">
                                                <div class="mr-20">
                                                    <input type="radio" name="attendance[8]" id="attendanceP8" value="P" class="common-radio attendanceP" checked>
                                                    <label for="attendanceP8">Present</label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" name="attendance[8]" id="attendanceL8" value="L" class="common-radio">
                                                    <label for="attendanceL8">Late</label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" name="attendance[8]" id="attendanceA8" value="A" class="common-radio">
                                                    <label for="attendanceA8">Absent</label>
                                                </div>
                                                <div>
                                                    <input type="radio" name="attendance[8]" id="attendanceH8" value="F" class="common-radio">
                                                    <label for="attendanceH8">Half Day</label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-effect">
                                                <textarea class="primary-input form-control" cols="0" rows="2" name="note[8]" id=""></textarea>
                                                <label>Add Note Here</label>
                                                <span class="focus-border textarea"></span>
                                                <span class="invalid-feedback">
                                                    <strong>Error</strong>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                                                        <tr>
                                        <td>4<input type="hidden" name="id[]" value="9"></td>
                                        <td>shajin devadhas</td>
                                        <td>Staff</td>
                                        <td>
                                            <div class="d-flex radio-btn-flex">
                                                <div class="mr-20">
                                                    <input type="radio" name="attendance[9]" id="attendanceP9" value="P" class="common-radio attendanceP" checked>
                                                    <label for="attendanceP9">Present</label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" name="attendance[9]" id="attendanceL9" value="L" class="common-radio">
                                                    <label for="attendanceL9">Late</label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" name="attendance[9]" id="attendanceA9" value="A" class="common-radio">
                                                    <label for="attendanceA9">Absent</label>
                                                </div>
                                                <div>
                                                    <input type="radio" name="attendance[9]" id="attendanceH9" value="F" class="common-radio">
                                                    <label for="attendanceH9">Half Day</label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-effect">
                                                <textarea class="primary-input form-control" cols="0" rows="2" name="note[9]" id=""></textarea>
                                                <label>Add Note Here</label>
                                                <span class="focus-border textarea"></span>
                                                <span class="invalid-feedback">
                                                    <strong>Error</strong>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                                                        <tr>
                                        <td>5<input type="hidden" name="id[]" value="12"></td>
                                        <td>Moha Almoha</td>
                                        <td>Staff</td>
                                        <td>
                                            <div class="d-flex radio-btn-flex">
                                                <div class="mr-20">
                                                    <input type="radio" name="attendance[12]" id="attendanceP12" value="P" class="common-radio attendanceP" checked>
                                                    <label for="attendanceP12">Present</label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" name="attendance[12]" id="attendanceL12" value="L" class="common-radio">
                                                    <label for="attendanceL12">Late</label>
                                                </div>
                                                <div class="mr-20">
                                                    <input type="radio" name="attendance[12]" id="attendanceA12" value="A" class="common-radio">
                                                    <label for="attendanceA12">Absent</label>
                                                </div>
                                                <div>
                                                    <input type="radio" name="attendance[12]" id="attendanceH12" value="F" class="common-radio">
                                                    <label for="attendanceH12">Half Day</label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-effect">
                                                <textarea class="primary-input form-control" cols="0" rows="2" name="note[12]" id=""></textarea>
                                                <label>Add Note Here</label>
                                                <span class="focus-border textarea"></span>
                                                <span class="invalid-feedback">
                                                    <strong>Error</strong>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                                                    </tbody>
                            </table>
                        </div>
                    </div>
                    </form>
                </div>
            </div>

    </div>
</section>
@endsection