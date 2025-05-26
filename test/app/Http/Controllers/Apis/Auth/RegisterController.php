<?php

namespace App\Http\Controllers\Apis\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest; // ملف الفاليديشن المخصص لعملية التسجيل
use App\Http\traits\ApiTrait;           // Trait فيه دالة Data لتنسيق ردود الـ API
use App\Models\User;                    // موديل المستخدم للتعامل مع جدول users

class RegisterController extends Controller
{
    use ApiTrait; // استخدام Trait لمساعدات الـ API (زي تنسيق الريسبونس)

    /**
     * الدالة دي بتُستخدم لما ييجي request POST لتسجيل مستخدم جديد
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(RegisterRequest $request)
    {
        // حذف الحقول اللي مش محتاجينها في الإنشاء المباشر
        $data = $request->except("password_confirmation", "password");

        // تشفير الباسورد باستخدام Hash::make (بيستخدم bcrypt تحت الغطا)
        $data["password"] = Hash::make($request->password);

        // إنشاء المستخدم في قاعدة البيانات
        $user = User::create($data);

        // إنشاء access token باستخدام Laravel Sanctum
        // device_name بيكون جاي من الـ request (مثلاً: "android" أو "web")
        $user->token = "Bearer " . $user->createToken($request->device_name)->plainTextToken;

        // إرسال الريسبونس باستخدام الدالة Data من ApiTrait
        return $this->Data(
            compact("user"), // بترجع المتغير user كـ object جوا الريسبونس
            "",              // رسالة فاضية (ممكن تكتب: "تم التسجيل بنجاح")
            201              // كود الحالة HTTP: Created
        );
    }
}
