
<h6 class="text-center">Payslip for the period of {{$payroll->month}} {{$payroll->year}}</h6>
<tbody>

    

    <tr class="p-3">
        <th scope="row">Staff ID</th>
        <td><span id="staff_id">{{$payroll->staff_id}}</span></td>

        <th scope="row">Name</th>
        <td><span id="name">{{$payroll->staff->name}}</span></td>
    </tr>

    <tr class="p-3">
        <th scope="row">Department</th>
        <td><span id="department">{{$payroll->staff->department->name}}</span></td>

        <th scope="row">Designation</th>
        <td><span id="designation">{{$payroll->staff->designation->name}}</span></td>
    </tr>

    <tr class="p-3">
        <th scope="row">Payment Method</th>
        <td><span id="payemntm">{{$payroll->payment_method}}</span></td>

        <th scope="row">Basic Salary ($)</th>
        <td><span id="bsalary">$ {{$payroll->basic_salary}}</span></td>
    </tr>

    <tr class="p-4">
        <th scope="row">Gross Salary ($)</th>
        <td><span id="gsalry">$ {{$payroll->gross_salary}}</span></td>

        <th scope="row">Net Salary ($)</th>
        <td><span id="nsalary">$ {{$payroll->net_salary}}</span></td>
    </tr>


</tbody>