<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MekongController extends Controller
{

    /*========================================================*/
    //Trang đăng nhập
    public function page_login()
    {
        if (!Auth::check()){
            return view('page.page_login');
        }else{
            return redirect('/');
        }
    }

    //Đăng nhập
    public function logout()
    {
        Auth::logout();
        return redirect('page-login');
    }

    //Xử lý đăng nhập
    public function post_page_login(Request  $request)
    {
        $inputUsername = $request->input('inputUsername');
        $inputPassword = $request->input('inputPassword');
        $remember_token = ($request->has('remember')) ? true : false;

        if (Auth::attempt(['username' => $inputUsername, 'password' => $inputPassword, 'role_id' => 1], $remember_token)) {
            return redirect('/');
        }else{
            $error_login = $request->session()->get('error_login');
            return redirect()->back()->with('error_login','');
        }
    }
    /*========================================================*/


    /*========================================================*/
    //Trang chủ
    public function index()
    {
        return view('page.index');
    }
    /*========================================================*/


    /*========================================================*/
    //Trang quyền truy cập
    public function page_role(Request $request)
    {
        $search = $request->input('inputSearch');
        if($search != ""){
            $show_role_users = User::where(function ($query) use ($search){
                $query->where('fullname', 'like', '%'.$search.'%')
                    ->orWhere('username', 'like', '%'.$search.'%');
            })->paginate(1);
            $show_role_users->appends(['inputSearch' => $search]);
        }
        else{
            $show_role_users = User::latest()->paginate(5);
        }

        $show_roles = Role::latest()->get();
        return view('page.manage_role.page_role',['show_roles'=>$show_roles,'show_role_users'=>$show_role_users]);
    }

    //Thêm quyền truy cập
    public function post_page_role(Request $request)
    {
        $add_role = new Role();
        $add_role->role_name = $request->input('inputNameRole');
        $add_role->role_description = $request->input('inputRoleDiscribe');
        $add_role->save();
        $add_role_session = $request->session()->get('add_role_session');
        return redirect()->back()->with('add_role_session','add_role_session');
    }
    //Trang thay đổi quyền truy cập
    public function page_change_role($id)
    {
        $change_role = User::find($id);
        return view('page.manage_role.change_role',['change_role'=>$change_role]);
    }

    //Cập nhật quyền truy cập
    public function update_change_role(Request $request, $id)
    {
        $inputRoleId = $request->input('inputRoleId');
        User::where('id', $id)->update(['role_id' => $inputRoleId]);

        $update_role_session = $request->session()->get('update_role_session');
        return redirect('page-role')->with('update_role_session','update_role_session');
    }
    /*========================================================*/


    /*========================================================*/
    //Trang người dùng quản trị
    public function page_admin(Request $request)
    {
        $search = $request->input('inputSearch');
        if($search != ""){
            $show_admins = User::where(function ($query) use ($search){
                $query->where([['fullname', 'like', '%'.$search.'%'],['role_id','=',1]])
                    ->orWhere([['username', 'like', '%'.$search.'%'],['role_id','=',1]]);
            })->paginate(1);
            $show_admins->appends(['inputSearch' => $search]);
        }
        else{
            $show_admins = User::where('role_id',1)->latest()->paginate(5);
        }
        return view('page.manage_admin.page_admin',['show_admins'=>$show_admins]);
    }

    //Thêm người dùng quản trị
    public function page_add_admin()
    {
        return view('page.manage_admin.add_admin');
    }

    //Thêm người dùng quản trị CSDL
    public function post_page_add_admin(Request $request)
    {
        $add_admin = new User();
        $add_admin->role_id = 1;
        $add_admin->fullname = $request->input('inputFullname');
        $add_admin->username = $request->input('inputUsername');
        $add_admin->password = bcrypt($request->input('inputPassword'));
        $add_admin->email = $request->input('inputEmail');
        $add_admin->sex = $request->input('inputSex');
        $add_admin->birthday = $request->input('inputBirthday');
        $add_admin->phone = $request->input('inputPhone');
        $add_admin->address = $request->input('inputAddress');

        if ($request->hasfile('fileInput')) {
            $get_file = $request->file('fileInput');
            $file_image_avatar = $get_file->getClientOriginalName();
            $get_file->move(public_path('upload_avatar'), $file_image_avatar);
            $add_admin->avatar = $file_image_avatar;
        }

        $add_admin->save();
        $add_admin_session = $request->session()->get('add_admin_session');
        return redirect('page-admin')->with('add_admin_session','add_admin_session');
    }
    /*========================================================*/




    /*========================================================*/
    //Trang người dùng biên tập viên
    public function page_editor(Request $request)
    {
        $search = $request->input('inputSearch');
        if($search != ""){
            $show_editors = User::where(function ($query) use ($search){
                $query->where([['fullname', 'like', '%'.$search.'%'],['role_id','=',2]])
                    ->orWhere([['username', 'like', '%'.$search.'%'],['role_id','=',2]]);
            })->paginate(1);
            $show_editors->appends(['inputSearch' => $search]);
        }
        else{
            $show_editors = User::where('role_id',2)->latest()->paginate(5);
        }
        return view('page.manage_editor.page_editor',['show_editors'=>$show_editors]);
    }

    //Thêm người dùng biên tập viên
    public function page_add_editor()
    {
        return view('page.manage_editor.add_editor');
    }

    //Xóa người dùng biên tập viên
    public function delete_editor(Request $request, $id)
    {
        User::where([['id','=',$id],['role_id','=',2]])->delete();
        $delete_editor_session = $request->session()->get('delete_editor_session');
        return redirect('page-editor')->with('delete_editor_session','delete_editor_session');
    }

    //Thêm người dùng biên tập viên CSDL
    public function post_page_add_editor(Request $request)
    {
        $add_editor = new User();
        $add_editor->role_id = 2;
        $add_editor->fullname = $request->input('inputFullname');
        $add_editor->username = $request->input('inputUsername');
        $add_editor->password = bcrypt($request->input('inputPassword'));
        $add_editor->email = $request->input('inputEmail');
        $add_editor->sex = $request->input('inputSex');
        $add_editor->birthday = $request->input('inputBirthday');
        $add_editor->phone = $request->input('inputPhone');
        $add_editor->address = $request->input('inputAddress');

        if ($request->hasfile('fileInput')) {
            $get_file = $request->file('fileInput');
            $file_image_avatar = $get_file->getClientOriginalName();
            $get_file->move(public_path('upload_avatar'), $file_image_avatar);
            $add_editor->avatar = $file_image_avatar;
        }

        $add_editor->save();
        $add_editor_session = $request->session()->get('add_editor_session');
        return redirect('page-editor')->with('add_editor_session','add_editor_session');
    }
    /*========================================================*/


    /*========================================================*/
    //Trang người dùng nhân viên
    public function page_emloyee(Request $request)
    {
        $search = $request->input('inputSearch');
        if($search != ""){
            $show_emloyees = User::where(function ($query) use ($search){
                $query->where([['fullname', 'like', '%'.$search.'%'],['role_id','=',3]])
                    ->orWhere([['username', 'like', '%'.$search.'%'],['role_id','=',3]]);
            })->paginate(1);
            $show_emloyees->appends(['inputSearch' => $search]);
        }
        else{
            $show_emloyees = User::where('role_id',3)->latest()->paginate(5);
        }
        return view('page.manage_emloyee.page_emloyee',['show_emloyees'=>$show_emloyees]);
    }

    //Thêm người dùng nhân viên
    public function page_add_emloyee()
    {
        return view('page.manage_emloyee.add_emloyee');
    }

    //Xóa người dùng nhân viên
    public function delete_emloyee(Request $request, $id)
    {
        User::where([['id','=',$id],['role_id','=',3]])->delete();
        $delete_emloyee_session = $request->session()->get('delete_emloyee_session');
        return redirect('page-emloyee')->with('delete_emloyee_session','delete_emloyee_session');
    }

    //Thêm người dùng nhân viên CSDL
    public function post_page_add_emloyee(Request $request)
    {
        $add_emloyee = new User();
        $add_emloyee->role_id = 3;
        $add_emloyee->fullname = $request->input('inputFullname');
        $add_emloyee->username = $request->input('inputUsername');
        $add_emloyee->password = bcrypt($request->input('inputPassword'));
        $add_emloyee->email = $request->input('inputEmail');
        $add_emloyee->sex = $request->input('inputSex');
        $add_emloyee->birthday = $request->input('inputBirthday');
        $add_emloyee->phone = $request->input('inputPhone');
        $add_emloyee->address = $request->input('inputAddress');

        if ($request->hasfile('fileInput')) {
            $get_file = $request->file('fileInput');
            $file_image_avatar = $get_file->getClientOriginalName();
            $get_file->move(public_path('upload_avatar'), $file_image_avatar);
            $add_emloyee->avatar = $file_image_avatar;
        }

        $add_emloyee->save();
        $add_emloyee_session = $request->session()->get('add_emloyee_session');
        return redirect('page-emloyee')->with('add_emloyee_session','add_emloyee_session');
    }
    /*========================================================*/



    /*========================================================*/
    //Thêm người dùng nhân viên
    public function page_profile_user($id)
    {
        $profile_user = User::find($id);
        return view('page.manage_profile.profile_information',['profile_user'=>$profile_user]);
    }

    //Cập nhật người dùng nhân viên
    public function update_profile_user(Request $request, $id)
    {
        $update_profile_user = User::find($id);
        $update_profile_user->email = $request->input('inputEmail');
        $update_profile_user->sex = $request->input('inputSex');
        $update_profile_user->birthday = $request->input('inputBirthday');
        $update_profile_user->phone = $request->input('inputPhone');
        $update_profile_user->address = $request->input('inputAddress');

        if ($request->hasfile('inputFileAvatar')) {
            $get_file = $request->file('inputFileAvatar');
            $file_image_avatar = $get_file->getClientOriginalName();
            $get_file->move(public_path('upload_avatar'), $file_image_avatar);
            $update_profile_user->avatar = $file_image_avatar;
        }

        $update_profile_user->save();
        $update_profile_session = $request->session()->get('update_profile_session');
        return redirect()->back()->with('update_profile_session','update_profile_session');

    }

    //Trang thay đổi mật khẩu
    public function page_change_password()
    {
        return view('page.manage_profile.change_password');
    }

    //Cập nhật mật khẩu
    public function update_change_password(Request $request, $id_user)
    {
        $users = DB::table('users')->where('id', $id_user)->get();
        //Trong model User tìm đến cái id thẻ input hidden có chứa id user cập nhật nó lại
        $change = User::find($id_user);
        $old_pass = $request->input('inputPasswordOld');
        $new_pass = $request->input('inputPasswordNew');
        $new_pass_confirm = $request->input('inputPasswordNewComfirm');

        foreach($users as $val_users){
            //Lấy mật khẩu trong csdl ra
            $db_pass = $val_users->password;
            //Nếu mật khẩu trong thẻ inout (nhập mật khẩu cũ) mà bằng với mật khẩu trong csdl
            if(password_verify($old_pass,$db_pass)){
                if($new_pass == $new_pass_confirm){
                    $change->password = bcrypt($request->input('inputPasswordNewComfirm'));
                    $change->save();
                    return redirect('logout');
                }else{
                    $change_password_user_fail = $request->session()->get('change_password_user_fail');
                    return redirect()->back()->with('change_password_user_fail','');
                }
            }else{
                $old_pass_fail = $request->session()->get('old_pass_fail');
                return redirect()->back()->with('old_pass_fail','');
            }
        }
    }
    /*========================================================*/


    /*========================================================*/
    //Trang dự án cha gốc
    public function page_project_parent()
    {
        return view('page.manage_project_parent.page_project_parent');
    }

    //Thêm dự án cha gốc
    public function page_add_project_parent()
    {
        return view('page.manage_project_parent.add_project_parent');
    }

    //Chỉnh sửa dự án cha gốc
    public function page_edit_project_parent()
    {
        return view('page.manage_project_parent.edit_project_parent');
    }
    /*========================================================*/



    /*========================================================*/
    //Trang dự án cấp 1
    public function page_project_one()
    {
        return view('page.manage_project_one.page_project_one');
    }

    //Thêm dự án cấp 1
    public function page_add_project_one()
    {
        return view('page.manage_project_one.add_project_one');
    }

    //Chỉnh sửa dự án cấp 1
    public function page_edit_project_one()
    {
        return view('page.manage_project_one.edit_project_one');
    }
    /*========================================================*/



    /*========================================================*/
    //Trang dự án cấp 2
    public function page_project_two()
    {
        return view('page.manage_project_two.page_project_two');
    }

    //Thêm dự án cấp 2
    public function page_add_project_two()
    {
        return view('page.manage_project_two.add_project_two');
    }

    //Chỉnh sửa dự án cấp 2
    public function page_edit_project_two()
    {
        return view('page.manage_project_two.edit_project_two');
    }
    /*========================================================*/


    /*========================================================*/
    //Trang dự án cấp 3
    public function page_project_three()
    {
        return view('page.manage_project_three.page_project_three');
    }

    //Thêm dự án cấp 3
    public function page_add_project_three()
    {
        return view('page.manage_project_three.add_project_three');
    }

    //Chỉnh sửa dự án cấp 3
    public function page_edit_project_three()
    {
        return view('page.manage_project_three.edit_project_three');
    }
    /*========================================================*/



    /*========================================================*/
    //Trang thời gian triển khai
    public function page_deployment_time()
    {
        return view('page.manage_deployment_time.page_deployment_time');
    }

    //Thêm thời gian triển khai
    public function page_add_deployment_time()
    {
        return view('page.manage_deployment_time.add_deployment_time');
    }

    //Chỉnh sửa thời gian triển khai
    public function page_edit_deployment_time()
    {
        return view('page.manage_deployment_time.edit_deployment_time');
    }
    /*========================================================*/
}