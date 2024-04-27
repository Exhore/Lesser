{{-- foto para email --}}

@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            <img src="https://i.imgur.com/WzK3yPc.png" class="logo" alt="{{ config('app.name') }}" />
        </a>
    </td>
</tr>
