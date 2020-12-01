<div class="col-sm-12">
                <h6 style="display: inline-block;">Payroll Summary </h6>
                <span title="Calculate Salary" data-toggle="tooltip" data-placement="top" class="float-right" style="border-radius:50%;padding:4px 8px;"></span>
                <hr>
                <div class="deductions">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Basic Salary :</label>
                        <input type="text" class="form-control"  name="basic" id="basic" value="{{$basic}}" aria-describedby="emailHelp" placeholder="Basic Salary">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Total Earning</label>
                        <input type="text" class="form-control"  name="earning" value="{{$earningvalue}}"  id="salaryearning" placeholder="Earning">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Total Deductions</label>
                        <input type="text" class="form-control"  name="deductions" value="{{$deductionvalue}}" id="salarydeductions" placeholder="Earning">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Gross Salary</label>
                        <input type="text" class="form-control" name="gslary" id="gsalry" value="{{$gross}}" placeholder="Earning">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Tax</label>
                        <input type="text" class="form-control" onblur="calculateSalary()" value="{{$tax}}" name="tax" id="tax" placeholder="Earning">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Net Salary</label>
                        <input type="text" class="form-control" name="netsalary" value="{{$netsalary}}" id="netsalary" placeholder="Earning">
                    </div>
                    
                    <button type="submit" class="btn btn-success mb-2 float-right">Submit</button>


                </div>
            </div>