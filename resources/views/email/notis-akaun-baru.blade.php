<x-mail::message>
    Tahniah, akaun anda telah berjaya dicipta.
    Sila login ke akaun anda menggunakan email: {{ $user->email }}
        dan password yang telah anda tetapkan.

<x-mail::button :url="'https://e-pegawai.test:8080'">
    Login Di Sini
</x-mail::button>

    - Item 1
    - Item 2
    - Item 3

<x-mail::table>
| Nama          | Emel           | No. Tel     |
| ------------- |:-------------: | --------:   |
| Upin          | upin@gmail.com | 01123456789 |
| Ipin          | ipin@gmail.com | 01193689445 |
</x-mail::table>

    Sekian, terima kasih.
    {{ config('app.name') }}
</x-mail::message>
