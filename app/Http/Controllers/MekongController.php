<?php

namespace App\Http\Controllers;
use App\Models\ProjectAndUser;
use App\Models\ProjectLevelOne;
use App\Models\ProjectLevelOneHistory;
use App\Models\ProjectLevelThree;
use App\Models\ProjectLevelThreeHistory;
use App\Models\ProjectLevelTwo;
use App\Models\ProjectLevelTwoHistory;
use App\Models\ProjectParent;
use App\Models\ProjectParentHistory;
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

        if (Auth::attempt(['username' => $inputUsername, 'password' => $inputPassword], $remember_token)) {
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
    /*public function page_emloyee(Request $request)
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
    }*/

    //Thêm người dùng nhân viên
    /*public function page_add_emloyee()
    {
        return view('page.manage_emloyee.add_emloyee');
    }*/

    //Xóa người dùng nhân viên
    /*public function delete_emloyee(Request $request, $id)
    {
        User::where([['id','=',$id],['role_id','=',3]])->delete();
        $delete_emloyee_session = $request->session()->get('delete_emloyee_session');
        return redirect('page-emloyee')->with('delete_emloyee_session','delete_emloyee_session');
    }*/

    //Thêm người dùng nhân viên CSDL
    /*public function post_page_add_emloyee(Request $request)
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
    }*/
    /*========================================================*/



    /*========================================================*/
    //Thông tin người dùng
    public function page_profile_user($id)
    {
        $profile_user = User::find($id);
        return view('page.manage_profile.profile_information',['profile_user'=>$profile_user]);
    }

    //Cập nhật Thông tin người dùng
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
    //Xóa Phân công dự án giao quyền cho người dùng
    public function delete_division_user(Request $request, $id_division_user)
    {
        ProjectAndUser::destroy($id_division_user);
        $delete_division_user_session = $request->session()->get('delete_division_user_session');
        return redirect()->back()->with('delete_division_user_session','');
    }

    //Phân công dự án giao quyền cho người dùng
    public function division_user($id_project_parent)
    {
        $project_parent_id = ProjectParent::find($id_project_parent);
        $show_division_users = ProjectAndUser::where([
            ['project_parent_id','=',$id_project_parent],
            ['user_id','<>',Auth::id()]
        ])->latest()->paginate(5);

        return view('page.manage_project_parent.page_division_user',
        ['project_parent_id'=>$project_parent_id, 'show_division_users'=>$show_division_users]);
    }

    //Phân công dự án giao quyền cho người dùng CSDL
    public function post_division_user(Request $request,$id_project_parent)
    {
        $inputUserId = $request->input('inputUserId');
        $count_division_user = DB::table('project_and_users')
            ->where([['project_parent_id','=',$id_project_parent],['user_id','=',$inputUserId]])->count();
        if ($count_division_user >= 1) {
            $mes_error = $request->session()->get('mes_error');
            return redirect()->back()->with('mes_error','');
        }else{
            $division_user = new ProjectAndUser();
            $division_user->user_id = $request->input('inputUserId');
            $division_user->project_parent_id  = $id_project_parent;
            $division_user->save();

            $add_division_user_session = $request->session()->get('add_division_user_session');
            return redirect('page-project-parent')->with('add_division_user_session','');
        }
    }

    //Trang dự án cha gốc
    public function page_project_parent()
    {
        $show_project_parents = ProjectParent::latest()->paginate(5);
        return view('page.manage_project_parent.page_project_parent',['show_project_parents'=>$show_project_parents]);
    }

    //Thêm dự án cha gốc
    public function page_add_project_parent()
    {
        return view('page.manage_project_parent.add_project_parent');
    }

    //Thêm dự án cha gốc CSDL
    public function post_add_project_parent(Request $request)
    {
        /*-------------------------------------------------------*/
        //Thực hiện đầu tiên thêm dữ liệu vào CSDL
        $this->validate($request, [
            'inputCodeProjectParent'=>'unique:project_parents,project_code'
        ],[
            'inputCodeProjectParent.unique'=>'Mã dự án đã tồn tại'
        ]);

        $add_project_parent = new ProjectParent();
        $add_project_parent->project_code = $request->input('inputCodeProjectParent');
        $add_project_parent->project_name = $request->input('inputNameProject');
        $add_project_parent->project_description = $request->input('inputDiscribeProject');
        $add_project_parent->save();
        /*-------------------------------------------------------*/

        /*-------------------------------------------------------*/
        //Thực hiện thứ 2 lấy ID MAX mới thêm
        $id_max_project_parent = DB::table('project_parents')->max('id');
        /*-------------------------------------------------------*/

        /*-------------------------------------------------------*/
        //Thêm dự án người dùng với mã dự án mới nhất
        $add_project_user = new ProjectAndUser();
        $add_project_user->user_id = Auth::id();
        $add_project_user->project_parent_id = $id_max_project_parent;
        $add_project_user->save();
        /*-------------------------------------------------------*/

        $add_project_parent_session = $request->session()->get('add_project_parent_session');
        return redirect('page-project-parent')->with('add_project_parent_session','');
    }

    //Cập nhật án cha gốc CSDL
    public function update_project_parent(Request $request, $id_project_parent)
    {
        $update_project_parent = ProjectParent::find($id_project_parent);
        $update_project_parent->project_name = $request->input('inputNameProject');
        $update_project_parent->project_description = $request->input('inputDiscribeProject');
        $update_project_parent->save();

        $update_project_parent_session = $request->session()->get('update_project_parent_session');
        return redirect('page-project-parent')->with('update_project_parent_session','');
    }

    //Chỉnh sửa dự án cha gốc
    public function page_edit_project_parent($id_project_parent)
    {
        $edit_project_parent = ProjectParent::find($id_project_parent);

        //Lưu lịch sử chỉnh sửa cấp cha
        $history_project_parent = new ProjectParentHistory();
        $history_project_parent->user_id = Auth::id();
        $history_project_parent->project_parent_id = $id_project_parent;
        $history_project_parent->project_code = $edit_project_parent->project_code;
        $history_project_parent->project_name = $edit_project_parent->project_name;
        $history_project_parent->project_description = $edit_project_parent->project_description;
        $history_project_parent->save();

        return view('page.manage_project_parent.edit_project_parent',['edit_project_parent'=>$edit_project_parent]);
    }

    //Xóa dự án cha gốc
    public function delete_project_parent(Request $request, $id_project_parent)
    {
        ProjectParent::destroy($id_project_parent);
        $delete_project_parent_session = $request->session()->get('delete_project_parent_session');
        return redirect()->back()->with('delete_project_parent_session','');
    }

    //XEM lịch sử chỉnh sửa dự án cha gốc
    public function history_project_parent(Request $request, $id_project_parent)
    {
        $history_parents = ProjectParentHistory::where('project_parent_id',$id_project_parent)->latest()->paginate(5);
        return view('page.manage_project_parent.history_project_parent',['history_parents'=>$history_parents]);
    }

    //Xóa lịch sử chỉnh sửa dự án cha gốc
    public function delete_history_project_parent(Request $request, $id_history_project_parent)
    {
        ProjectParentHistory::destroy($id_history_project_parent);
        $delete_history_project_parent_session = $request->session()->get('delete_history_project_parent_session');
        return redirect()->back()->with('delete_history_project_parent_session','');
    }
    /*========================================================*/



    /*========================================================*/
    //Xóa dự án cấp 1
    public function delete_project_one(Request $request,$id_project_one)
    {
        ProjectLevelOne::destroy($id_project_one);
        $delete_project_one_session = $request->session()->get('delete_project_one_session');
        return redirect()->back()->with('delete_project_one_session','');
    }

    //Xóa lịch sử chỉnh sửa dự án cấp 1
    public function delete_history_project_one(Request $request,$id_history_project_one)
    {
        ProjectLevelOneHistory::destroy($id_history_project_one);
        $delete_history_project_one_session = $request->session()->get('delete_history_project_one_session');
        return redirect()->back()->with('delete_history_project_one_session','');
    }

    //Xem lịch sử chỉnh sửa dự án cấp 1
    public function history_project_one($id_project_parent,$id_project_one)
    {
        $project_parent_id = ProjectParent::find($id_project_parent);
        $history_ones = ProjectLevelOneHistory::where('project_one_id', $id_project_one)->latest()->paginate(5);
        return view('page.manage_project_one.history_project_one',
        ['project_parent_id'=>$project_parent_id, 'history_ones'=>$history_ones]);
    }

    //Trang dự án cấp 1
    public function page_project_one($id_project_parent)
    {
        $view_project_parent_id = ProjectParent::find($id_project_parent);
        $show_project_ones = ProjectLevelOne::where('project_parent_id',$id_project_parent)->latest()->paginate(5);

        return view('page.manage_project_one.page_project_one',
        ['view_project_parent_id'=>$view_project_parent_id, 'show_project_ones'=>$show_project_ones]);
    }

    //Thêm dự án cấp 1
    public function page_add_project_one($id_project_parent)
    {
        $view_project_parent_id = ProjectParent::find($id_project_parent);
        return view('page.manage_project_one.add_project_one', ['view_project_parent_id'=>$view_project_parent_id]);
    }

    //Thêm dự án cấp 1 CSDL
    public function post_add_project_one(Request $request, $id_project_parent)
    {
        $inputCodeProjectOne = $request->input('inputCodeProjectOne');
        $count_project_one_and_id_project_parent = DB::table('project_level_ones')
            ->where([
                ['project_one_code','=',$inputCodeProjectOne],
                ['project_parent_id','=',$id_project_parent]
            ])->count();

        if ($count_project_one_and_id_project_parent >= 1) {
            $mes_exist_error_one = $request->session()->get('mes_exist_error_one');
            return redirect()->back()->with('mes_exist_error_one','');
        }else{
            $add_project_one = new ProjectLevelOne();
            $add_project_one->project_parent_id = $id_project_parent;
            $add_project_one->project_one_code = $request->input('inputCodeProjectOne');
            $add_project_one->project_one_name_operation = $request->input('inputNameOperation');
            $add_project_one->project_one_result_need_reach = $request->input('inputResultReach');
            $add_project_one->project_one_index_need_reach = $request->input('inputIndexReach');
            $add_project_one->project_one_note = $request->input('inputNote');
            $add_project_one->save();

            $add_project_one_session = $request->session()->get('add_project_one_session');
            return redirect('page-project-one/'.$id_project_parent)->with('add_project_one_session','');
        }
    }

    //Cập nhật dự án cấp 1 CSDL
    public function update_project_one(Request $request, $id_project_parent, $id_project_one)
    {
        $update_project_one = ProjectLevelOne::find($id_project_one);
        $update_project_one->project_one_name_operation = $request->input('inputNameOperation');
        $update_project_one->project_one_result_need_reach = $request->input('inputResultReach');
        $update_project_one->project_one_index_need_reach = $request->input('inputIndexReach');
        $update_project_one->project_one_note = $request->input('inputNote');
        $update_project_one->save();

        $update_project_one_session = $request->session()->get('update_project_one_session');
        return redirect('page-project-one/'.$id_project_parent)->with('update_project_one_session','');
    }

    //Chỉnh sửa dự án cấp 1
    public function page_edit_project_one($id_project_parent, $id_project_one)
    {
        $project_parent_id = ProjectParent::find($id_project_parent);
        $edit_project_one = ProjectLevelOne::find($id_project_one);

        //Lưu chỉnh sửa dự án cấp 1
        $history_project_one = new ProjectLevelOneHistory();
        $history_project_one->user_id = Auth::id();
        $history_project_one->project_one_id = $id_project_one;
        $history_project_one->project_one_code = $edit_project_one->project_one_code;
        $history_project_one->project_one_name_operation = $edit_project_one->project_one_name_operation;
        $history_project_one->project_one_result_need_reach = $edit_project_one->project_one_result_need_reach;
        $history_project_one->project_one_index_need_reach = $edit_project_one->project_one_index_need_reach;
        $history_project_one->project_one_note = $edit_project_one->project_one_note;
        $history_project_one->save();

        return view('page.manage_project_one.edit_project_one',
        ['project_parent_id'=>$project_parent_id, 'edit_project_one'=>$edit_project_one]);
    }
    /*========================================================*/



    /*========================================================*/
    //Trang dự án cấp 2
    public function page_project_two($id_project_parent,$id_project_one)
    {
        $project_parent_id = ProjectParent::find($id_project_parent);
        $project_one_id = ProjectLevelOne::find($id_project_one);

        $show_project_twos = ProjectLevelTwo::where('project_one_id',$id_project_one)->latest()->paginate(5);
        return view('page.manage_project_two.page_project_two',
        ['project_parent_id'=>$project_parent_id, 'project_one_id'=>$project_one_id, 'show_project_twos'=>$show_project_twos]);
    }

    //Thêm dự án cấp 2
    public function page_add_project_two($id_project_parent,$id_project_one)
    {
        $project_parent_id = ProjectParent::find($id_project_parent);
        $project_one_id = ProjectLevelOne::find($id_project_one);
        return view('page.manage_project_two.add_project_two',
        ['project_parent_id'=>$project_parent_id, 'project_one_id'=>$project_one_id]);
    }

    //Thêm dự án cấp 2 csdl
    public function post_add_project_two(Request $request,$id_project_parent,$id_project_one)
    {
        $project_parent_id = ProjectParent::find($id_project_parent);
        $project_one_id = ProjectLevelOne::find($id_project_one);

        $inputCodeProjectOne = $project_one_id->project_one_code;
        $inputCodeProjectTwo = $request->input('inputCodeProjectTwo');

        //Convert str to arr
        $CodeProjectOne = explode('.', $inputCodeProjectOne);
        $CodeProjectTwo = explode('.', $inputCodeProjectTwo);

        $count_id_project_one_two_code = DB::table('project_level_twos')
            ->where([
                ['project_one_id','=',$id_project_one],
                ['project_two_code','=',$inputCodeProjectTwo]
            ])->count();

        if ($count_id_project_one_two_code >= 1) {
            $mes_error_two = $request->session()->get('mes_error_two');
            return redirect()->back()->with('mes_error_two','');
        }elseif ($CodeProjectOne[1] == $CodeProjectTwo[1]){
            $add_project_two = new ProjectLevelTwo();
            $add_project_two->project_one_id = $id_project_one;
            $add_project_two->project_two_code = $request->input('inputCodeProjectTwo');
            $add_project_two->project_two_name_operation = $request->input('inputNameOperation');
            $add_project_two->project_two_result_need_reach = $request->input('inputResultReach');
            $add_project_two->project_two_index_need_reach = $request->input('inputIndexReach');
            $add_project_two->project_two_note = $request->input('inputNote');
            $add_project_two->save();

            $add_project_two_session = $request->session()->get('add_project_two_session');
            return redirect('page-project-two/'.$id_project_parent.'/'.$id_project_one)->with('add_project_two_session','');
        }else{
            $mes_required = $request->session()->get('mes_required');
            return redirect()->back()->with('mes_required','');
        }
    }

    //Chỉnh sửa dự án cấp 2
    public function page_edit_project_two($id_project_parent,$id_project_one,$id_project_two)
    {
        $project_parent_id = ProjectParent::find($id_project_parent);
        $project_one_id = ProjectLevelOne::find($id_project_one);
        $edit_project_two = ProjectLevelTwo::find($id_project_two);

        //Lưu lịch sử chỉnh sửa cấp 2
        $history_two = new ProjectLevelTwoHistory();
        $history_two->project_two_id = $id_project_two;
        $history_two->user_id = Auth::id();
        $history_two->project_two_code = $edit_project_two->project_two_code;
        $history_two->project_two_name_operation = $edit_project_two->project_two_name_operation;
        $history_two->project_two_result_need_reach = $edit_project_two->project_two_result_need_reach;
        $history_two->project_two_index_need_reach = $edit_project_two->project_two_index_need_reach;
        $history_two->project_two_note = $edit_project_two->project_two_note;
        $history_two->save();

        return view('page.manage_project_two.edit_project_two',
        [
            'project_parent_id'=>$project_parent_id,
            'project_one_id'=>$project_one_id,
            'edit_project_two'=>$edit_project_two,
        ]);
    }

    //Chỉnh sửa dự án cấp 2
    public function update_project_two(Request $request,$id_project_parent,$id_project_one,$id_project_two)
    {
        $update_project_two = ProjectLevelTwo::find($id_project_two);
        $update_project_two->project_two_name_operation = $request->input('inputNameOperation');
        $update_project_two->project_two_result_need_reach = $request->input('inputResultReach');
        $update_project_two->project_two_index_need_reach = $request->input('inputIndexReach');
        $update_project_two->project_two_note = $request->input('inputNote');
        $update_project_two->save();

        $update_project_two_session = $request->session()->get('update_project_two_session');
        return redirect('page-project-two/'.$id_project_parent.'/'.$id_project_one)->with('update_project_two_session','');
    }

    //Xóa dự án cấp 2
    public function delete_project_two(Request $request,$id_project_two)
    {
        ProjectLevelTwo::destroy($id_project_two);
        $delete_project_two_session = $request->session()->get('delete_project_two_session');
        return redirect()->back()->with('delete_project_two_session','');
    }

    //Xóa lịch sử chỉnh sửa dự án cấp 2
    public function delete_history_project_two(Request $request,$id_project_two)
    {
        ProjectLevelTwoHistory::destroy($id_project_two);
        $delete_history_project_two_session = $request->session()->get('delete_history_project_two_session');
        return redirect()->back()->with('delete_history_project_two_session','');
    }

    //Xem lịch sử chỉnh sửa dự án cấp 2
    public function history_project_two($id_project_parent,$id_project_one,$id_project_two)
    {
        $project_parent_id = ProjectParent::find($id_project_parent);
        $project_one_id = ProjectLevelOne::find($id_project_one);

        $show_history_two = ProjectLevelTwoHistory::where('project_two_id',$id_project_two)->latest()->paginate(5);
        return view('page.manage_project_two.history_project_two',
        [
            'project_parent_id'=>$project_parent_id,
            'project_one_id'=>$project_one_id,
            'show_history_two'=>$show_history_two,
        ]);
    }
    /*========================================================*/


    /*========================================================*/
    //Trang dự án cấp 3
    public function page_project_three($id_project_parent, $id_project_one, $id_project_two)
    {
        $project_parent_id = ProjectParent::find($id_project_parent);
        $project_one_id = ProjectLevelOne::find($id_project_one);
        $project_two_id = ProjectLevelTwo::find($id_project_two);

        $show_project_threes = ProjectLevelThree::where('project_two_id',$id_project_two)->latest()->paginate(5);
        return view('page.manage_project_three.page_project_three',
        [
            'project_parent_id'=>$project_parent_id,
            'project_one_id'=>$project_one_id,
            'project_two_id'=>$project_two_id,
            'show_project_threes'=>$show_project_threes
        ]);
    }

    //Thêm dự án cấp 3
    public function page_add_project_three($id_project_parent, $id_project_one, $id_project_two)
    {
        $project_parent_id = ProjectParent::find($id_project_parent);
        $project_one_id = ProjectLevelOne::find($id_project_one);
        $project_two_id = ProjectLevelTwo::find($id_project_two);
        return view('page.manage_project_three.add_project_three',
        [
            'project_parent_id'=>$project_parent_id,
            'project_one_id'=>$project_one_id,
            'project_two_id'=>$project_two_id
        ]);
    }

    //Thêm dự án cấp 3 CSDL
    public function post_add_project_three(Request $request, $id_project_parent, $id_project_one, $id_project_two)
    {
        $project_two_id = ProjectLevelTwo::find($id_project_two);
        $inputCodeProjectThree = $request->input('inputCodeProjectThree');

        //Convert str to arr
        $CodeProjectTwo = explode('.', $project_two_id->project_two_code);
        $CodeProjectThree = explode('.', $inputCodeProjectThree);

        $count_id_project_two_three_code = DB::table('project_level_threes')
            ->where([
                ['project_two_id','=',$id_project_two],
                ['project_three_code','=',$inputCodeProjectThree]
            ])->count();

        if ($count_id_project_two_three_code >= 1) {
            $mes_error_three_session = $request->session()->get('mes_error_three_session');
            return redirect()->back()->with('mes_error_three_session','');
        }elseif (($CodeProjectTwo[1] == $CodeProjectThree[1]) && ($CodeProjectTwo[2] == $CodeProjectThree[2])){
            $add_project_three = new ProjectLevelThree();
            $add_project_three->project_two_id = $id_project_two;
            $add_project_three->project_three_code = $request->input('inputCodeProjectThree');
            $add_project_three->project_three_name_operation = $request->input('inputNameOperation');
            $add_project_three->project_three_result_need_reach = $request->input('inputResultReach');
            $add_project_three->project_three_index_need_reach = $request->input('inputIndexReach');
            $add_project_three->project_three_note = $request->input('inputNote');
            $add_project_three->save();

            $add_project_three_session = $request->session()->get('add_project_three_session');
            return redirect('page-project-three/'.$id_project_parent.'/'.$id_project_one.'/'.$id_project_two)
                ->with('add_project_three_session','');
        }else{
            $mes_required_three_session = $request->session()->get('mes_required_three_session');
            return redirect()->back()->with('mes_required_three_session','');
        }
    }

    //Xóa dự án cấp 3
    public function delete_project_three(Request $request, $id_project_three)
    {
        ProjectLevelThree::destroy($id_project_three);
        $delete_project_three_session = $request->session()->get('delete_project_three_session');
        return redirect()->back()->with('delete_project_three_session','');
    }

    //Chỉnh sửa dự án cấp 3
    public function page_edit_project_three($id_project_parent, $id_project_one, $id_project_two, $id_project_three)
    {
        $project_parent_id = ProjectParent::find($id_project_parent);
        $project_one_id = ProjectLevelOne::find($id_project_one);
        $project_two_id = ProjectLevelTwo::find($id_project_two);
        $edit_project_three = ProjectLevelThree::find($id_project_three);

        //Lưu lịch sử chỉnh sửa dự án cấp 3
        $history_three = new ProjectLevelThreeHistory();
        $history_three->project_three_id = $id_project_three;
        $history_three->user_id = Auth::id();
        $history_three->project_three_code = $edit_project_three->project_three_code;
        $history_three->project_three_name_operation = $edit_project_three->project_three_name_operation;
        $history_three->project_three_result_need_reach = $edit_project_three->project_three_result_need_reach;
        $history_three->project_three_index_need_reach = $edit_project_three->project_three_index_need_reach;
        $history_three->project_three_note = $edit_project_three->project_three_note;
        $history_three->save();

        return view('page.manage_project_three.edit_project_three',
        [
            'project_parent_id'=>$project_parent_id,
            'project_one_id'=>$project_one_id,
            'project_two_id'=>$project_two_id,
            'edit_project_three'=>$edit_project_three
        ]);
    }

    //Cập nhật dự án cấp 3
    public function update_project_three(Request $request,$id_project_parent,$id_project_one,$id_project_two,$id_project_three)
    {
        $update_project_three = ProjectLevelThree::find($id_project_three);
        $update_project_three->project_three_name_operation = $request->input('inputNameOperation');
        $update_project_three->project_three_result_need_reach = $request->input('inputResultReach');
        $update_project_three->project_three_index_need_reach = $request->input('inputIndexReach');
        $update_project_three->project_three_note = $request->input('inputNote');
        $update_project_three->save();

        $update_project_three_session = $request->session()->get('update_project_three_session');
        return redirect('page-project-three/'.$id_project_parent.'/'.$id_project_one.'/'.$id_project_two)
        ->with('update_project_three_session','');
    }

    //Xem lịch sử chỉnh sửa dự án cấp 3
    public function history_project_three($id_project_parent,$id_project_one,$id_project_two,$id_project_three)
    {
        $project_parent_id = ProjectParent::find($id_project_parent);
        $project_one_id = ProjectLevelOne::find($id_project_one);
        $project_two_id = ProjectLevelTwo::find($id_project_two);
        $show_history_three = ProjectLevelThreeHistory::where('project_three_id',$id_project_three)->latest()->paginate(5);
        return view('page.manage_project_three.history_project_three',
        [
            'project_parent_id'=>$project_parent_id,
            'project_one_id'=>$project_one_id,
            'project_two_id'=>$project_two_id,
            'show_history_three'=>$show_history_three
        ]);
    }

    //Xóa lịch sử chỉnh sửa dự án cấp 3
    public function delete_history_project_three(Request $request,$id_project_three)
    {
        ProjectLevelThreeHistory::destroy($id_project_three);
        $delete_history_three_session = $request->session()->get('delete_history_three_session');
        return redirect()->back()->with('delete_history_three_session','');
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
