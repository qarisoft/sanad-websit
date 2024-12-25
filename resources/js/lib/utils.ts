import { clsx, type ClassValue } from "clsx"
import { twMerge } from "tailwind-merge"

export function cn(...inputs: ClassValue[]) {
    return twMerge(clsx(inputs))
}

// import _ from "lodash"
import { useCallback, useEffect, useRef } from "react";

export const Trans = {
    photo: 'صور',
    viewer: 'معاين',
    home: 'لوحة التحكم',
    map: 'الخريطة',
    mapDesign: ' تصميم الخريطة',
    customers: 'العملاء',
    companies: 'الشركات',
    customer: 'العميل',
    messages: 'الرسائل',
    tasks: 'المعاينات',
    employees: 'المستخدمين',
    tanseeq: 'التنسيق',
    settings: 'الاعدادات',
    settingss: 'تخصيص',
    taskStatus: 'تخصيص حالة المعاينة',
    code: 'الكود',
    notes: 'ملاحضات',
    is_published: 'تم النشر',
    company_id: '',
    viewer_id: '',
    customer_id: '',
    received_at: 'تاريخ الأستلام',
    must_do_at: 'تاريخ التنفيذ',
    finished_at: 'تاريخ الانتهاء',
    published_at: 'تاريخ النشر',
    order_number: 'رقم الطلب',
    suk_number: 'رقم الصك',
    license_number: 'رقم الرخصة',
    scheme_number: 'رقم الاسكيم',
    piece_number: 'رقم القطعة',
    age: 'العمر',
    city: 'المدينة',
    district: 'الحي',
    estate_type: 'نوع العقار',
    near_south: 'الحنوب',
    near_north: 'الشمال',
    near_west: 'الغرب',
    near_east: 'الشرق',
    company_feedback: '',
    attach: 'مرفقات',
    created_at: '',
    updated_at: '',
    status: 'الحالة',
    close: 'الغاء',
    save: 'تم',
    name: 'الأسم',

    create: 'انشاء',
    edit: 'تعديل',
    update: 'تحديث',
    delete: 'حذف',
    add: 'اضافة',
    increment: '',
    decrement: '',
    login: 'تسجيل الدخول',
    // signUp: 'تسجيل ',
    create_account: 'انشاء حساب',
    account: '',
    user_name: 'اسم المستخدم',
    email: 'البريد الالكنروني',
    password: 'كلمة السر',
    password2: 'تاكيد كلمة السر',
    forgetPassword: 'نسيت كلمة السر',
    remember_me: 'تذكرني',
    dontHaveAccount: 'ليس لديك حساب',

    login_title: 'الدخول الى حسابك'
}
export const S = {
    home: 'لوحة التحكم',
    map: 'الخريطة',
    mapDesign: ' تصميم الخريطة',
    customers: 'العملاء',
    companies: 'الشركات',
    customer: 'العميل',
    messages: 'الرسائل',
    tasks: 'المعاينات',
    employees: 'المستخدمين',
    tanseeq: 'التنسيق',
    settings: 'الاعدادات',
    settingss: 'تخصيص',
    taskStatus: 'تخصيص حالة المعاينة',
    task: {
        code: 'الكود',
        notes: 'ملاحضات',
        is_published: 'تم النشر',
        company_id: '',
        viewer_id: '',
        customer_id: '',
        received_at: 'تاريخ الأستلام',
        must_do_at: 'تاريخ التنفيذ',
        finished_at: 'تاريخ الانتهاء',
        published_at: 'تاريخ النشر',
        order_number: 'رقم الطلب',
        suk_number: 'رقم الصك',
        license_number: 'رقم الرخصة',
        scheme_number: '',
        piece_number: 'رقم القطعة',
        age: 'العمر',
        city: 'المدينة',
        district: 'الحي',
        estate_type: 'نوع العقار',
        near_south: '',
        near_north: '',
        near_west: '',
        near_east: '',
        company_feedback: '',
        attach: '',
        created_at: '',
        updated_at: '',
    },
    or: 'أو',
    forms: {
        msg: {
            updated_succesfully: {
                title: (a: string) => ('تم حفض  ' + '  ' + a + '  ' + '  بنجاح ')

            }
        },
        status: 'الحالة',
        close: 'الغاء',
        save: 'تم',
        name: 'الأسم',

        create: 'انشاء',
        edit: 'تعديل',
        update: 'تحديث',
        delete: 'حذف',
        add: 'اضافة',
        increment: '',
        decrement: '',
        auth: {
            login: 'تسجيل الدخول',
            create_account: 'انشاء حساب',
            account: '',
            user_name: 'اسم المستخدم',
            email: 'البريد الالكنروني',
            password: 'كلمة السر',
            password2: 'تاكيد كلمة السر',
            remember_me: 'تذكرني',

            login_title: 'الدخول الى حسابك'

        }
    }
}

export const capitalize = (str: string) => {
    return str.charAt(0).toUpperCase() + str.slice(1);
}
export const k: string = import.meta.env.Map || 'AIzaSyAc6msM9kl5YhprDC-HH0zGnI0fSvuo7ys'

// export
