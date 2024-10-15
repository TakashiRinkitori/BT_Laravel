<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // Sau khi tạo nhiệm vụ mới (ví dụ trong controller), kích hoạt sự kiện:
    // event(new TaskCreated('Nhiệm vụ mới'));

    // Gửi email qua queue:
    // Trong controller, gửi email sau khi người dùng đăng ký:
    // Mail::to($user->email)->queue(new WelcomeMail());

    // Sau khi người dùng cập nhật thông tin trong controller, kích hoạt sự kiện:
    // event(new UserUpdated($user));
}
