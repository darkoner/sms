@extends('layouts.app')
@section('content')

    <script src="{{ URL::asset('js/angular/student/add_student_controller.js') }}?v=<?php echo time() ?>"
            type="text/javascript"></script>

    <div class="doc popovers-doc page-layout simple full-width" ng-app="SMSApp" ng-controller="addStudentController">

        <div class="container-fluid">

            <style>
                /*add full-width input fields*/
                input[type=number],
                input[type=date],
                select,
                input[type=text],
                input[type=password] {
                    width: 100%;
                    padding: 12px 20px;
                    margin: 8px 0;
                    display: inline-block;
                    border: 2px solid #ccc;
                    box-sizing: border-box;
                }
                /* set a style for all buttons*/
                button {
                    background-color: green;
                    color: white;
                    padding: 14px 20px;
                    margin: 8px 0;
                    cursor: pointer;
                    width: 100%;
                }
                /*set styles for the cancel button*/
                .cancelbtn {
                    padding: 14px 20px;
                    background-color: #FF2E00;
                }
                /*float cancel and signup buttons and add an equal width*/
                .cancelbtn,
                .signupbtn {
                    float: left;
                    width: 50%
                }
                /*add padding to container elements*/
                .container {
                    padding: 16px;
                }
                /*define the modal’s background*/

                .modal {
                    display: none;
                    position: fixed;
                    z-index: 1;
                    left: 0;
                    top: 0;
                    width: 100%;
                    height: 100%;
                    overflow: auto;
                    background-color: rgb(0, 0, 0);
                    background-color: rgba(0, 0, 0, 0.4);
                    padding-top: 60px;
                }
                /*define the modal-content background*/

                .modal-content {
                    background-color: #fefefe;
                    margin: 5% auto 15% auto;
                    border: 1px solid #888;
                    width: 50%;
                }
                /*define the close button*/

                .close {
                    position: absolute;
                    right: 35px;
                    top: 15px;
                    color: #000;
                    font-size: 40px;
                    font-weight: bold;
                }
                /*define the close hover and focus effects*/

                .close:hover,
                .close:focus {
                    color: red;
                    cursor: pointer;
                }

                .clearfix::after {
                    content: "";
                    clear: both;
                    display: table;
                }

                @media screen and (max-width: 300px) {
                    .cancelbtn,
                    .signupbtn {
                        width: 100%;
                    }
                }
            </style>
            <form class="modal-content" id="StudentForm">
                <div class="container">

                    <div class="row">
                        <ul class="alert alert-danger ul-error" id="errors" ng-if="errors.length > 0">
                            <li ng-repeat="error in errors">
                                <%error%>
                            </li>
                        </ul>
                    </div>

                    <label><b>Email</b></label>
                    <input type="text" placeholder="Enter Email" name="email" ng-model="Student.email" required>

                    <label><b>Name</b></label>
                    <input type="text" placeholder="Enter Name" name="name" ng-model="Student.name" required>

                    <label><b>Mobile</b></label>
                    <input type="text" placeholder="Enter Mobile" name="mobile" ng-model="Student.mobile" required>

                    <label><b>Address</b></label>
                    <input type="text" placeholder="Enter Address" name="address" ng-model="Student.address" required>

                    <label><b>Permanent ID</b></label>
                    <input type="text" placeholder="Enter Permanent ID" name="pid" ng-model="Student.pid" required>

                    <label><b>City</b></label>
                    <input type="text" placeholder="Enter City" name="city" ng-model="Student.city" required>

                    <label><b>State</b></label>
                    <input type="text" placeholder="Enter State" name="state" ng-model="Student.state" required>

                    <label><b>Date Of Birth</b></label>
                    <input type="date" placeholder="Enter DOB" name="dob" ng-model="Student.dob" required>

                    <label><b>Gender</b></label>
                    <select name="gender" id="gender" ng-model="Student.gender">
                        <option value=""></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Others">Others</option>
                    </select>

                    <label><b>Marital Status</b></label>
                    <select name="status" id="mstatus" ng-model="Student.mstatus">
                        <option value=""></option>
                        <option value="Married">Married</option>
                        <option value="Unmarried">Unmarried</option>
                    </select>

                    <label><b>Semester</b></label>
                    <select name="semester" id="semester" ng-model="Student.semester"
                            ng-options="t.id as t.course_name + ' - ' + t.semester_name for t in semester">
                    </select>

                    <div class="clearfix">
                        <button type="submit" class="signupbtn" ng-click="addNewStudent(Student)">Add</button>
                    </div>
                </div>
            </form>
        </div>


    </div>
@endsection
