<?php

namespace App\Http\Controllers\Apis\Auth;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\traits\ApiTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    use ApiTrait;  // هنا بنستخدم Trait فيه دوال مساعدة للردود (نجاح، خطأ، بيانات)

    // دالة تسجيل الدخول
    public function login(Request $request)
    {
        // نجيب المستخدم من قاعدة البيانات بناءً على البريد الإلكتروني اللي جه في الطلب
        $user = User::where('email', $request->email)->first();

        // لو كلمة المرور المدخلة مش صحيحة (غير متطابقة مع كلمة مرور المستخدم)
        if (! Hash::check($request->password, $user->password)) {
            // نرجع رسالة خطأ بصيغة API (الدالة موجودة في ApiTrait)
            return $this->ErrorMessage(
                ['email' => 'The provided credentials are incorrect.'],  // تفاصيل الخطأ
                'Login failed',  // رسالة عامة
                401  // كود الخطأ HTTP (غير مصرح)
            );
        }

        // لو البيانات صح، ننشئ توكن جديد للجهاز (device_name) اللي المستخدم محدده في الطلب
        $token = $user->createToken($request->device_name)->plainTextToken;

        // نضيف التوكن مع بيانات المستخدم علشان نرجعه في الرد
        $user->token = "Bearer " . $token;

        // نرجع بيانات المستخدم مع رسالة نجاح وكود 200
        return $this->Data(compact("user"), "Login successful", 200);
    }

    // دالة تسجيل الخروج من الجلسة الحالية (حذف التوكن الحالي)
    public function logout()
    {
        // نجيب المستخدم الحالي بناءً على توكن Sanctum المرسل
        $authenticatedUser = Auth::guard("sanctum")->user();

        // لو المستخدم مش موجود (يعني التوكن غير صالح أو مفقود)
        if (!$authenticatedUser) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // نجيب ID التوكن الحالي اللي بيستخدمه العميل
        $tokenId = $authenticatedUser->currentAccessToken()->id;

        // نحذف التوكن الحالي فقط من قاعدة البيانات (logout للجلسة الحالية)
        $authenticatedUser->tokens()->where('id', $tokenId)->delete();

        // نرجع رسالة نجاح بسيطة
        return response()->json(['message' => 'User logged out successfully']);
    }

    // دالة تسجيل الخروج من كل الجلسات (حذف كل التوكنات المرتبطة بالمستخدم)
    public function logoutAll()
    {
        // نجيب المستخدم الحالي بناءً على التوكن
        $authenticatedUser = Auth::guard("sanctum")->user();

        // لو التوكن غير صالح
        if (!$authenticatedUser) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // نحذف كل التوكنات المرتبطة بهذا المستخدم (logout من كل الأجهزة)
        $authenticatedUser->tokens()->delete();

        // نرجع رسالة نجاح مع كود 200
        return $this->SuccessMessage("All sessions logged out successfully", 200);
    }
  
}
