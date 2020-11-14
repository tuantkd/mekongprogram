<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Export file</title>
    <!-- Icon image -->
    <link rel="icon" type = "image/png" sizes = "32x32" href = "{{ asset('public/dist/img/logo-mekong.png') }}">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        $("#btnPrint").live("click", function () {
            var divContents = $("#dvContainer").html();
            var printWindow = window.open('', '', 'height=900,width=1000');
            printWindow.document.write('<html><head><title>Báo cáo</title>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });
    </script>
</head>
<body style="font-family: 'Times New Roman', Times, serif;">

    <style>
        table td, tr{
            padding: .210em;
        }
    </style>

    <div class="m-2">
        <button type="button" id="btnPrint" class="btn btn-danger">
            <i class="fa fa-print"></i> Print PDF
        </button>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <div id="dvContainer">
                    <table style="width:800px;">
                        <tr>
                            <td>
                                <a href="https://i.ibb.co/5r7727f/greenid.png">
                                    <img src="https://i.ibb.co/5r7727f/greenid.png" alt="greenid" border="0"
                                         style="max-width:100%;height:90px;">
                                </a>
                            </td>
                            <td>
                                <p>
                                    <b style="color:#46c516;">TRUNG TÂM PHÁT TRIỂN SÁNG TẠO XANH (GREENID)</b> <br>
                                    Tầng 3, Nhà C1X3, ngõ 6 Trần Hữu Dực, quận Nam Từ Liêm, Hà Nội. <br>
                                    Điện thoại 024 379 563 72 0243 2272710 <br>
                                    Email: info@greenidvietnam.org.vn Website: www.greenidvietnam.org.vn
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;margin-top: 10px;" colspan="2">
                                <h4><b>BIÊN BẢN HỌP NHÓM</b></h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Tên nhóm: Mekong</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Tháng báo cáo: {{ $review->deployment_month_initialize }}/{{ $review->deployment_year_initialize }}</b>
                            </td>
                        </tr>

                        @php($three_deployments = DB::table('project_three_and_deployment_times')->where('deployment_time_id',$review->id)->get())
                        @foreach($three_deployments as $three_deployment)
                            @if ($loop->first)
                            @php($threes = DB::table('project_level_threes')->where('id',$three_deployment->project_three_id)->get())
                            @foreach($threes as $three)
                                @php($twos = DB::table('project_level_twos')->where('id',$three->project_two_id)->get())
                                @foreach($twos as $two)
                                    @php($ones = DB::table('project_level_ones')->where('id',$two->project_one_id)->get())
                                    @foreach($ones as $one)
                                        @php($parents = DB::table('project_parents')->where('id',$one->project_parent_id)->get()->unique('project_code'))
                                        @foreach($parents as $parent)
                                        {{--====================================================================--}}
                                            <tr>
                                                <td colspan="2">
                                                    <b style="text-transform: uppercase;">
                                                        Dự án mã {{ $parent->project_code }} - {{ $parent->project_name }}
                                                    </b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><b style="font-style:italic;">Phản hồi về các hoạt động thực hiện trong tháng:</b></td>
                                            </tr>

                                            @php($one_childs = DB::table('project_level_ones')->where('project_parent_id',$parent->id)->get())
                                            @foreach($one_childs as $one_child)
                                                @php($two_childs = DB::table('project_level_twos')->where('project_one_id',$one_child->id)->get())
                                                @foreach($two_childs as $two_child)
                                                    @php($three_childs = DB::table('project_level_threes')->where('project_two_id',$two_child->id)->get())
                                                    @foreach($three_childs as $three_child)
                                                        <tr>
                                                            <td colspan="2">
                                                                <b>{{ $three_child->project_three_code }} {{ $three_child->project_three_name_operation }} </b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <P>{{ $review->deployment_result_achieved }}</P>
                                                                <P>{{ $review->deployment_description }}</P>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                        {{--====================================================================--}}
                                        @endforeach
                                    @endforeach
                                @endforeach
                            @endforeach
                            @endif
                        @endforeach



                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
