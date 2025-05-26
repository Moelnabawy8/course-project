<?php

namespace App\Http\Controllers\Apis\Auth;

// استدعاء الكنترولر الأساسي
use App\Http\Controllers\Controller;

// Request فيه قواعد التحقق من الكود
use App\Http\Requests\CheckCodeRequest;

// Trait فيه دوال خاصة بالـ API زي Data()
use App\Http\traits\ApiTrait;

// موديل المستخدم
use App\Models\User;

// لتسهيل الوصول للمستخدم المصادق عليه
use Auth;

use Illuminate\Http\Request;

class EmailVerficationController extends Controller
{
    // استخدام Trait فيه دوال تساعد في تنسيق الريسبونس
    use ApiTrait;

    // دالة إرسال الكود للمستخدم
    public function sendcode(Request $request)
    {
        // جلب التوكن من الهيدر
        $token = $request->header("Authorization");

        // جلب المستخدم المصادق عليه بالتوكن (Sanctum)
        $authenticationUser = Auth::guard('sanctum')->user();

        // إنشاء كود عشوائي مكوّن من 5 أرقام
        $code = rand(10000, 99999);

        // تحديد وقت انتهاء الكود بعد دقيقتين من الآن
        $expirationdate = date("Y-m-d H:i:s", strtotime("+2 minutes"));

        // جلب المستخدم من قاعدة البيانات
        $user = User::find($authenticationUser->id);

        // حفظ الكود وتاريخ انتهاؤه
        $user->code = $code;
        $user->code_expired_at = $expirationdate;
        $user->save();

        // إضافة التوكن للعرض فقط في الريسبونس (مش هيتخزن في الـ DB)
        $user->token = $token;

        // إرسال بيانات المستخدم في الريسبونس
        return $this->Data(compact("user"));
    }

    // دالة التحقق من الكود المُرسل
    public function checkcode(CheckCodeRequest $request)
    {
        // جلب التوكن من الهيدر
        $token = $request->header("Authorization");

        // جلب المستخدم المصادق عليه
        $authenticationUser = Auth::guard('sanctum')->user();

        // جلب المستخدم من قاعدة البيانات
        $user = User::find($authenticationUser->id);

        // إضافة التوكن للعرض فقط
        $user->token = $token;

        // التحقق إذا الكود صحيح ولم ينتهِ بعد
        if ($user->code == $request->code && $user->code_expired_at > now()) {
            // تفعيل البريد الإلكتروني
            $user->email_verified_at = now();
            $user->save();

            // إعادة إرسال بيانات المستخدم بعد التفعيل
            $user->token = $token;
            return $this->Data(compact("user"));
        } else {
            // الكود خطأ أو منتهي الصلاحية
            return $this->Data(compact("user"), "user not verified", 401);
        }
    }
}
