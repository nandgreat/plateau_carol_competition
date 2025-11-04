@component('mail::message')
# 🎉 Registration Successful!

Dear **{{ $child->parent_name }}**,  
We’re excited to inform you that your child’s registration for the **Plateau State Christmas Carol – Children Bible Quiz & Recitation Competition 2025** has been received successfully! 🙌

---

### 👨‍👩‍👧 Registration Details

| **Field** | **Information** |
|:-----------|:----------------|
| **Child’s Full Name** | {{ $child->fullname }} |
| **Organization/Church** | {{ $child->organization ?? 'N/A' }} |
| **Age** | {{ $child->age }} |
| **Gender** | {{ $child->gender }} |
| **LGA of Residence** | {{ $child->lga }} |
| **Area of Interest** | {{ $child->interest_area }} |
| **Parent/Guardian Name** | {{ $child->parent_name }} |
| **Parent/Guardian Phone** | {{ $child->parent_phone }} |
| **Parent/Guardian Email** | {{ $child->parent_email ?? 'N/A' }} |
| **Unique Code** | **{{ $child->unique_code }}** |

---

### 📅 Event Details

**Date:** 8th November 2025  

**Venue for Applicants in Jos South:**  
ECWA UNITY CHURCH, RAYFIELD  
**Time:** 9:00 AM  

**Venue for Applicants in Jos North:**  
COCIN HWOLSHE, OPPOSITE NATIONAL LIBRARY  
**Time:** 1:00 PM  

---

### 📌 Important Note
Please keep your **Unique Code ({{ $child->unique_code }})** safe.  
It will be used for **identification, verification, and event participation** during the competition.

<p style="text-align: center;">
    <img src='{{ url("public/$child->qr_code_path") }}' alt="QR Code" style="margin-top: 10px; border-radius: 8px;">
</p>

---

### 📅 Next Steps
You will receive updates about the competition stages (**Quiz rounds, Bible recitation schedules, and final event details**) via this email or phone number.  
Please ensure your contact details remain active.

---

### 💬 Final Message
> _“Thank you for taking part in this year’s Plateau State Christmas Carol Children Bible Quiz and Recitation Competition. We look forward to seeing your child shine for God’s glory!”_

Warm regards,  
**Plateau Carol Competition Committee**  
📞 Official Contact: +234-703-2033-963  
📧 support@plateaukidsquiz.com

<p style="text-align:center; margin-top: 20px;">
    <img src="{{ asset('images/logo.png') }}" alt="Plateau Carol Logo" width="100">
</p>

@endcomponent
