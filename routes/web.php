<?php
use App\Http\Controllers\MekongController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckLogin;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*======================================================================*/
//Trang đăng nhập
Route::get('page-login', [MekongController::class, 'page_login']);

//DDăng xuất
Route::get('logout', [MekongController::class, 'logout']);

//Xử lý đăng nhập
Route::post('post-page-login', [MekongController::class, 'post_page_login']);
/*======================================================================*/



Route::middleware([CheckLogin::class])->group(function () {

    /*======================================================================*/
    /*TRANG CHỦ*/
    Route::get('/', [MekongController::class, 'index']);
    /*======================================================================*/


    /*======================================================================*/
    //Trang quyền truy cập
    Route::get('page-role', [MekongController::class, 'page_role']);

    //Thêm quyền truy cập CSDL
    Route::post('post-page-role', [MekongController::class, 'post_page_role']);

    //Trang thay đổi quyền
    Route::get('page-change-role/{id}', [MekongController::class, 'page_change_role']);

    //Cập nhật quyền truy cập
    Route::put('update-change-role/{id}', [MekongController::class, 'update_change_role']);
    /*======================================================================*/


    /*======================================================================*/
    //Trang người dùng quản trị
    Route::get('page-admin', [MekongController::class, 'page_admin']);

    //Thêm người dùng quản trị
    Route::get('page-add-admin', [MekongController::class, 'page_add_admin']);

    //Thêm người dùng quản trị CSDL
    Route::post('post-page-add-admin', [MekongController::class, 'post_page_add_admin']);
    /*======================================================================*/


    /*======================================================================*/
    //Trang người dùng biên tập viên
    Route::get('page-editor', [MekongController::class, 'page_editor']);

    //Thêm người dùng biên tập viên
    Route::get('page-add-editor', [MekongController::class, 'page_add_editor']);

    //Xóa người dùng biên tập viên
    Route::get('delete-editor/{id}', [MekongController::class, 'delete_editor']);

    //Thêm người dùng biên tập viên CSDL
    Route::post('post-page-add-editor', [MekongController::class, 'post_page_add_editor']);
    /*======================================================================*/


    /*======================================================================*/
    /*//Trang người dùng nhân viên
    Route::get('page-emloyee', [MekongController::class, 'page_emloyee']);

    //Thêm người dùng nhân viên
    Route::get('page-add-emloyee', [MekongController::class, 'page_add_emloyee']);

    //Xóa người dùng nhân viên
    Route::get('delete-emloyee/{id}', [MekongController::class, 'delete_emloyee']);

    //Thêm người dùng nhân viên CSDL
    Route::post('post-page-add-emloyee', [MekongController::class, 'post_page_add_emloyee']);*/
    /*======================================================================*/


    /*======================================================================*/
    //Trang hồ sơ người dùng
    Route::get('page-profile-user/{id}', [MekongController::class, 'page_profile_user']);

    //Cập nhật hồ sơ người dùng
    Route::put('update-profile-user/{id}', [MekongController::class, 'update_profile_user']);

    //Trang thay đổi mật khẩu
    Route::get('page-change-password', [MekongController::class, 'page_change_password']);

    //Cập nhật đổi mật khẩu
    Route::put('update-change-password/{id}', [MekongController::class, 'update_change_password']);
    /*======================================================================*/


    /*======================================================================*/
    //Xóa Lịch sử chỉnh sửa dự án cấp cha
    Route::get('delete-history-project-parent/{id_project_parent}', [MekongController::class, 'delete_history_project_parent']);

    //Lịch sử chỉnh sửa dự án cấp cha
    Route::get('history-project-parent/{id_project_parent}', [MekongController::class, 'history_project_parent']);

    //Xóa Phân công dự án giao quyền cho người dùng
    Route::get('delete-division-user/{id_division_user}', [MekongController::class, 'delete_division_user']);

    //Phân công dự án giao quyền cho người dùng
    Route::get('division-user/{id_project_parent}', [MekongController::class, 'division_user']);

    //Phân công dự án giao quyền cho người dùng CSDL
    Route::post('post-division-user/{id_project_parent}', [MekongController::class, 'post_division_user']);

    //Trang dự án cha gốc
    Route::get('page-project-parent', [MekongController::class, 'page_project_parent']);

    //Thêm dự án cha gốc
    Route::get('page-add-project-parent', [MekongController::class, 'page_add_project_parent']);

    //Thêm dự án cha gốc CSDL
    Route::post('post-add-project-parent', [MekongController::class, 'post_add_project_parent']);

    //Xóa dự án cha gốc
    Route::get('delete-project-parent/{id_project_parent}', [MekongController::class, 'delete_project_parent']);

    //Chỉnh sửa dự án cha gốc
    Route::get('page-edit-project-parent/{id_project_parent}', [MekongController::class, 'page_edit_project_parent']);

    //Cập nhật dự án cha gốc
    Route::put('update-project-parent/{id_project_parent}', [MekongController::class, 'update_project_parent']);
    /*======================================================================*/


    /*======================================================================*/
    //Xoá lịch sử chỉnh sửa dự án cấp 1
    Route::get('delete-project-one/{id_project_one}',
    [MekongController::class, 'delete_project_one']);

    //Xóa lịch sử chỉnh sửa dự án cấp 1
    Route::get('delete-history-project-one/{id_history_project_one}',
    [MekongController::class, 'delete_history_project_one']);

    //Xem lịch sử chỉnh sửa dự án cấp 1
    Route::get('history-project-one/{id_project_parent}/{id_project_one}',
    [MekongController::class, 'history_project_one']);

    //Trang dự án cấp 1
    Route::get('page-project-one/{id_project_parent}', [MekongController::class, 'page_project_one']);

    //Thêm dự án cấp 1
    Route::get('page-add-project-one/{id_project_parent}', [MekongController::class, 'page_add_project_one']);

    //Thêm dự án cấp 1 CSDL
    Route::post('post-add-project-one/{id_project_parent}', [MekongController::class, 'post_add_project_one']);

    //Chỉnh sửa dự án cấp 1
    Route::get('page-edit-project-one/{id_project_parent}/{id_project_one}',
    [MekongController::class, 'page_edit_project_one']);

    //Cập nhật dự án cấp 1
    Route::put('update-project-one/{id_project_parent}/{id_project_one}',
    [MekongController::class, 'update_project_one']);
    /*======================================================================*/

    /*======================================================================*/
    //Trang dự án cấp 2
    Route::get('page-project-two/{id_project_parent}/{id_project_one}', [MekongController::class, 'page_project_two']);

    //Thêm dự án cấp 2
    Route::get('page-add-project-two/{id_project_parent}/{id_project_one}',
    [MekongController::class, 'page_add_project_two']);

    //Xóa dự án cấp 2
    Route::get('delete-project-two/{id_project_two}',
    [MekongController::class, 'delete_project_two']);

    //Thêm dự án cấp 2 CSDL
    Route::post('post-add-project-two/{id_project_parent}/{id_project_one}',
    [MekongController::class, 'post_add_project_two']);

    //Xem lịch sử chỉnh sửa dự án cấp 2
    Route::get('history-project-two/{id_project_parent}/{id_project_one}/{id_project_two}',
    [MekongController::class, 'history_project_two']);

    //Xóa lịch sử chỉnh sửa dự án cấp 2
    Route::get('delete-history-project-two/{id_history_project_two}',
    [MekongController::class, 'delete_history_project_two']);

    //Chỉnh sửa dự án cấp 2
    Route::get('page-edit-project-two/{id_project_parent}/{id_project_one}/{id_project_two}',
    [MekongController::class, 'page_edit_project_two']);

    //Cập nhật dự án cấp 2
    Route::put('update-project-two/{id_project_parent}/{id_project_one}/{id_project_two}',
    [MekongController::class, 'update_project_two']);
    /*======================================================================*/


    /*======================================================================*/
    //Xem lịch sử chỉnh sửa dự án cấp 3
    Route::get('history-project-three/{id_project_parent}/{id_project_one}/{id_project_two}/{id_project_three}',
    [MekongController::class, 'history_project_three']);

    //Xóa lịch sử chỉnh sửa dự án cấp 3
    Route::get('delete-history-project-three/{id_project_three}',
    [MekongController::class, 'delete_history_project_three']);

    //Trang dự án cấp 3
    Route::get('page-project-three/{id_project_parent}/{id_project_one}/{id_project_two}',
    [MekongController::class, 'page_project_three']);

    //Thêm dự án cấp 3
    Route::get('page-add-project-three/{id_project_parent}/{id_project_one}/{id_project_two}',
    [MekongController::class, 'page_add_project_three']);

    //Xóa dự án cấp 3
    Route::get('delete-project-three/{id_project_three}',
    [MekongController::class, 'delete_project_three']);

    //Thêm dự án cấp 3 CSDL
    Route::post('post-add-project-three/{id_project_parent}/{id_project_one}/{id_project_two}',
    [MekongController::class, 'post_add_project_three']);

    //Chỉnh sửa dự án cấp 3
    Route::get('page-edit-project-three/{id_project_parent}/{id_project_one}/{id_project_two}/{id_project_three}',
    [MekongController::class, 'page_edit_project_three']);

    //Cập nhật dự án cấp 3
    Route::put('update-project-three/{id_project_parent}/{id_project_one}/{id_project_two}/{id_project_three}',
    [MekongController::class, 'update_project_three']);
    /*======================================================================*/


    /*======================================================================*/
    //Trang thời gian triển khai
    Route::get('page-deployment-time/{id_project_parent}/{id_project_one}/{id_project_two}/{id_project_three}',
    [MekongController::class, 'page_deployment_time']);

    //Trang thời gian triển khai kế hoạch
    Route::get('page-deployment-time-plan/{id_project_parent}/{id_project_one}/{id_project_two}/{id_project_three}',
    [MekongController::class, 'page_deployment_time_plan']);

    //Thêm thời gian triển khai
    Route::get('page-add-deployment-time/{id_project_parent}/{id_project_one}/{id_project_two}/{id_project_three}',
    [MekongController::class, 'page_add_deployment_time']);

    //Thêm thời gian triển khai kế hoạch (Cập nhật lại)
    Route::get('add-deployment-time-plan/{id_deployment_time_plan}',
    [MekongController::class, 'add_deployment_time_plan']);

    //Thêm thời gian triển khai báo cáo (Cập nhật lại)
    Route::get('add-deployment-time-report/{id_deployment_time_report}',
    [MekongController::class, 'add_deployment_time_report']);

    //Chỉnh sửa thời gian triển khai kế hoạch (Cập nhật lại)
    Route::get('edit-deployment-time-plan/{id_deployment_time_plan}',
    [MekongController::class, 'edit_deployment_time_plan']);

    //Chỉnh sửa thời gian triển khai báo cáo (Cập nhật lại)
    Route::get('edit-deployment-time-report/{id_deployment_time_report}',
    [MekongController::class, 'edit_deployment_time_report']);

    //Cập nhật thời gian triển khai kế hoạch (Cập nhật lại)
    Route::put('update-deployment-time-plan/{id_deployment_time_plan}',
    [MekongController::class, 'update_deployment_time_plan']);

    //Cập nhật thời gian triển khai báo cáo (Cập nhật lại)
    Route::put('update-deployment-time-report/{id_deployment_time_report}',
    [MekongController::class, 'update_deployment_time_report']);

    //Thêm thời gian triển khai CSDL
    Route::post('post-add-deployment-time/{id_project_parent}/{id_project_one}/{id_project_two}/{id_project_three}',
    [MekongController::class, 'post_add_deployment_time']);

    //Chỉnh sửa thời gian triển khai
    Route::get('page-edit-deployment-time/{id_project_parent}/{id_project_one}/{id_project_two}/{id_project_three}/{id_deployment_time}',
    [MekongController::class, 'page_edit_deployment_time']);

    //Cập nhật thời gian triển khai
    Route::put('update-deployment-time/{id_project_parent}/{id_project_one}/{id_project_two}/{id_project_three}/{id_deployment_time}',
    [MekongController::class, 'update_deployment_time']);

    //Xem lịch sử chỉnh sửa thời gian triển khai
    Route::get('history-deployment-time/{id_project_parent}/{id_project_one}/{id_project_two}/{id_project_three}/{id_deployment_time}',
    [MekongController::class, 'history_deployment_time']);

    //Xem lịch sử chỉnh sửa thời gian triển khai kế hoạch
    Route::get('history-deployment-time-plan/{id_deployment_time}',
    [MekongController::class, 'history_deployment_time_plan']);

    //Xem lịch sử chỉnh sửa thời gian triển khai báo cáo
    Route::get('history-deployment-time-report/{id_deployment_time}',
    [MekongController::class, 'history_deployment_time_report']);

    //Xóa lịch sử chỉnh sửa thời gian triển khai kế hoạch
    Route::get('delete-history-deployment-time-plan/{id_history_deployment_time}',
    [MekongController::class, 'delete_history_deployment_time_plan']);

    //Xóa lịch sử chỉnh sửa thời gian triển khai báo cáo
    Route::get('delete-history-deployment-time-report/{id_history_deployment_time}',
    [MekongController::class, 'delete_history_deployment_time_report']);

    //Xóa lịch sử chỉnh sửa thời gian triển khai
    Route::get('delete-history-deployment-time/{id_history_deployment_time}',
    [MekongController::class, 'delete_history_deployment_time']);

    //Xóa thời gian triển khai
    Route::get('delete-deployment-time/{id_deployment_time}', [MekongController::class, 'delete_deployment_time']);
    /*======================================================================*/



    /*======================================================================*/
    //Tháng và dự án
    Route::get('page-month-project/{id_month}', [MekongController::class, 'page_month_project']);

    //Chỉnh sửa tháng và dự án lối tắt nhanh
    Route::get('edit-month-project/{id_month}', [MekongController::class, 'edit_month_project']);

    //Cập nhật tháng và dự án lối tắt nhanh
    Route::put('update-month-project/{id_month}', [MekongController::class, 'update_month_project']);

    //Tháng và dự án kế hoạch
    Route::get('page-month-project-plan/{id_month}', [MekongController::class, 'page_month_project_plan']);

    //Tháng và dự án báo cáo
    Route::get('page-month-project-report/{id_month}', [MekongController::class, 'page_month_project_report']);

    //Tháng và dự án CSDL
    Route::post('post-add-project-to-month/{id_month}', [MekongController::class, 'post_add_project_to_month']);

    //Review
    Route::get('review-deployment-time-report/{id_month}', [MekongController::class, 'review_deployment_time_report']);
    /*======================================================================*/

});
