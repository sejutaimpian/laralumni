<a href="/{{ auth()->user()->role }}" class="btn text-start d-block text-light">
    <i class="bi bi-speedometer2 pe-2"></i>
    <span>Dashboard</span>
</a>
<a href="/{{ auth()->user()->role }}/alumni" class="btn text-start d-block text-light">
    <i class="bi bi-mortarboard pe-2"></i>
    <span>Alumni</span></a>
<a href="/{{ auth()->user()->role }}/siswaterbaik" class="btn text-start d-block text-light">
    <i class="bi bi-award pe-2"></i>
    <span>Penghargaan</span></a>
<a href="/{{ auth()->user()->role }}/kabaralumni" class="btn text-start d-block text-light">
    <i class="bi bi-newspaper pe-2"></i>
    <span>Kabar</span>
</a>
<a href="/{{ auth()->user()->role }}/loker" class="btn text-start d-block text-light">
    <i class="bi bi-briefcase pe-2"></i>
    <span>Loker</span>
</a>
<a href="/{{ auth()->user()->role }}/kenangan" class="btn text-start d-block text-light">
    <i class="bi bi-journal-album pe-2"></i>
    <span>Kenangan</span>
</a>
<a href="/logout" class="btn text-start d-block text-light" onclick="return confirm('Yakin mau keluar?')">
    <i class="bi bi-box-arrow-right pe-2"></i>
    <span>Logout</span>
</a>