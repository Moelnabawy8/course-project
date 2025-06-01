<?php

return [
    'accepted'             => 'يجب قبول :attribute.',
    'active_url'           => ':attribute ليس رابطًا صحيحًا.',
    'after'                => 'يجب أن يكون :attribute تاريخًا بعد :date.',
    'after_or_equal'       => 'يجب أن يكون :attribute تاريخًا بعد أو يساوي :date.',
    'alpha'                => 'يجب أن يحتوي :attribute على أحرف فقط.',
    'alpha_dash'           => 'يجب أن يحتوي :attribute على أحرف وأرقام وشرطات.',
    'alpha_num'            => 'يجب أن يحتوي :attribute على أحرف وأرقام فقط.',
    'array'                => 'يجب أن يكون :attribute مصفوفة.',
    'before'               => 'يجب أن يكون :attribute تاريخًا قبل :date.',
    'before_or_equal'      => 'يجب أن يكون :attribute تاريخًا قبل أو يساوي :date.',
    'between'              => [
        'numeric' => 'يجب أن تكون قيمة :attribute بين :min و :max.',
        'file'    => 'يجب أن يكون حجم :attribute بين :min و :max كيلوبايت.',
        'string'  => 'يجب أن يكون عدد أحرف :attribute بين :min و :max.',
        'array'   => 'يجب أن يحتوي :attribute على عدد من العناصر بين :min و :max.',
    ],
    'boolean'              => 'يجب أن تكون قيمة :attribute إما true أو false.',
    'confirmed'            => 'تأكيد :attribute غير مطابق.',
    'date'                 => ':attribute ليس تاريخًا صالحًا.',
    'date_equals'          => 'يجب أن يكون :attribute تاريخًا مساويًا لـ :date.',
    'date_format'          => 'لا يتوافق :attribute مع التنسيق :format.',
    'different'            => 'يجب أن يكون :attribute و :other مختلفين.',
    'digits'               => 'يجب أن يحتوي :attribute على :digits أرقام.',
    'digits_between'       => 'يجب أن يكون عدد أرقام :attribute بين :min و :max.',
    'dimensions'           => 'أبعاد صورة :attribute غير صالحة.',
    'distinct'             => ':attribute يحتوي على قيمة مكررة.',
    'email'                => 'يجب أن يكون :attribute بريدًا إلكترونيًا صالحًا.',
    'exists'               => ':attribute غير صالح.',
    'file'                 => ':attribute يجب أن يكون ملفًا.',
    'filled'               => ':attribute مطلوب.',
    'gt'                   => [
        'numeric' => 'يجب أن تكون قيمة :attribute أكبر من :value.',
        'file'    => 'يجب أن يكون حجم :attribute أكبر من :value كيلوبايت.',
        'string'  => 'يجب أن يحتوي :attribute على أكثر من :value حرفًا.',
        'array'   => 'يجب أن يحتوي :attribute على أكثر من :value عنصر.',
    ],
    'gte'                  => [
        'numeric' => 'يجب أن تكون قيمة :attribute أكبر من أو تساوي :value.',
        'file'    => 'يجب أن يكون حجم :attribute أكبر من أو يساوي :value كيلوبايت.',
        'string'  => 'يجب أن يحتوي :attribute على :value حرفًا أو أكثر.',
        'array'   => 'يجب أن يحتوي :attribute على :value عنصر أو أكثر.',
    ],
    'image'                => 'يجب أن يكون :attribute صورة.',
    'in'                   => ':attribute غير صالح.',
    'in_array'             => ':attribute غير موجود في :other.',
    'integer'              => 'يجب أن يكون :attribute عددًا صحيحًا.',
    'ip'                   => 'يجب أن يكون :attribute عنوان IP صالحًا.',
    'ipv4'                 => 'يجب أن يكون :attribute عنوان IPv4 صالحًا.',
    'ipv6'                 => 'يجب أن يكون :attribute عنوان IPv6 صالحًا.',
    'json'                 => 'يجب أن يكون :attribute نص JSON صالح.',
    'lt'                   => [
        'numeric' => 'يجب أن تكون قيمة :attribute أقل من :value.',
        'file'    => 'يجب أن يكون حجم :attribute أقل من :value كيلوبايت.',
        'string'  => 'يجب أن يحتوي :attribute على أقل من :value حرفًا.',
        'array'   => 'يجب أن يحتوي :attribute على أقل من :value عنصر.',
    ],
    'lte'                  => [
        'numeric' => 'يجب أن تكون قيمة :attribute أقل من أو تساوي :value.',
        'file'    => 'يجب أن يكون حجم :attribute أقل من أو يساوي :value كيلوبايت.',
        'string'  => 'يجب أن يحتوي :attribute على :value حرفًا أو أقل.',
        'array'   => 'يجب أن لا يحتوي :attribute على أكثر من :value عنصر.',
    ],
    'max'                  => [
        'numeric' => 'لا يجب أن تكون قيمة :attribute أكبر من :max.',
        'file'    => 'لا يجب أن يكون حجم :attribute أكبر من :max كيلوبايت.',
        'string'  => 'لا يجب أن يحتوي :attribute على أكثر من :max حرفًا.',
        'array'   => 'لا يجب أن يحتوي :attribute على أكثر من :max عنصر.',
    ],
    'mimes'                => 'يجب أن يكون :attribute ملف من نوع: :values.',
    'mimetypes'            => 'يجب أن يكون :attribute ملف من نوع: :values.',
    'min'                  => [
        'numeric' => 'يجب أن تكون قيمة :attribute على الأقل :min.',
        'file'    => 'يجب أن يكون حجم :attribute على الأقل :min كيلوبايت.',
        'string'  => 'يجب أن يحتوي :attribute على الأقل :min حرفًا.',
        'array'   => 'يجب أن يحتوي :attribute على الأقل :min عنصر.',
    ],
    'not_in'               => ':attribute غير صالح.',
    'not_regex'            => 'تنسيق :attribute غير صالح.',
    'numeric'              => 'يجب أن يكون :attribute رقمًا.',
    'password'             => 'كلمة المرور غير صحيحة.',
    'present'              => 'يجب تقديم :attribute.',
    'regex'                => 'تنسيق :attribute غير صالح.',
    'required'             => ':attribute مطلوب.',
    'required_if'          => ':attribute مطلوب عندما يكون :other هو :value.',
    'required_unless'      => ':attribute مطلوب إلا إذا كان :other في :values.',
    'required_with'        => ':attribute مطلوب عندما يكون :values موجودًا.',
    'required_with_all'    => ':attribute مطلوب عندما تكون :values موجودة.',
    'required_without'     => ':attribute مطلوب عندما لا تكون :values موجودة.',
    'required_without_all' => ':attribute مطلوب عندما لا تكون أي من :values موجودة.',
    'same'                 => 'يجب أن يتطابق :attribute مع :other.',
    'size'                 => [
        'numeric' => 'يجب أن تكون قيمة :attribute :size.',
        'file'    => 'يجب أن يكون حجم :attribute :size كيلوبايت.',
        'string'  => 'يجب أن يحتوي :attribute على :size حرفًا.',
        'array'   => 'يجب أن يحتوي :attribute على :size عنصر.',
    ],
    'string'               => 'يجب أن يكون :attribute نصًا.',
    'timezone'             => 'يجب أن يكون :attribute نطاقًا زمنيًا صالحًا.',
    'unique'               => ':attribute مستخدم من قبل.',
    'uploaded'             => 'فشل في تحميل :attribute.',
    'url'                  => 'تنسيق :attribute غير صالح.',
    'uuid'                 => 'يجب أن يكون :attribute UUID صالحًا.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'رسالة مخصصة',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    */

    'attributes' => [],
];
