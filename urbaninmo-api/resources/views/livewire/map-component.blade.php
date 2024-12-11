<div wire:ignore class="w-full md:w-11/12 h-full">
    <iframe
        src="https://www.openstreetmap.org/export/embed.html?bbox={{ $y - 0.01 }},{{ $x - 0.01 }},{{ $y + 0.01 }},{{ $x + 0.01 }}&layer=mapnik&marker={{ $x }},{{ $y }}"
        frameborder="0" class="w-full h-full" style="border:0" allowfullscreen title="Mapa de OpenStreetMap">
    </iframe>
</div>
