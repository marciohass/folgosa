<tr style="background-color: black">
    <td class="header">
        <a  href="{{ url('/') }}">
            <img src="{{ url('/image_logo/logo_folgosa.png') }}" alt="">
        </a><br>
        <span style="color: #e83e8c; font-size: 14px; font-wieght-light">{{ $slot }} | {{date('d/m/Y')}}</span>
    </td>
</tr>
