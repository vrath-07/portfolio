<x-mail::message>
# 🆕 New User Registration Request

A new user has registered and is awaiting approval.

**Name:** {{ $name }}  
**Email:** {{ $email }}  
**Role:** {{ ucfirst($role) }}

<x-mail::button :url="url('/approve-user?email=' . urlencode($email) . '&token=' . config('app.admin_token'))" color="success">
✅ Approve User
</x-mail::button>

<x-mail::button :url="url('/reject-user?email=' . urlencode($email) . '&token=' . config('app.admin_token'))" color="error">
🚫 Reject User
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
