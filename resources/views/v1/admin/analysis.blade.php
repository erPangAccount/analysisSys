@extends('v1.layouts.admin_layout')

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/css/smart_wizard_all.min.css" rel="stylesheet" type="text/css" />
@endsection

{{--content--}}
@section('pageContent')
    <div class="">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <!-- Tabs -->
                    <div id="wizard_verticle" class="form_wizard wizard_verticle">
                        <ul class="nav">
                            <li>
                                <a class="nav-link" href="#step-1">
                                    Step 1
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="#step-2">
                                    Step 2
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="#step-3">
                                    Step 3
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="step-1" class="tab-pane" role="tabpanel">
                                <h2 class="StepTitle">上传excel文件</h2>

                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="{{route('v1_analysis')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3" for="file">上传成绩表 <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6">
                                            <input type="file" id="file" name="file" required="required" class="form-control-static col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                </form>

                                <br><br>
                            </div>


                            <div id="step-2" class="tab-pane" role="tabpanel" act="{{route('v1_analysis_step2')}}">
                                <form id="form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="{{route('v1_analysis')}}">

                                </form>
                            </div>


                            <div id="step-3" class="tab-pane" role="tabpanel">
                                Step content
                            </div>

                        </div>

                    </div>
                    <!-- End SmartWizard Content -->
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

{{--显示上传的成绩--}}
       <div class="row">
           <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="x_panel">
                   <div class="x_title">
                       <h2>经过分析的数据<small>预定义分析指标所分析出来的数据</small></h2>
                       <ul class="nav navbar-right panel_toolbox">
                           <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                           </li>
{{--                           <li class="dropdown">--}}
{{--                               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>--}}
{{--                               <ul class="dropdown-menu" role="menu">--}}
{{--                                   <li><a href="#">Settings 1</a>--}}
{{--                                   </li>--}}
{{--                                   <li><a href="#">Settings 2</a>--}}
{{--                                   </li>--}}
{{--                               </ul>--}}
{{--                           </li>--}}
{{--                           <li><a class="close-link"><i class="fa fa-close"></i></a>--}}
{{--                           </li>--}}
                       </ul>
                       <div class="clearfix"></div>
                   </div>
                   <div class="x_content">
{{--                       <p class="text-muted font-13 m-b-30">--}}
{{--                           Responsive is an extension for DataTables that resolves that problem by optimising the table's layout for different screen sizes through the dynamic insertion and removal of columns from the table.--}}
{{--                       </p>--}}

                       <table class="table" cellspacing="0" width="100%">
                           <thead>
                           <tr>
                               <th>First name</th>
                               <th>Last name</th>
                               <th>Position</th>
                               <th>Office</th>
                               <th>Age</th>
                               <th>Start date</th>
                               <th>Salary</th>
                               <th>Extn.</th>
                               <th>E-mail</th>
                           </tr>
                           </thead>
                           <tbody>
                           <tr>
                               <td>Tiger</td>
                               <td>Nixon</td>
                               <td>System Architect</td>
                               <td>Edinburgh</td>
                               <td>61</td>
                               <td>2011/04/25</td>
                               <td>$320,800</td>
                               <td>5421</td>
                               <td>t.nixon@datatables.net</td>
                           </tr>
                           <tr>
                               <td>Garrett</td>
                               <td>Winters</td>
                               <td>Accountant</td>
                               <td>Tokyo</td>
                               <td>63</td>
                               <td>2011/07/25</td>
                               <td>$170,750</td>
                               <td>8422</td>
                               <td>g.winters@datatables.net</td>
                           </tr>
                           </tbody>
                       </table>

                       <nav class="text-right" aria-label="Page navigation">
                           <ul class="pagination">
                               <li  class="disabled">
                                   <a href="#" aria-label="Previous">
                                       <span aria-hidden="true">&laquo;</span>
                                   </a>
                               </li>
                               <li class="active"><a href="#">1</a></li>
                               <li><a href="#">2</a></li>
                               <li><a href="#">3</a></li>
                               <li><a href="#">4</a></li>
                               <li><a href="#">5</a></li>
                               <li >
                                   <a href="#" aria-label="Next">
                                       <span aria-hidden="true">&raquo;</span>
                                   </a>
                               </li>
                           </ul>
                       </nav>
                   </div>
               </div>
           </div>
       </div>


    </div>
@endsection


@section('script')
    <!-- jQuery Smart Wizard -->
    <script src="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>

    <script type="application/javascript">
        var btnFinish = $('<button></button>').text('Finish')
            .addClass('btn btn-default sw-btn-finish')
            .on('click', function(){ console.log('Finish Clicked'); });

        function init_SmartWizard() {

            $('#wizard_verticle').smartWizard({
                selected: 0,
                theme: 'dots',
                autoAdjustHeight: true,
                cycleSteps: true,
                transition: {
                    animation: 'slide-horizontal', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
                },
                toolbarSettings: {
                    showPreviousButton: false,
                    toolbarPosition: 'bottom',
                    toolbarExtraButtons: [btnFinish]
                },
                keyboardSettings: {
                    keyNavigation: false,
                },

            });
            $('#wizard_verticle').smartWizard("reset");


            $("#wizard_verticle").on("showStep", function(e, anchorObject, stepIndex, stepDirection, stepPosition) {
                $(".sw-btn-prev").removeClass('disabled');
                $(".sw-btn-next").removeClass('disabled');
                $(".sw-btn-finish").addClass('disabled');

                if(stepPosition === 'first') {
                    $(".sw-btn-prev").addClass('disabled');
                } else if(stepPosition === 'last') {
                    $(".sw-btn-next").addClass('disabled');
                    $(".sw-btn-finish").removeClass('disabled');
                } else {
                    $(".sw-btn-prev").removeClass('disabled');
                    $(".sw-btn-next").removeClass('disabled');
                }
            });

            $("#wizard_verticle").on("leaveStep", function(e, anchorObject, currentStepIndex, nextStepIndex, stepDirection) {
                switch (currentStepIndex) {
                    case 0:
                        if ($('input[name="file"]')[0].files[0] == undefined) {
                            alert('请选择需要上传的文件！');
                            return false;
                        }
                }
            });

            $("#wizard_verticle").on("stepContent", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
                switch (stepNumber) {
                    case 1:
                        // return ;
                        let ajaxURL = $('#step-2').attr('act');
                        let formData = new FormData();
                        formData.append("file", $('input[name="file"]')[0].files[0]);
                        formData.append("_token", $('input[name="_token"]').val());
                        // Return a promise object
                        return new Promise((resolve, reject) => {
                            // Ajax call to fetch your content
                            $.ajax({
                                method  : "post",
                                url     : ajaxURL,
                                dataType: 'json',
                                processData: false, // 将数据转换成对象，不对数据做处理，故 processData: false
                                contentType: false,    // 不设置数据类型
                                xhrFields: {                // 这样在请求的时候会自动将浏览器中的cookie发送给后台
                                    withCredentials: true
                                },
                                data    : formData,

                                beforeSend: function( xhr ) {
                                    // Show the loader
                                    $('#wizard_verticle').smartWizard("loader", "show");
                                }
                            }).done(function( res ) {
                                console.log(res);
                                if (res.errCode) {
                                    alert(res.data);
                                    location.reload()
                                } else {
                                    // 按照班级排名字段
                                    var i;
                                    var temp1 = "<div class=\"checkbox\">";
                                    for (i = 0; i < res.data.fileTitles.length; i++) {
                                        if (res.data.fileTitles[i] !== null) {
                                            temp1 += "<label  style='margin-right: 10px'><input type=\"checkbox\" name='classes[]' value='" + i + "'>" + res.data.fileTitles[i] + "</label>";
                                        }
                                    }
                                    temp1+="</div>";

                                    var byClassesHtml = "<div class=\"form-group\">" +
                                        " <label class=\"control-label col-md-3 col-sm-3\">按<strong style='color: red'>班级排名</strong>分析项 <span class=\"required\">*</span></label>\n" +
                                        "<div class=\"col-md-6 col-sm-6\">\n" + temp1 +
                                        "<input type=\"number\" min='0' class=\"form-control\" placeholder=\"请输入需要找出以上分析项的的班级的前n名\">" +
                                        "</div></div>";

                                    // 按专业排名字段
                                    var temp2 = "<div class=\"checkbox\">";
                                    for (i = 0; i < res.data.fileTitles.length; i++) {
                                        if (res.data.fileTitles[i] !== null) {
                                            temp2 += "<label style='margin-right: 10px'><input type=\"checkbox\" name='profession[]' value='" + i + "'>" + res.data.fileTitles[i] + "</label>";
                                        }
                                    }
                                    temp2 += "</div>";

                                    var byProfession = "<div class=\"form-group\">" +
                                        " <label class=\"control-label col-md-3 col-sm-3\">按<strong style='color: red'>当前专业排名</strong>分析项 <span class=\"required\">*</span></label>\n" +
                                        "<div class=\"col-md-6 col-sm-6\">\n" + temp2 +
                                        "<input type=\"number\" min='0' class=\"form-control\" placeholder=\"请输入需要找出以上分析项的的专业的前n名\">" +
                                        "</div></div>";

                                    // 按年级排名字段
                                    var temp3 = "<div class=\"checkbox\">";
                                    for (i = 0; i < res.data.fileTitles.length; i++) {
                                        if (res.data.fileTitles[i] !== null) {
                                            temp3 += "<label style='margin-right: 10px'><input type=\"checkbox\" name='grade[]' value='" + i + "'>" + res.data.fileTitles[i] + "</label>";
                                        }
                                    }
                                    temp3 += "</div>";

                                    var byGrade = "<div class=\"form-group\">" +
                                        " <label class=\"control-label col-md-3 col-sm-3\">按<strong style='color: red'>年级排名</strong>分析项 <span class=\"required\">*</span></label>\n" +
                                        "<div class=\"col-md-6 col-sm-6\">\n" + temp3 +
                                        "<input type=\"number\" min='0' class=\"form-control\" placeholder=\"请输入需要找出以上分析项的的年级的前n名\">" +
                                        "</div></div>";

                                    // 需要计算班级平均分的项目
                                    var temp4 = "<div class=\"checkbox\">";
                                    for (i = 0; i < res.data.fileTitles.length; i++) {
                                        if (res.data.fileTitles[i] !== null) {
                                            temp4 += "<label style='margin-right: 10px'><input type=\"checkbox\" name='classAvg[]' value='" + i + "'>" + res.data.fileTitles[i] + "</label>";
                                        }
                                    }
                                    temp4 += "</div>";

                                    var classAvgStr = "<div class=\"form-group\">" +
                                        " <label class=\"control-label col-md-3 col-sm-3\">需计算<strong style='color: red'>班级平均分</strong>的项目 <span class=\"required\">*</span></label>\n" +
                                        "<div class=\"col-md-6 col-sm-6\">\n" + temp4 + "</div></div>";


                                    // 需要计算专业平均分的项目
                                    var temp5 = "<div class=\"checkbox\">";
                                    for (i = 0; i < res.data.fileTitles.length; i++) {
                                        if (res.data.fileTitles[i] !== null) {
                                            temp5 += "<label style='margin-right: 10px'><input type=\"checkbox\" name='professionAvg[]' value='" + i + "'>" + res.data.fileTitles[i] + "</label>";
                                        }
                                    }
                                    temp5 += "</div>";

                                    var professionAvgStr = "<div class=\"form-group\">" +
                                        " <label class=\"control-label col-md-3 col-sm-3\">需计算<strong style='color: red'>当前专业平均分</strong>的项目 <span class=\"required\">*</span></label>\n" +
                                        "<div class=\"col-md-6 col-sm-6\">\n" + temp5 + "</div></div>";


                                    // 需要计算的组合项之和（例如：语数外之和）的班级排名
                                    var temp7 = "<div class=\"checkbox\">";
                                    for (i = 0; i < res.data.fileTitles.length; i++) {
                                        if (res.data.fileTitles[i] !== null) {
                                            temp7 += "<label style='margin-right: 10px'><input type=\"checkbox\" name='classSum[]' value='" + i + "'>" + res.data.fileTitles[i] + "</label>";
                                        }
                                    }
                                    temp7 += "</div>";

                                    var classSumStr = "<div class=\"form-group\">" +
                                        " <label class=\"control-label col-md-3 col-sm-3\">需要计算的<strong style='color: red'>组合项之和（例如：语数外之和）</strong>的班级排名 <span class=\"required\">*</span></label>\n" +
                                        "<div class=\"col-md-6 col-sm-6\">\n" + temp7 +
                                        "<input type=\"number\" min='0' class=\"form-control\" placeholder=\"请输入需要找出以上组合项之和的班级的前n名\">" +
                                        "</div></div>";

                                    // 需要计算的组合项之和（例如：语数外之和）的专业排名
                                    var temp8 = "<div class=\"checkbox\">";
                                    for (i = 0; i < res.data.fileTitles.length; i++) {
                                        if (res.data.fileTitles[i] !== null) {
                                            temp8 += "<label style='margin-right: 10px'><input type=\"checkbox\" name='professionSum[]' value='" + i + "'>" + res.data.fileTitles[i] + "</label>";
                                        }
                                    }
                                    temp8 += "</div>";

                                    var professionSumStr = "<div class=\"form-group\">" +
                                        " <label class=\"control-label col-md-3 col-sm-3\">需要计算的<strong style='color: red'>组合项之和（例如：语数外之和）</strong>的专业排名 <span class=\"required\">*</span></label>\n" +
                                        "<div class=\"col-md-6 col-sm-6\">\n" + temp8 +
                                        "<input type=\"number\" min='0' class=\"form-control\" placeholder=\"请输入需要找出该组合项目之和的专业的前n名\">" +
                                        "</div></div>";


                                    // 需要计算的组合项之和（例如：语数外之和）的年级排名
                                    var temp9 = "<div class=\"checkbox\">";
                                    for (i = 0; i < res.data.fileTitles.length; i++) {
                                        if (res.data.fileTitles[i] !== null) {
                                            temp9 += "<label style='margin-right: 10px'><input type=\"checkbox\" name='gradeSum[]' value='" + i + "'>" + res.data.fileTitles[i] + "</label>";
                                        }
                                    }
                                    temp9 += "</div>";

                                    var gradeSumStr = "<div class=\"form-group\">" +
                                        " <label class=\"control-label col-md-3 col-sm-3\">需要计算的<strong style='color: red'>组合项之和（例如：语数外之和）</strong>的年级排名 <span class=\"required\">*</span></label>\n" +
                                        "<div class=\"col-md-6 col-sm-6\">\n" + temp9 +
                                        "<input type=\"number\" min='0' class=\"form-control\" placeholder=\"请输入需要找出该组合项目之和的年级的前n名\">" +
                                        "</div></div>";


                                    // // 需找出上面所设置的前几名
                                    // var topN = "<div class=\"form-group\">" +
                                    //     " <label class=\"control-label col-md-3 col-sm-3\">统计出<strong style='color: red'>上面所有已设置排名项前几名</strong> <span class=\"required\">*</span></label>\n" +
                                    //     "<div class=\"col-md-6 col-sm-6\"><input type=\"number\" min='0' class=\"form-control\" placeholder=\"请输入需要找出上面所设置排名项的前n名\"></div></div>";

                                    $('#form2').html(byClassesHtml + byProfession + byGrade + classSumStr + professionSumStr + gradeSumStr  + classAvgStr + professionAvgStr);


                                    resolve();
                                }


                                // Hide the loader
                                $('#wizard_verticle').smartWizard("loader", "hide");
                            }).fail(function(err) {

                                reject( err );

                                // Hide the loader
                                $('#wizard_verticle').smartWizard("loader", "hide");
                            });
                        });
                    case 2:
                        break;
                }
            });



        }

        $(document).ready(function () {
            init_SmartWizard();

        })

    </script>
@endsection
